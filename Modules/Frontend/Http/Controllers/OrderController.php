<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
use Modules\Frontend\Entities\Order;
use Modules\Frontend\Emails\OrderEmail;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Productdetail;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Mail;
use App\Mail\confirmEmail;
use Session;

class OrderController extends Controller
{   
    //Stores the information after Client buys any product
     public function store(Request $request, $productid)
    {
        $data['order']= new Order();
        $data['product'] = Product::findorfail($productid);
        $data['order']->productid = $productid;
        $data['order']->productname = $data['product']->productName;
        $data['order']->price=$data['product']->sellingPrice;
        $data['order']->quantity=$request->quantity;
        $data['order']->email= Auth('client')->user()->email;
        $data['order']->fullname= Auth('client')->user()->name;
        if(Auth('client')->user()->address)
        {
        $data['order']->address= Auth('client')->user()->address;
        }
        else{
            Session::flash('warning','Please Provide all the information Initially.');
            return redirect()->route('client');
        }
        $data['order']->contactno= Auth('client')->user()->mobile;
        $data['order']->save();
        $od=DB::table('orders')->select('*')->orderBy('id','desc')->first();
        return redirect()->route('payment',$od->id);
    }

    //final Page After All confirmation
    public function payment($id)
    { 
        $data['confirm']=DB::table('orders')
        ->join('products','orders.productid','=','products.id')
        ->join('product_images','orders.productid','=','product_images.productid')
        ->select('orders.*','products.productName','products.sellingPrice','product_images.image')
        ->where('orders.id','=',$id)
        ->first();  
        $data['order'] = Order::find($id);
        $data['category'] = Category::all();
        $data['about'] = Setting::first();
        return view('frontend::pages.payment',compact('data'));
    }

    //Confirmation Page
     public function confirm($id)
    {   
        $data['confirm']=DB::table('orders')
        ->join('products','orders.productid','=','products.id')
        ->join('product_images','orders.productid','=','product_images.productid')
        ->select('orders.*','products.productName','products.sellingPrice','product_images.image')
        ->where('orders.id','=',$id)
        ->first();
        $data['category'] = Category::all();
        $data['about'] = Setting::first();
        $confirm_mail = Order::findorfail($id);
        $this->sendConfirmationEmail($confirm_mail);
        Mail::to(env('MAIL_USERNAME'))->send(new OrderEmail($confirm_mail)); //sends Email to Admin wherever there is Order.
        Session::flash('success','Thank You for your Transcation.');
        return view('frontend::pages.confirm',compact('data'));
    }

    //Sends Email after Confirmation Of the Order
    public function sendConfirmationEmail($confirm_mail)
    {
        Mail::to($confirm_mail['email'])->send(new confirmEmail($confirm_mail));
    }

   //Updates the Status When CLient confirms the Order in Dashboard
    public function payment_update(Request $request, $id)
    {
        $data['order']=Order::find($id);
        $data['order']->confirm=1;
        $data['order']->save();
        return redirect()->route('confirm',$id);
    }  
    
    //All Action that are done in  Dashboard, Its function are kept in Dashboard Module's dashboardcontroller.
}
