<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderAdminController extends Controller
{
    //
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider=$slider;
    }

    public function index(){
        $sliders=$this->slider->latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }
    public  function  create(){
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request){
        try {


            $dataInsert = [
                'name' => $request['name'],
                'description' => $request['description']
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataInsert)) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');

        }
        catch (\Exception $exception){
            Log::error('Error: '.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $slider=$this->slider->find($id);

        return view('admin.slider.edit',compact('slider'));
    }
public  function  update(SliderAddRequest $request,$id){
    try {
        $dataInsert = [
            'name' => $request['name'],
            'description' => $request['description'],
        ];

        $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (!empty($dataInsert)) {
            $imagePath = $this->slider->find($id)->image_path;
            $imagePathString = strval($imagePath);
            $this->storageTraitDelete($imagePathString);
            $dataInsert['image_name'] = $dataImageSlider['file_name'];
            $dataInsert['image_path'] = $dataImageSlider['file_path'];
            
        }
        $this->slider->find($id)->update($dataInsert);

        return redirect()->route('slider.index');

    }
    catch (\Exception $exception){
        Log::error('Error: '.$exception->getMessage().'---Line'.$exception->getLine());
    }
}
public function delete($id){
    try {
        $this->storageTraitDelete($this->slider->find($id)->image_path);

        $this->slider->find($id)->delete();

        return response()->json([
            'code'=>200,
            'message'=>'Success'
        ],200);
    }
    catch (\Exception $exception){
         return response()->json([
            'code'=>500,
            'message'=>'Fail'
        ],500);
    }

}
}

