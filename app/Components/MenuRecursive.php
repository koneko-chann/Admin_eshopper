<?php
namespace App\Components;
use App\Models\Menu;

class MenuRecursive{
    private $html;
    public  function __construct()
    {
        $this->html='';

    }


    public function menuRecursiveAdd($parent_id=0,$subMark=''){
$data=Menu::where('parent_id',$parent_id)->get();
foreach ($data as $dataItem){
    $this->html.='<option value="'.$dataItem->id.'">'.$subMark.$dataItem->name.'</option>';
    $this->menuRecursiveAdd($dataItem->id,$subMark.'-');
}
return $this->html;
    }
    public function menuRecursiveEdit($parentIdEdit,$parent_id=0,$subMark=''){
        $data=Menu::where('parent_id',$parent_id)->get();
        foreach ($data as $dataItem){
           if($parentIdEdit==$dataItem['id']){
               $this->html.='<option selected value="'.$dataItem->id.'">'.$subMark.$dataItem->name.'</option>';
           }
            else{
                $this->html.='<option  value="'.$dataItem->id.'">'.$subMark.$dataItem->name.'</option>';

            }
            $this->menuRecursiveEdit($parentIdEdit,$dataItem->id,$subMark.'-');

        }
        return $this->html;
    }
}
