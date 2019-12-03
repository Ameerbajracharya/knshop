<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\BaseController;
use Modules\Product\Entities\Altunit;
use Session;

class AltunitController extends BaseController
{
    protected $base_route = 'altunit.view';
    protected $view_path = 'product::altunit';
    protected $panel = 'altunit';
    protected $folder ='';
    protected $folderpath;
    protected $databaseimage = '';

    public function __construct(Altunit $model){
       $this->middleware(['role:admin|shop'])->except('show');
       $this->model = $model;
    }

    public function index()
    {
        $data['altunit'] = Altunit::all();
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }
    public function edit($id)
    {
        $data['altunit'] = Altunit::find($id);
        $this->rowExist($data['altunit']);
        return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    public function create()
    {
       return view(parent::commondata($this->view_path.'.add'));
   }

   public function store(Request $request)
   {
    $data['altunit']= Altunit::create($request->all());
    Session::flash('success','altunit Store Successfully');
    return redirect()->Route($this->base_route);
    }

    public function update(Request $request, $id)
    {
    $data['altunit'] = Altunit::find($id);
    $data['altunit']->update($request->all());
    Session::flash('success','altunit Update Successfully');
    return redirect()->Route($this->base_route);
    }

    public function destroy($id)
    {
     $data['altunit'] = Altunit::find($id);
     $this->rowExist($data['altunit']);
     $this->destroydata($id);
     Session::flash('success','altunit Delete Successfully');
     return redirect()->Route($this->base_route);
    }

    public function status($id)
    {
      $this->statuschange($id);

      return redirect()->route($this->base_route);
    }
}
