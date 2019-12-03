<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Productdetail;
use Modules\Product\Http\Requests\AddDetailValidation;
use Session;
use DB;

class DetailController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    protected $base_route = 'productdetail.view';
    protected $view_path = 'product::productdetail';
    protected $panel = 'Product Detail';
    protected $folder ='';
    protected $folderpath;
    protected $databaseimage = '';

    public function __construct(Productdetail $model){
     $this->middleware(['role:admin|shop'])->except('show');
     $this->model = $model;
 }

     public function index($id)
     {
        $data['productdetail'] = Productdetail::where('productid','=',$id)->first();
        $data['product'] = Product::find($id);
        if($data['productdetail']){
            return view(parent::commondata($this->view_path.'.index'),compact('data'));
        }
        else{

            return redirect()->Route('productdetail.create',$data['product']->id);
        }
    }

    public function create($id)
    {
        $data['productdetail'] = Product::find($id);
        return view(parent::commondata($this->view_path.'.add'), compact('data'));
    }


    public function store(AddDetailValidation $request, $id)
    {
        Productdetail::create([
            'productid' => $id,
            'description' =>$request->description,
            'features' =>$request->features,
            'services' =>$request->services,
            'color' =>$request->color,
            'capacity' =>$request->capacity,
            'size' =>$request->size,
            'keyword' =>$request->keyword,
            'metaTags' =>$request->metaTags,
            'metaDescription' =>$request->metaDescription,
        ]);
        Session::flash('success', $this->panel . 'Created Successfully.');
        return redirect()->route($this->base_route, $id);
    }
    
    public function edit($id)
    {
        $data['productdetail'] = Productdetail::where('productid','=',$id)->first();
        $this->rowExist($data['productdetail']);
        return view(parent::commondata($this->view_path.'.edit'), compact('data'));
    }

    public function update(AddDetailValidation $request, $id)
    {
       $data['productdetail'] = Productdetail::where('productid','=',$id)->first();
        $data['productdetail']->update($request->all());
        return redirect()->route($this->base_route, $id);

    }
}
