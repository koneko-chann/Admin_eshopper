<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;
use App\Models\Warehouse;
use App\Models\Supplier;
use App\Models\Store;

class ImportController extends Controller
{
    //
    private $import;
    private $warehouse;
    private $supplier;
    private $store;
    public function __construct(Import $import, Warehouse $warehouse, Supplier $supplier, Store $store)
    {
        $this->import = $import;
        $this->warehouse = $warehouse;
        $this->supplier = $supplier;
        $this->store = $store;
    }
   
    public function index($warehouse_id)
    {
        $warehouse = $this->warehouse->find($warehouse_id);
        $imports = $warehouse->imports;
        return view('admin.warehouse.import.index', compact('imports','warehouse_id'));
    }
    public function create()
    {
        $store_or_warehouse = $this->supplier->whereNotNull('warehouse_id')->orWhereNotNull('store_id')->get();
        $old_provider=$this->supplier->whereNull('warehouse_id')->whereNull('store_id')->get();
        return view('admin.warehouse.import.add', compact('store_or_warehouse','old_provider'));
    }
  public function getProductsSupplierWarehouse($supplier_id){
    $supplier = $this->supplier->find($supplier_id);
    $products = $supplier->products;
    return response()->json($products);
  }
   
}
