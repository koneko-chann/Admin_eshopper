<?php

namespace App\Http\Controllers;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WarehouseController extends Controller
{
    //
    private $warehouse;
    public function __construct(Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
    }
    public function index()
    {
        $warehouses = $this->warehouse->latest()->paginate(5);
        return view('admin.warehouse.index', compact('warehouses'));
    }
    public function create()
    {
        return view('admin.warehouse.add');
    }
    public function store(Request $request)
    {
            $warehouse = [
                'name' => $request['name'],
                'address' => $request['address'],
                'manager_phone' => $request['manager_phone'],
                'note' => $request['note'],
            ];
            $this->warehouse->create($warehouse);
            return redirect()->route('warehouse.index');
      
    }
    public function edit($id)
    {
        $warehouse = $this->warehouse->find($id);
        return view('admin.warehouse.edit', compact('warehouse'));
    }
    public function update(Request $request, $id)
    {
        $warehouse = [
            'name' => $request['name'],
            'address' => $request['address'],
            'manager_phone' => $request['manager_phone'],
            'note' => $request['note'],
        ];
        $this->warehouse->find($id)->update($warehouse);
        return redirect()->route('warehouse.index');
    }
    
    public function delete($id)
    {
        $this->warehouse->find($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Success'
        ], 200);
    }
    
}
