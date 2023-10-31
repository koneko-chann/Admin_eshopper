<?php

namespace App\Http\Controllers;
use App\Components\Recursive;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    private $htmlOption;
    public function __construct(Category $category)
    {
        $this->category=$category;

    }

    public function create(){

        $htmlOption=$this->getCategories($parent_id='');
       return view('category.add',compact('htmlOption'));

}

public  function  store(Request $request){
        $this->category->create([
            'name'=>$request['name'],
            'parent_id'=>$request['parent_id']
        ]);
        return redirect()->route('categories.index');
}
    public  function  index(){
        $categories=$this->category->latest()->paginate(5);
        return view('category.index',compact('categories'));
    }
    public function edit($id){
        $category=$this->category->find($id);

$htmlOption=$this->getCategories($category->parent_id);
return view('category.edit',compact('category','htmlOption'));
    }
    public  function  getCategories($parent_id){
        $data=$this->category->all();
        $recursive=new Recursive($data);
        $htmlOption=$recursive->categoryRecursive(0,'',$parent_id);
        return $htmlOption;
    }
    public  function  delete($id){
        $concat_string=null;
        foreach ($this->category->all() as $choosed){
            if($choosed->parent_id ==$id){
                $concat_string=$concat_string.$choosed->name.',';
            }
        }
        $concat_string=rtrim($concat_string,',');
        if(!empty($concat_string) || !is_null($concat_string))
            return redirect()->route('categories.index')->with('message','Không thể xóa vì có các danh mục con: '.$concat_string);
        $finded= $this->category->find($id)->delete();
        return redirect()->route('categories.index');

    }
    public  function  update(Request $request,$id){
$this->category->find($id)->update([
    'name'=>$request['name'],
    'parent_id'=>$request['parent_id']
]);
return redirect()->route('categories.index');
    }
}
