<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Scheme;
use Modules\Product\Http\Requests\AddSchemeValidation;
use Session;

class SchemeController extends BaseController
{

    protected $base_route = 'scheme.view';
    protected $view_path = 'product::scheme';
    protected $panel = 'Scheme';
    protected $folder ='';
    protected $folderpath;
    protected $databaseimage = '';

    public function __construct(Scheme $model){
       $this->middleware(['role:admin|shop'])->except('show');
        $this->model = $model;
    }

    public function index()
    {

        $data['scheme'] = $this->model::all();
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }

    public function create()
    {
        return view(parent::commondata($this->view_path.'.add'));
    }

    public function store(AddSchemeValidation $request)
    {
        $data['scheme']= $this->model::create($request->all());
        Session::flash('success','Brand Store Successfully');
        return redirect()->Route($this->base_route);
    }
   
    public function show($id)
    {
        return view('product::show');
    }

    public function edit($id)
    {
        $data['scheme'] = $this->model::find($id);
        $this->rowExist($data['scheme']);
        return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    public function update(AddSchemeValidation $request, $id)
    {
        $data['scheme'] = $this->model::find($id);
        $data['scheme']->update($request->all());
        Session::flash('success','Scheme Update Successfully');
        return redirect()->Route($this->base_route);
    }

    public function destroy($id)
    {
        $data['scheme'] = $this->model::find($id);
        $this->rowExist($data['scheme']);
        $this->destroydata($id);
        Session::flash('success','Scheme Delete Successfully');
        return redirect()->Route($this->base_route);
    }

    public function status($id){
        $this->statuschange($id);
        return redirect()->route($this->base_route);
    }
}
