<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Controllers\BaseController;


class PermissionController extends BaseController
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

	public function index()
	{
		$data['permission'] = Permission::all();
		return view(parent::commondata($this->view_path.'permissions.index'),compact('data'));
	}

	public function create()
	{
		$data['permission'] = Permission::all();
		return view(parent::commondata($this->view_path.'permissions.create'), compact('data'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:permissions,name',
		]);
		$data['permission'] = Permission::create(["name" => $request->name]);
		Session::flash('success', 'Permission Created Successfully.');
		return redirect()->route('permission.index',compact('data'));
	}


	public function edit($id)
	{
		$data['permission'] = Permission::find($id);
		return view(parent::commondata($this->view_path.'permissions.edit'), compact('data'));
	}

	public  function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required|unique:permissions,name',
		]);
		$data['permission'] = Permission::find($id);
		$data['permission'] -> update(["name" => $request->name]);
		Session::flash('success', 'Permission Updated Successfully.');
		return redirect()->route('permission.index',compact('data'));	
	}

	public function destroy($id)
	{
		$data['permission'] = Permission::find($id);
		$data['permission']->delete();
		Session::flash('success', 'Permission Deleted Successfully.');
		return redirect()->route('permission.index',compact('data'));	
	}

}
