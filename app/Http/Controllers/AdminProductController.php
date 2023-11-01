<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    //

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
}
