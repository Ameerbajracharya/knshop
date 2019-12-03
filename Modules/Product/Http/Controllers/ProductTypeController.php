<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\ProductType;
use Modules\Product\Http\Requests\AddProductTypeValidation;
use Session;

class ProductTypeController extends BaseController
{
    protected $base_route = 'producttype.view';
    protected $view_path = 'product::producttype';
    protected $panel = 'productType';
    protected $folder ='';
    protected $folderpath;
    protected $databaseimage = '';

    public function __construct(ProductType $model){
       $this->middleware(['role:admin|shop'])->except('show');
    $this->model = $model;
    }

    public function index()
    {
        $data['producttype'] = ProductType::all();
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }

    public function create()
    {
     return view(parent::commondata($this->view_path.'.add'));
    }

     public function store(AddProductTypeValidation $request)
     {

        $data['productType']= ProductType::create($request->all());
        Session::flash('success','Product Store Successfully');
        return redirect()->Route($this->base_route);
    }
    public function status($id){
      $this->statuschange($id);

      return redirect()->route($this->base_route);
    }

    public function edit($id)
    {
        $data['producttype'] = Producttype::find($id);
        $this->rowExist($data['producttype']);
        return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    public function update(AddProductTypeValidation $request, $id)
    {
        $data['producttype'] = Producttype::find($id);
        $data['producttype']->update($request->all());
        Session::flash('success','producttype Update Successfully');
        return redirect()->Route($this->base_route);
    }

    public function destroy($id)
    {
        $data['producttype'] = Producttype::find($id);
        $this->rowExist($data['producttype']);
        $this->destroydata($id);
        Session::flash('success','Product Delete Successfully');
        return redirect()->Route($this->base_route);
    }

}
