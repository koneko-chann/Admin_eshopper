<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class AdminProductController extends Controller
{
    //
use StorageImageTrait;
private $product;
private $productImage;
    public function __construct(Product $product,ProductImage $productImage)
    {
        $this->product=$product;
        $this->productImage=$productImage;
    }

    public function index(){
        $products=$this->product->latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }
    public function  create()
    {
        $htmlOption=$this->getCategories($parent_id='');
        return view('admin.product.add',compact('htmlOption'));

    }
    public  function  getCategories($parent_id){
        $data=Category::all();
        $recursive=new Recursive($data);
        $htmlOption=$recursive->categoryRecursive(0,'',$parent_id);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request){
        try{
            $dataProductCreate = $this->getDataProductCreate($request);
            $product=$this->product->create($dataProductCreate);
    // Insert data to product_images
        $imageRQ=$request['image_path'];
        if($request->hasFile('image_path')){
            foreach ($imageRQ as $fileItem){
$dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
$product->images()->create([
    'image_path'=>$dataProductImageDetail['file_path'],
    'image_name'=>$dataProductImageDetail['file_name']
]);
            }


        }
        if(!empty($request['tags']))
        foreach ($request['tags'] as $tagItem){
            $tagInstance=Tag::firstOrCreate([
                'name'=>$tagItem
            ]);
            $tagIds[]=$tagInstance['id'];
        }
        $product->tags()->attach($tagIds);
            DB::commit();
return redirect()->route('product.index');
    }
    //Insert tags
        catch (\Exception $exception){
            DB::rollBack();
           Log::error('Message: '.$exception->getMessage().'Line: '.$exception->getLine());
            return redirect()->route('product.index');

        }
        }
        public  function  edit($id)
        {
            $product=$this->product->find($id);
            $htmlOption=$this->getCategories($parent_id=$product->category_id);
            return view('admin.product.edit',compact('htmlOption','product'));
        }
        public  function  update(Request $request,$id){
            try{
                $dataProductUpdate = $this->getDataProductCreate($request);
                $this->product->find($id)->update($dataProductUpdate);
                $product=$this->product->find($id);
                // Insert data to product_images
                $imageRQ=$request['image_path'];
                if($request->hasFile('image_path')){
                    $this->productImage->where('product_id',$id)->delete();
                    foreach ($imageRQ as $fileItem){
                        $dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
                        $product->images()->create([
                            'image_path'=>$dataProductImageDetail['file_path'],
                            'image_name'=>$dataProductImageDetail['file_name']
                        ]);
                    }


                }
                if(!empty($request['tags']))
                    foreach ($request['tags'] as $tagItem){
                        $tagInstance=Tag::firstOrCreate([
                            'name'=>$tagItem
                        ]);
                        $tagIds[]=$tagInstance['id'];
                    }
                $product->tags()->sync($tagIds);
                DB::commit();
                return redirect()->route('product.index');
            }
                //Insert tags
            catch (\Exception $exception){
                DB::rollBack();
                Log::error('MEssage: '.$exception->getMessage().'Line: '.$exception->getLine());
                return redirect()->route('product.index')->with($exception);

            }
        }
        public  function  delete($id){
        $this->product->find($id)->delete();
        return response()->json([
            'code'=>200,
            'message'=>'Success'
        ],200);
        }

    /**
     * @param ProductAddRequest $request
     * @return array
     */
    public function getDataProductCreate(ProductAddRequest $request): array
    {
        DB::beginTransaction();
        $dataProductCreate = [
            'name' => $request['name'],
            'price' => $request['price'],
            'content' => $request['content'],
            'user_id' => auth()->id(),
            'category_id' => $request['category_id']
        ];
        $data = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($data)) {
            $dataProductCreate['feature_image_name'] = $data['file_name'];
            $dataProductCreate['feature_image_path'] = $data['file_path'];
        }
        return $dataProductCreate;
    }

}
