<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Image;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;
use Modules\Product\Http\Requests\AddImageValidation;
use Session;

class ProductImageController extends BaseController
{
  protected $base_route = 'productimage.view';
  protected $view_path = 'product::productimage';
  protected $panel = 'Product Image';
  protected $folder ='products';
  protected $folderpath;
  protected $databaseimage = 'image';

  public function __construct(ProductImage $model)
  {
    $this->model = $model;       
    $this->middleware(['role:admin|shop'])->except('show');
    $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
    }

    public function index($id)
    {
        $data['productimage'] = DB::table('product_images')
        ->join('products','products.id','=', 'productid')
        ->select('products.id as pid','products.*','product_images.*')
        ->where('products.id','=', $id)
        ->get();
        $data['product'] = Product::find($id);
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }


    public function create($id)
    {
        $data['product'] = Product::find($id);
        return view(parent::commondata($this->view_path.'.create'), compact('data'));

    }

    public function store(AddImageValidation $request, $id)
    {
     if ($request->hasFile('image')) {
        foreach($request->file('image') as $key => $image)
        {
            $file = $request->file('image')[$key];
            $name = time() . uniqid() . '_' . $file->getClientOriginalName();
            $dim = config('dimension.dimension-image-offer.offer-image-dimensions');
            $file->move($this->folderpath . DIRECTORY_SEPARATOR, $name);
            if($dim)
            {
             $resize_image = Image::make($this->folderpath.DIRECTORY_SEPARATOR.$name);
             $resize_image->resize($dim['width'],$dim['height']);
             $resize_image->save($this->folderpath. DIRECTORY_SEPARATOR.$dim['width'].'-'.$dim['height'].'-'.$name);
         }
         $dbname = 'image';
         ProductImage::create([
             'productid' => $id,
             'image' => $name,
         ]);
     }
    }
    Session::flash('success', $this->panel . 'Created Successfully.');
    return redirect()->route($this->base_route, $id);
    }

    public function show($productid, $id)
    {
       $data['productimage'] = DB::table('product_images')
       ->join('products','products.id','=', 'productid')
       ->select('products.id as pid','products.*','product_images.*')
       ->where('product_images.id',"=", $id)
       ->first();
       return view(parent::commondata($this->view_path.'.show'),compact('data'));
    }

 
    public function edit($productid, $id)
    {
       $data['productimage'] = DB::table('product_images')
       ->join('products','products.id','=', 'productid')
       ->select('products.id as pid','products.*','product_images.*')
       ->where('product_images.id',"=", $id)
       ->get();
       $data['product'] = Product::find($productid);
       $this->rowExist($data['productimage']);
       return view(parent::commondata($this->view_path.'.edit'),compact('data'));
    }

    
    public function update(Request $request, $productid, $id)
    {
       $dim = config('dimension.dimension-image-offer.offer-image-dimensions');
       $productimage = ProductImage::find($id);
       if($request->hasFile('image')){
        $dbname='image';
        if($productimage->image)
        {
            if (file_exists($this->folderpath . DIRECTORY_SEPARATOR.$productimage->image)) {
                unlink($this->folderpath.DIRECTORY_SEPARATOR.$productimage->image);
                unlink($this->folderpath.DIRECTORY_SEPARATOR.$dim['width'].'-'.$dim['height'].'-'.$productimage->image);
            }
        }
        $file = $request->file('image');
        $filename = time() . uniqid() . '_' . $file->getClientOriginalName();
        $file->move($this->folderpath . DIRECTORY_SEPARATOR, $filename);
        if($dim)
        {
         $resize_image = Image::make($this->folderpath.DIRECTORY_SEPARATOR.$filename);
         $resize_image->resize($dim['width'],$dim['height']);
         $resize_image->save($this->folderpath. DIRECTORY_SEPARATOR.$dim['width'].'-'.$dim['height'].'-'.$filename);
     }
    }
    $productimage->update([
     'productid' => $id,
     'image' => $filename,
    ]);
    Session::flash('success', $this->panel . 'Created Successfully.');
    return redirect()->route($this->base_route, $id);
    }

    
    public function destroy($productid, $id)
    {
       $dim = config('dimension.dimension-image-offer.offer-image-dimensions');
       $data['productimage'] = ProductImage::find($id);
       $this->rowExist($data['productimage']);
       $data['base'] = $this->model->find($id);
       $dbname = $this->databaseimage;
       if ($data['base']->$dbname)
       {
        if(file_exists($this->folderpath . DIRECTORY_SEPARATOR.$data['base']->$dbname))
        {
            unlink($this->folderpath . DIRECTORY_SEPARATOR.$data['base']->$dbname);
            unlink($this->folderpath. DIRECTORY_SEPARATOR.$dim['width'].'-'.$dim['height'].'-'.$data['base']->$dbname);
        }
    }
    $data['productimage']->delete();
    Session::flash('success','Image Delete Successfully');
    return redirect()->route($this->base_route, $productid);
    }

    public function status($productid, $id)
    {
        $data['productimage'] = $this->model->find($id);
        if ($data['productimage'] ->status == 0)
        {
            $data['productimage'] ->status = 1;
        }
        else
        {
            $data['productimage'] ->status = 0;
        }
        $data['productimage'] ->save();
        Session::flash('success','Status Update Successfully');
        return redirect()->back();
    }
 }
