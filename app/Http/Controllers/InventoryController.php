<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Views\InventoryView;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
class InventoryController extends Controller
{
    //
    private $inventory;
    private $category;
    public function __construct(InventoryView $inventory, Category $category)
    {
        $this->inventory=$inventory;
        $this->category=$category;
    }
  
    public function index()
    {
        $categories=$this->category->all();
        return view('admin.warehouse.inventory.index',compact('categories'));
    }
    public function getInventory(Request $request)
    {
        if ($request->has('category_id') && $request->category_id != '') {
            $inventory=DB::select('Call GetProductStatisticsByCategory(?)',[$request->category_id]);
            return DataTables::of($inventory)->make(true);
        }
        $inventory=$this->inventory->orderBy('total_quantity','desc')->latest('last_import_date')->get();
        $categories=$this->category->all();
        return DataTables::of($inventory)->make(true);
    }

}
