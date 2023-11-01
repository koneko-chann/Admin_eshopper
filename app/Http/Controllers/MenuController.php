<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MenuController extends Controller
{
    //
    private $menuRecursive;
    private $menu;

    public function __construct(MenuRecursive $menuRecursive, Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }

    public function index(): View
    {
        $menus=$this->menu->latest()->paginate(5);
        return view('admin.menus.index',compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menus.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug' => Str::slug($request['name'], '-')
        ]);
        return redirect()->route('menus.index');
    }

    public function edit($id, Request $request)
    {
        $menu = $this->menu->find($id);
        $htmlOption = $this->menuRecursive->menuRecursiveEdit($parentIdEdit = $menu['parent_id']);
        return view('admin.menus.edit', compact('menu', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $this->menu->find($id)->update([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug'=>Str::slug($request['name'],'-')
        ]);
        return redirect()->route('menus.index');

    }
public  function  delete($id){
    $concat_string=null;
    foreach ($this->menu->all() as $choosed){
        if($choosed->parent_id ==$id){
            $concat_string=$concat_string.$choosed->name.',';
        }
    }
    $concat_string=rtrim($concat_string,',');
    if(!empty($concat_string) || is_null($concat_string))
        return redirect()->route('menus.index')->with('message','Không thể xóa vì có các menu con: '.$concat_string);
    $finded= $this->menu->find($id)->delete();
    return redirect()->route('menus.index');

}
}
