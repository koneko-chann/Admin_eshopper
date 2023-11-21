<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRoleController extends Controller
{
    //
    private $roles;
    private $permission;

    /**
     * @param $roles
     */
    public function __construct(Role $roles,Permission $permission)
    {
        $this->roles = $roles;
        $this->permission = $permission;
    }
public function update(Request $request,$id)
{
    try{

        DB::beginTransaction();
        $role=$this->roles->find($id);
        $role->update([
            'name'=>$request['name'],
            'display_name'=>$request['display_name']
        ]);
        $role->permission()->sync($request['permission_id']);
        DB::commit();
        return redirect()->route('roles.index');}
    catch (\Exception $exception){
        DB::rollBack();
        return redirect()->route('roles.index');
    }

}
    public function index(){
        $roles=$this->roles->paginate(5);
        return view('admin.roles.index',compact('roles'));
    }
    public function create(){
        $permissions=$this->permission->where('parent_id',0)->get();
        return view('admin.roles.add',compact('permissions'));
    }
    public function edit($id){
        $permissionsParent=$this->permission->where('parent_id',0)->get();
        $role=$this->roles->find($id);
        $permissionsChecked=$role->permission;
        return view('admin.roles.edit',compact('permissionsParent','role','permissionsChecked'));
    }
    public function store(Request $request){
        try{

        DB::beginTransaction();
    $role=$this->roles->create([
    'name'=>$request['name'],
    'display_name'=>$request['display_name']
]);
    $role->permission()->attach($request['permission_id']);
    DB::commit();
return redirect()->route('roles.index');}
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('roles.index');
        }

        }
    }

