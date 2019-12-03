<?php

namespace Modules\Product\Http\Controllers;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Unit;
use Modules\Product\Entities\Scheme;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\ProductImage;
use Modules\Product\Entities\ProductType;
use Modules\Product\Http\Requests\AddProductValidation;
use Modules\Product\Http\Requests\EditProductValidation;
use Session;
use DB;

class ProductController extends BaseController
{
    protected $base_route = 'product.view';
    protected $view_path = 'product::product';
    protected $panel = 'Product';
    protected $folder ='product';
    protected $folderpath;
    protected $databaseimage = 'image';

    public function __construct(Product $model)
    {
     $this->middleware(['role:admin|shop'])->except('show');
     $this->model = $model;
     $i = 0;
     $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
 }


 public function productindex()
 {
    $productsdetails = DB::table('products')
    ->join('brands','brands.id','=','brandid')
    ->join('units','units.id','=','unitid')
    ->join('schemes','schemes.id','=','schemeid')
    ->join('categories','categories.id','=','categoryid')
    ->join('product_types','product_types.id','=','typeid')
    ->select('products.id as id','products.*','brands.brand','product_types.type','categories.category','units.unit','schemes.name')
    ->get();
    return view(parent::commondata($this->view_path.'.index'),compact('productsdetails'));
}


public function create()
{
    $data['brand']=Brand::where('status', '=' ,1)->orderBy('brand','asc')->pluck('brand','id');
    $data['unit']=Unit::where('status', '=' ,1)->orderBy('unit','asc')->pluck('unit','id');
    $data['scheme']=Scheme::where('status', '=' ,1)->orderBy('name','asc')->pluck('name','id');
    $data['category']=Category::where('status', '=' ,1)->orderBy('category','asc')->pluck('category','id');
    $data['producttype']=ProductType::where('status', '=' ,1)->orderBy('type','asc')->pluck('type','id');
    return view(parent::commondata($this->view_path.'.add'),compact('data'));
}

public function store(AddProductValidation $request)
{
    $data['data'] = Product::orderBy('id','desc')->first();
    $data['product'] = new Product;
    $data['product']->productName = $request->productName;
    $data['product']->categoryid = $request->categoryid;
    $data['product']->brandid = $request->brandid;
    $data['product']->typeid = $request->typeid;
    $data['product']->unitid = $request->unitid;
    $data['product']->schemeid = $request->schemeid;
    $data['product']->wholeSalePrice = $request->wholeSalePrice;
    $data['product']->sellingPrice = $request->sellingPrice;
    $data['product']->markedPrice = $request->markedPrice;
    if(isset($data['data']))
    {
        $code = ++$data['data']->id;
        $data['product']->code = "KN" . str_pad($code, 5, "0", STR_PAD_LEFT);
        $data['product']->qrcode = "QR" . str_pad($code, 5, "0", STR_PAD_LEFT);
        $data['product']->barcode = "Bar" . str_pad($code, 5, "0", STR_PAD_LEFT);
    }   
    else
    {
        $data['product']->code = "KN" . str_pad(1, 5, "0", STR_PAD_LEFT);
        $data['product']->qrcode = "QR" . str_pad(1, 5, "0", STR_PAD_LEFT);
        $data['product']->barcode = "Bar" . str_pad(1, 5, "0", STR_PAD_LEFT);
    }
    $data['product']->save();
    Session::flash('success','Product Stored Successfully');
    return redirect()->Route($this->base_route);
}


public function show($id)
{
    $productsdetails = DB::table('products')
    ->join('brands','brands.id','=','products.brandid')
    ->join('units','units.id','=','unitid')
    ->join('schemes','schemes.id','=','schemeid')
    ->join('categories','categories.id','=','products.categoryid')
    ->join('product_types','product_types.id','=','products.typeid')
    ->where('products.id','=', $id)
    ->select('products.*','brands.brand','product_types.type','categories.category','units.unit','schemes.name')->get();
    return view(parent::commondata($this->view_path.'.show'),compact('productsdetails'));
}


public function edit($id)
{
    $data['brand']=Brand::where('status', '=' ,1)->pluck('brand','id');
    $data['unit']=Unit::where('status', '=' ,1)->pluck('unit','id');
    $data['scheme']=Scheme::where('status', '=' ,1)->pluck('name','id');
    $data['category']=Category::where('status', '=' ,1)->pluck('category','id');
    $data['producttype']=ProductType::where('status', '=' ,1)->pluck('type','id');
    $data['product'] = Product::find($id);
    $this->rowExist($data['product']);
    return view(parent::commondata($this->view_path.'.add'),compact('data'));
}


public function update(AddProductValidation $request, $id)
{
    $data['product'] = Product::find($id);
    $this->storeimage($request, $id);
    $data['product']->update($request->all());
    Session::flash('success','Product Update Successfully');
    return redirect()->Route($this->base_route);
}


public function destroy($id)
{
   $data['product'] = Product::find($id);
   $this->rowExist($data['product']);
   $this->destroydata($id);
   Session::flash('success','Product Delete Successfully');
   return redirect()->Route($this->base_route);
}

public function status($id)
{
  $this->statuschange($id);
  return redirect()->route($this->base_route);
}

public function scheme($id)
{
    $data['scheme'] = Product::find($id);
    if ($data['scheme']->schemeid == 1)
    {
        $data['scheme']->schemeid = 2;
    }
    elseif ($data['scheme']->schemeid == 2)
    {
        $data['scheme']->schemeid = 3;
    }
    elseif ($data['scheme']->schemeid == 3)
    {
        $data['scheme']->schemeid = 1;
    }
    $data['scheme'] ->save();
    Session::flash('success','Scheme Update Successfully');
    return redirect()->route($this->base_route);
}

}
