<?php
namespace App\Components;
use App\Models\Category;

class Recursive
{
    private $htmlSelect='';
private $data;
    public function __construct($data){
$this->data=$data;
    }

    public  function  categoryRecursive($id=0,$text=' ',$parent_id){
        foreach ($this->data as $value){
            if($value['parent_id']==$id){
                if(!empty($parent_id) && $parent_id==$value->id){
                    $this->htmlSelect.= "<option selected value='".$value['id']."'>".$text.$value['name']."</option>";

                }
else{
    $this->htmlSelect.= "<option  value='".$value['id']."'>".$text.$value['name']."</option>";

}
                $this->categoryRecursive($value['id'],$text.'-',$parent_id);
            }
        }
        return $this->htmlSelect;
    }
}
