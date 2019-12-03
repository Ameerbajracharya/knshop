<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\BaseController;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Auth;
use Modules\User\Http\Requests\AddFormValidation;
use Modules\User\Http\Requests\EditFormValidation;
use Session;

class UserController extends BaseController
{


    protected $view_path = 'user::';
    protected $base_route = 'user';
    protected $databaseimage = '';
    protected $folder = 'user';
    protected $panel = 'User';
    protected $folder_path;
  
     public function __construct(){
        $this->middleware('role:admin')->except('show');
        $this->folder_path = '';
    }

    public function index(Request $request)
    {
        $data = User::all();
        return view(parent::commondata($this->view_path.'users.index'),compact('data'));
    }
    
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view(parent::commondata($this->view_path.'users.create'),compact('roles'));
    }

    public function store(AddFormValidation $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        Session::flash('success','User created successfully');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        if( Auth::user()->id != $id ){
            Session::flash('warning','Unauthorized');
            return redirect()->back();
        }
        $added_permission = DB::table('model_has_permissions')
        ->join('permissions','permissions.id','=','model_has_permissions.permission_id')
        ->select('permissions.name')->get();
        $permission = DB::table('role_has_permissions')
        ->join('roles','roles.id','=','role_has_permissions.role_id')
        ->join('permissions','permissions.id','=','role_has_permissions.permission_id')
        ->select('permissions.name')->get();
        return view(parent::commondata($this->view_path.'users.show'),compact('user','permission','added_permission'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all(); 
        $permission = DB::table('role_has_permissions')
        ->join('roles','roles.id','=','role_has_permissions.role_id')
        ->join('permissions','permissions.id','=','role_has_permissions.permission_id')
        ->select('permissions.name')->get();
        $added_permission = DB::table('model_has_permissions')
        ->join('permissions','permissions.id','=','model_has_permissions.permission_id')
        ->select('permissions.name')->get();
        return view(parent::commondata($this->view_path.'users.edit'),compact('user','roles','userRole','permission','added_permission'));
    }

    public function update(EditFormValidation $request, $id)
    {
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));
        $user->givePermissionTo($request->input('permission'));


        return redirect()->route('users.index')
        ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
        ->with('success','User deleted successfully');
    }
}
