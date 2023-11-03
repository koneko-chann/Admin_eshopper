<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

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
        return view('admin.product.index');
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
    public function store(Request $request){
        $dataProductCreate=[
          'name'=>$request['name'],
            'price'=>$request['price'],
            'content'=>$request['content'],
            'user_id'=>auth()->id(),
            'category_id'=>$request['category_id']
        ];
   $data=$this->storageTraitUpload($request,'feature_image_path','product');
   if(!empty($data)){
       $dataProductCreate['feature_image_name']=$data['file_name'];
       $dataProductCreate['feature_image_path']=$data['file_path'];
   }
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
            dd($dataProductImageDetail);

        }
    }
}
