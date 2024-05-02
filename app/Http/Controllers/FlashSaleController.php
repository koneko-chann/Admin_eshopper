<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recursive;
use App\Models\FlashSale;
use App\Models\product_sale;
use Illuminate\Support\Facades\DB;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Http;
class FlashSaleController extends Controller
{
    //
    use StorageImageTrait;
    private $flashsale;
    private $flashsale_products;
    private $actived_flashsale;
    public function __construct(FlashSale $flashSale,product_sale $flashsale_products)
    {
    $this->flashsale=$flashSale;    
    $this->flashsale_products=$flashsale_products;
    }
    public function index(){
        $flashsales=$this->flashsale->latest()->paginate(5);
        return view('admin.flashsales.index',compact('flashsales'));
    }
    public  function  create(){
        return view('admin.flashsales.add');
    }
    public function store(Request $request){
        DB::beginTransaction();
        try{
            $ids=$request->product_id;
           $flash= $this->flashsale->create([
                'title'=>$request->title,
                'active'=>0,
                'start_at'=>$request->start_at,
                'end_at'=>$request->end_at
            ]);
            $imageRQ = $request['banner'];
            if ($request->hasFile('banner')) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($imageRQ, 'flashsale_banner');
                    $flash->update([
                        'banner_path' => $dataProductImageDetail['file_path'],
                        'banner' => $dataProductImageDetail['file_name']
                    ]);
                }
            foreach($ids as $key=>$value){
                $flash_product=$this->flashsale_products->create([
                    'flashsale_id'=>$flash->id,
                    'product_id'=>$value,
                    'quantity'=>$request->quantity[$key],
                    'discount'=>$request->discount[$key],
                    'discount_type'=>$request->discount_type[$key],
                    'price_after_discount' => str_replace(',', '', $request['price_after_discount'][$key])
                ]);
            }
            DB::commit();
            return redirect()->route('flashsales.index');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
    public function changeActive(Request $request){
        $flashsale=$this->flashsale ->find($request->id);
        $flashsale->active=$request->active=='true'?1:0;
        $flashsale->save();
        // $response = Http::post('http://localhost/eshopper/public/testactive', [
        //     'email' => 'huycoixvb@gmail.com',
        //     'password' => '12345678',
        //     'device_name' => 'test',
        //     'id'=>$flashsale->id
        // ]);
        
        // $token = $response->json()['token'];
        // $responseOfClient = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $token,
        // ])->post('http://localhost/eshopper/public/PushActive',['id'=>$flashsale->id,'active'=>$flashsale->active]);
        return response()->json([
            'code'=>200,
            'message'=>'success'
        ],200);
    }
    public function edit($id){
        $flashsale=$this->flashsale->find($id);
        $flashsale_products=$this->flashsale_products->where('flashsale_id',$id)->get();
        return view('admin.flashsales.edit',compact('flashsale','flashsale_products'));
    }
    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            $ids = $request->product_id;
            $flash = $this->flashsale->find($id);
            $flash->update([
                'title' => $request->title,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at
            ]);
            $imageRQ = $request['banner'];
            if ($request->hasFile('banner')) {
                    $this->storageTraitDelete($flash->banner_path);

                    $dataProductImageDetail = $this->storageTraitUploadMultiple($imageRQ, 'flashsale_banner');
                    $flash->update([
                        'banner_path' => $dataProductImageDetail['file_path'],
                        'banner' => $dataProductImageDetail['file_name']
                    ]);
                }
            $flash->products()->detach();
            foreach ($ids as $key => $value) {
                $flash->products()->attach( $value,[
                    
                    'quantity' => $request->quantity[$key],
                    'discount' => $request->discount[$key],
                    'discount_type' => $request->discount_type[$key],
                    'price_after_discount' => str_replace(',', '', $request['price_after_discount'][$key]),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            DB::commit();
            return redirect()->route('flashsales.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function delete($id){
        $flashsale=$this->flashsale->find($id);
        $flashsale->delete();
        $this->storageTraitDelete($flashsale->banner_path);
        return response()->json([
            'code' => 200,
            'message' => 'Success'
        ], 200);
    }
    
}
