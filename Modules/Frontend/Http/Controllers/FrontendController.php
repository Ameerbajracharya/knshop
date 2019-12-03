<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Slider\Entities\Slider;
use Modules\Setting\Entities\Setting;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Unit;
use Modules\Product\Entities\Scheme;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\ProductImage;
use Modules\Product\Entities\ProductType;
use Modules\Product\Entities\Productdetail;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use paginate;
use Illuminate\Routing\Controller;

class FrontendController extends Controller
{
    //Main frontend Page
    public function index()
    {
        $data['product'] = Product::where('status',1)->where('schemeid',1)->orderBy('created_at','DESC')->get();
        $data['category'] = Category::where('status',1)->get();
        $img = config('dimension.dimension-image-slider.slider-image-dimensions');
        $data['productimage'] = ProductImage::join('products','products.id','=', 'productid')
        ->where('product_images.status','=',1)
        ->select('product_images.*')
        ->get();

        $data['productimage'] = $data['productimage']->unique('productid')->values()->all(); 
        
         //Products That have scheme Offer or scheme Id=1
         for($i=0; $i< count($data['category']); $i++)
         {
            $data['general'][$i] = ProductImage::join('products','products.id','=','productid')
            ->where('products.status',1)
            ->where('products.schemeid',1)
            ->where('product_images.status',1)
            ->where('products.categoryid',$data['category'][$i]->id)
            ->select('products.*','product_images.*')
            ->paginate(8); 
            $data['general'][$i] = $data['general'][$i]->unique('productid')->values()->all();
         }
         //Products That have scheme Offer or scheme Id=2
        $data['offerimage'] = ProductImage::join('products','products.id','=','productid')
        ->where('products.status',1)
        ->where('products.schemeid',2)
        ->where('product_images.status',1)
        ->select('products.*','product_images.*')
        ->get(); 
        $data['offerimage'] = $data['offerimage']->unique('productid')->values()->all();
        
        //Product That have scheme Boost or Scheme Id=3
        $data['boost'] = Product::where('status',1)
        ->where('schemeid',3)
        ->get();
        $data['boostimage'] = array();
        foreach($data['boost'] as $boost)
        { 
            $data['boostimage'] = ProductImage::join('products','products.id','=','productid')
            ->where('product_images.productid',$boost->id)
            ->get();
        }
        if(!empty($data['boostimage']))
        { 
            $data['boostimage'] = $data['boostimage']->unique('productid')->values()->first();
        }

        $data['slider'] = Slider::where('status',1)->get();
        $data['brand'] = Brand::where('status',1)->get();  
        $data['about'] = Setting::first();
        return view('frontend::index',compact('data','img'));
    }


    //Search Part
    public function search(Request $request)
    {
        $search = strtolower($request->input('search'));
        $data['product'] = Product::where('productName','like', '%'.$search.'%')->where('status',1)->get();
        if($data['product']->count() > 0) {
            $data['product'] = Product::where('productName','like', '%'. $search .'%')->orderBy('created_at','DESC')->paginate(5);
            $data['productimage'] = ProductImage::join('products','products.id','=', 'productid')
            ->where('product_images.status','=',1)
            ->select('product_images.*')
            ->get();
            $data['productimage'] = $data['productimage']->unique('productid')->values()->all();
            $data['brand'] = Brand::where('status',1)->get();  
            $data['category'] = Category::where('status',1)->get();
            $data['about'] = Setting::first();
            return view('frontend::pages.search',compact('data','search')); 

        }
        else{
            Session::flash('warning','Product searched can\'t be found.');
            return redirect()->route('frontend');
        }
    }

    //Product Detail page
    public function productinfo($id)
    {
        $data['productinfo'] = Product::findorfail($id);
        $data['about'] = Setting::first();
        $data['brand'] = Brand::where('id',$data['productinfo']->brandid)->first();
        $data['category'] = Category::where('id',$data['productinfo']->categoryid)->first();
        $data['relateditem'] = Product::where('categoryid',$data['productinfo']->categoryid)->where('typeid',$data['productinfo']->typeid)->where('status',1)->where('schemeid',1)->orderBy('created_at','DESC')->get();
        $data['productimage'] = ProductImage::join('products','products.id','=', 'productid')
        ->where('product_images.productid',$id)
        ->where('product_images.status','=',1)
        ->get();

        $data['relatedimage'] = ProductImage::join('products','products.id','=', 'productid')
        ->where('product_images.productid','!=',$data['productinfo']->id)
        ->where('product_images.status','=',1)
        ->get();
        
        $data['relatedimage'] = $data['relatedimage']->unique('productid')->values()->all();

         //Boost is the scheme created through seeder with schemeid 3
        $data['boost'] = Product::where('status',1)
        ->where('schemeid',3)
        ->get();
        $data['boostimage'] = array();
        foreach($data['boost'] as $boost)
        { 
            $data['boostimage'] = ProductImage::join('products','products.id','=','productid')
            ->where('product_images.productid',$boost->id)
            ->get();
        }
        if(!empty($data['boostimage']))
        { 
            $data['boostimage'] = $data['boostimage']->unique('productid')->values()->first();
        }

        //offer is the scheme already in seeder with schemeid 2
        $data['offer'] = Product::where('status',1)
        ->where('schemeid',2)
        ->get();
        $data['offerimage'] = array();
        foreach($data['offer'] as $offer)
        { 
            $data['offerimage'] = ProductImage::join('products','products.id','=','productid')
            ->where('product_images.productid',$offer->id)
            ->get();
        }
        if(!empty($data['offerimage']))
        { 
            $data['offerimage'] = $data['offerimage']->unique('productid')->values()->first();
            //dd($data['offerimage']);
        }
        $data['productdetails'] = Productdetail::join('products','products.id','=', 'productid')
        ->where('productdetails.productid',$id)
        ->select('productdetails.*')
        ->first();
        return view('frontend::pages.product',compact('data'));
    }

    public function help()
    {
       $data['about'] = Setting::first();
       return view('frontend::pages.help',compact('data'));
   }
   public function category($id)
   {
       $data['about'] = Setting::first();
       $data['category'] = Category::findorfail($id);
       $data['general'] = ProductImage::join('products','products.id','=','productid')
            ->where('products.status',1)
            ->where('products.schemeid',1)
            ->where('product_images.status',1)
            ->where('products.categoryid',$id)
            ->select('products.*','product_images.*')
            ->get();
        $data['general'] = $data['general']->unique('productid')->values()->all();
       return view('frontend::pages.category',compact('data'));
   }
}
