<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsAddRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class SettingsController extends Controller
{
    //
    private $settings;

    /**
     * @param $settings
     */
    public function __construct(Setting $settings)
    {
        $this->settings = $settings;
    }

    public function index(){

       $settings= $this->settings->paginate(5);
        return view('admin.settings.index',compact('settings'));

    }
    public function create(){

        return view('admin.settings.add');
    }
    public function store(SettingsAddRequest $request){
        $this->settings->create([
            'config_key'=>$request['config_key'],
            'config_value'=>$request['config_value'],
            'type'=>$request['type']
        ]);
        return redirect()->route('settings.index');
    }
    public function update(Request $request,$id){
        $this->settings->find($id)->update([
            'config_key'=>$request['config_key'],
            'config_value'=>$request['config_value'],
            'type'=>$request['type']
        ]);
        return redirect()->route('settings.index');
    }
    public function edit($id){
      $settings=  $this->settings->find($id);
      return view('admin.settings.edit',compact('settings'));
    }
    public function delete($id){
        try{
            $this->settings->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'Success'
            ],200);
        }
        catch (\Exception $exception){
            return response()->json([
                'code'=>500,
                'message'=>'Failed'
            ],500);
        }

    }
}
