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
    public function __construct(Product $product, ProductImage $productImage)
    {
        $this->product = $product;
        $this->productImage = $productImage;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }
    public function  create()
    {
        $htmlOption = $this->getCategories($parent_id = '');
        return view('admin.product.add', compact('htmlOption'));
    }
    public  function  getCategories($parent_id)
    {
        $data = Category::all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive(0, '', $parent_id);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request)
    {
        DB::beginTransaction();
        try {
            $dataProductCreate = $this->getDataProductCreate($request);
            $product = $this->product->create($dataProductCreate);
            // Insert data to product_images
            $imageRQ = $request->image_path;
            if ($request->hasFile('image_path')) {
                foreach ($imageRQ as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            if (!empty($request['tags']))
                foreach ($request['tags'] as $tagItem) {
                    $tagInstance = Tag::firstOrCreate([
                        'name' => $tagItem
                    ]);
                    $tagIds[] = $tagInstance['id'];
            $product->tags()->attach($tagIds);

                }
                
            DB::commit();
            return redirect()->route('product.index');
        }
        //Insert tags
        catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return redirect()->route('product.index');
        }
    }
    public  function  edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategories($parent_id = $product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $product = $this->product->find($id);
            if (!$product) {
                throw new \Exception('Product not found');
            }
    
            $dataProductUpdate = $this->getDataProductCreate($request, $product);
            if($request->hasFile('feature_image_path')){
                $this->storageTraitDelete($product->feature_image_path);
               
            }
            else{
                $dataProductUpdate['feature_image_name'] = $product['feature_image_name'];
                $dataProductUpdate['feature_image_path'] = $product['feature_image_path'];
            }
            $product->update($dataProductUpdate);
    
            // Check if new images are uploaded
            if ($request->hasFile('image_path')) {
                // Delete existing product images
              $image_path=  $product->images();
                foreach($image_path as $image){
                    $this->storageTraitDelete($image->image_path);
                }
                $image_path->delete();
                // Insert new images to product_images
                foreach ($request['image_path'] as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
    
            // Sync tags
            $tagIds = [];
            if (!empty($request['tags'])) {
                foreach ($request['tags'] as $tagItem) {
                    $tagInstance = Tag::firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance['id'];
                }
            }
            $product->tags()->sync($tagIds);
    
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return redirect()->route('product.index')->withErrors($exception->getMessage());
        }
    }

public function getDataProductCreate(Request $request, $product = null): array
{
    $dataProductCreate = [
        'name' => $request['name'],
        'price' => $request['price'],
        'content' => $request['content'],
        'user_id' => auth()->id(),
        'category_id' => $request['category_id']
    ];

    if ($request->hasFile('feature_image_path')) {
        $data = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        $dataProductCreate['feature_image_name'] = $data['file_name'];
        $dataProductCreate['feature_image_path'] = $data['file_path'];
    } else if ($product) {
        $dataProductCreate['feature_image_name'] = $product->feature_image_name;
        $dataProductCreate['feature_image_path'] = $product->feature_image_path;
    } else {
        $dataProductCreate['feature_image_name'] = null;
        $dataProductCreate['feature_image_path'] = null;
    }

    return $dataProductCreate;
}
    public  function  delete($id)
    {
        try{

        $this->storageTraitDelete($this->product->find($id)->feature_image_path);
        $image_path=$this->product->find($id)->images;
        foreach($image_path as $image){
            $this->storageTraitDelete($image->image_path);
        }
        $this->product->find($id)->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Success'
        ], 200);
    }
    catch (\Exception $exception){
        Log::error('Error: '.$exception->getMessage().'---Line'.$exception->getLine());
    }
    }

    /**
     * @param ProductAddRequest $request
     * @return array
     */
   
    public function checkProductById(Request $request)
    {
        $data = $request->all();
        $products = $this->product->find($data['id']);
        $categoryName = Category::find($products->category->id)->name;

        if ($products) {
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'data' => $products,
                'category_name' => $categoryName
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Not found',
                'data' => []
            ], 404);
        }
    }
    public function getProductByCategoryId(Request $request)
    {
        $data = $request->all();
        $products = $this->product->where('category_id', $data['category_id'])->get();
        $categoryName = Category::find($data['category_id'])->name;
        if ($products) {
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'data' => $products,
                'category_name' => $categoryName
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Not found',
                'data' => []
            ], 404);
        }
    }
    public function getProductById(Request $request){
        $data = $request->all();
        $products = $this->product->find($data['id']);
        $categoryName = $products->category->name;
        if ($products) {
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'data' => $products,
                'category_name' => $categoryName
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Not found',
                'data' => []
            ], 404);
        }
    }
    public function getProduct(){
        $products = $this->product->all();
        if($products){
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'data' => $products
            ], 200);
        }
        else{
            return response()->json([
                'code' => 404,
                'message' => 'Not found',
                'data' => []
            ], 404);
        }
        
    }
    public function hideProduct($id){
        $product = $this->product->find($id);
        $product->hidden = 0;
        $product->save();
        return response()->json([
            'code' => 200,
            'message' => 'Success'
        ], 200);

    }
}
