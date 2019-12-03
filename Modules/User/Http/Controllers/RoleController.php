<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Http\Controllers\BaseController;
use DB;
use Auth;
use Session;

class RoleController extends BaseController
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
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view(parent::commondata($this->view_path.'roles.index'),compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view(parent::commondata($this->view_path.'roles.create'),compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
        ->with('success','Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$id)
        ->get();
        // $rolePermission le chai permission table ma vako data lyauxa jun role_has_permission.permission_id = permission.id cha ani jaha role_has_permission.role_id = $id(request bata id) sanga equal hunxa.
        return view(parent::commondata($this->view_path.'roles.show'),compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();


        return view(parent::commondata($this->view_path.'roles.edit'),compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
        ->with('success','Role updated successfully');
    }
    
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
        ->with('success','Role deleted successfully');
    }
}
