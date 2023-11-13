<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    private $users;
    private $role;

    /**
     * @param $users
     */
    public function __construct(User $users,Role $role)
    {
        $this->users = $users;
        $this->role=$role;
    }

    public function index(){
       $users= $this->users->paginate(10);
        return view('admin.users.index',compact('users'));
    }
    public function create(){
        $roles=$this->role->all();
        return view('admin.users.add',compact('roles'));
    }
    public function store(UserAddRequest $request){
        try {


            DB::beginTransaction();
            $user = $this->users->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            $roleIDs = $request['role_id'];
            $user->roles()->attach($roleIDs);
            DB::commit();

        }
        catch (\Exception $exception){

            DB::rollBack();

        }
return redirect()->route('users.index');
    }
    public function edit($id){
       $roles= $this->role->all();
       $user=$this->users->find($id);
       $roleOfUser=$user->roles;

        return view('admin.users.edit',compact('roles','user','roleOfUser'));
    }
    public function update(Request $request, $id){
        try {


            DB::beginTransaction();

            $this->users->find($id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            $user=$this->users->find($id);
            $roleIDs = $request['role_id'];
            $user->roles()->sync($roleIDs);
            DB::commit();

        }
        catch (\Exception $exception){

            DB::rollBack();

        }
    }
    public function delete($id){
        try{
            $this->users->find($id)->delete();
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
