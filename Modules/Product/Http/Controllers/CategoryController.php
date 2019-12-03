<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Category;
use Modules\Product\Http\Requests\AddCategoryValidation;
use Session;

class CategoryController extends BaseController
{
    protected $base_route = 'category.view';
    protected $view_path = 'product::category';
    protected $panel = 'category';
    protected $folder ='';
    protected $folderpath;
    protected $databaseimage = '';

    public function __construct(Category $model){
        $this->model = $model;
    }

    public function index()
    {
        $data['category'] = Category::all();
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }

    public function create()
    {
       return view(parent::commondata($this->view_path.'.add'));
    }

    public function store(AddCategoryValidation $request)
    {
        $data['category']= Category::create($request->all());
        Session::flash('success','Category Stored Successfully');
        return redirect()->Route($this->base_route);
    }

    public function status($id){
      $this->statuschange($id);

        return redirect()->route($this->base_route);
    }
       public function edit($id)
    {
        $data['category'] = Category::find($id);
        $this->rowExist($data['category']);
        return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    public function update(AddCategoryValidation $request, $id)
    {
        $data['category'] = Category::find($id);
        $data['category']->update($request->all());
        Session::flash('success','Category Updated Successfully');
        return redirect()->Route($this->base_route);
    }

    public function destroy($id)
    {
        $data['category'] = Category::find($id);
        $this->rowExist($data['category']);
        $this->destroydata($id);
        Session::flash('success','Category Deleted Successfully');
        return redirect()->Route($this->base_route);
    }
}
