<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Unit;
use Session;

class UnitController extends BaseController
{
    protected $base_route = 'unit.view';
    protected $view_path = 'product::unit';
    protected $panel = 'unit';
    protected $folder ='';
    protected $folderpath;
    protected $databaseimage = '';

    public function __construct(Unit $model){
       $this->middleware(['role:admin|shop'])->except('show');
       $this->model = $model;
    }

    public function index()
    {
        $data['unit'] = Unit::all();
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }
    public function edit($id)
    {
        $data['unit'] = Unit::find($id);
        $this->rowExist($data['unit']);
        return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    public function create()
    {
       return view(parent::commondata($this->view_path.'.add'));
   }

   public function store(Request $request)
   {
    $data['unit']= Unit::create($request->all());
    Session::flash('success','Unit Store Successfully');
    return redirect()->Route($this->base_route);
    }

    public function update(Request $request, $id)
    {
    $data['unit'] = Unit::find($id);
    $data['unit']->update($request->all());
    Session::flash('success','Unit Update Successfully');
    return redirect()->Route($this->base_route);
    }

    public function destroy($id)
    {
     $data['unit'] = Unit::find($id);
     $this->rowExist($data['unit']);
     $this->destroydata($id);
     Session::flash('success','Unit Delete Successfully');
     return redirect()->Route($this->base_route);
    }

    public function status($id)
    {
      $this->statuschange($id);
      return redirect()->route($this->base_route);
    }
}

