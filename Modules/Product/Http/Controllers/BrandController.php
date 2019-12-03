<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Brand;
use Session;
use DB;
use Modules\Product\Http\Requests\AddBrandValidation;


class BrandController extends BaseController
{
    protected $base_route = 'brand.view';
    protected $view_path = 'product::brand';
    protected $panel = 'Brand';
    protected $folder ='';
    protected $folderpath;
    protected $databaseimage = '';

    public function __construct(Brand $model){
        $this->model = $model;
    }

    public function index()
    {
        $data['brand'] = Brand::all();
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }


    public function edit($id)
    {
        $data['brand'] = Brand::find($id);
        $this->rowExist($data['brand']);
        return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    public function create()
    {
     return view(parent::commondata($this->view_path.'.add'));
    }

   public function store(AddBrandValidation $request)
   {
      $data['brand']= Brand::create($request->all());
      Session::flash('success','Brand Store Successfully');
      return redirect()->Route($this->base_route);
  }

  public function update(AddBrandValidation $request, $id)
  {
      $data['brand'] = Brand::find($id);
      $data['brand']->update($request->all());
      Session::flash('success','Brand Update Successfully');
      return redirect()->Route($this->base_route);
  }

  public function destroy($id)
  {
     $data['brand'] = Brand::find($id);
     $this->rowExist($data['brand']);
     $this->destroydata($id);
     Session::flash('success','Brand Delete Successfully');
     return redirect()->Route($this->base_route);
  }

  public function status($id){
    $this->statuschange($id);
    return redirect()->route($this->base_route);
  }
}

