<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    //
    private $roles;

    /**
     * @param $roles
     */
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }


    public function index(){
        $roles=$this->roles->paginate(5);
        return view('admin.roles.index',compact('roles'));
    }
    public function create(){
        return view('admin.roles.add');
    }
    public function edit($id){

    }
    public function store(Request $request){
$this->roles->create([
    'name'=>$request['name'],
    'display_name'=>$request['display_name']
]);
return redirect()->route('roles.index');
    }
}
