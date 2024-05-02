<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierController extends Controller
{
    //
    private $supplier;
    public function __construct(Supplier $supplier)
    {
        $this->supplier=$supplier;
    }
    public function get(){
        $suppliers=$this->supplier->latest()->get();
        return response()->json($suppliers);
    }
    public function store(Request $request){
        $this->supplier->create(
            [
                'name'=>$request->supplier_name,
                'address'=>$request->supplier_address,
                'phone'=>$request->supplier_phone,
                'email'=>$request->supplier_email,
                
            ]
        );
        return response()->json([
            'id'=>$this->supplier->id,
            'code'=>200,
            'message'=>'success'
        ],200);
    }
}
