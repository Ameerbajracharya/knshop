<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Modules\Slider\Entities\Slider;
use Modules\Product\Entities\Product;
use Modules\Frontend\Entities\Order;
use Modules\Client\Entities\Client;
use Session;

class DashboardController extends BaseController
{
    protected $view_path = 'dashboard::';
    protected $base_route = 'dashboard';
    protected $panel = 'Dashboard';

    public function index()
    {
        $data['user'] = User::all();
        $data['client'] = Client::all();
        $data['order'] = Order::all();
        $data['product'] = Product::all();
        return view(parent::commondata($this->view_path.'dashboard_index'),compact('data'));
    }

    public function search(Request $request){
        $s = $request->search;
        $data = array();
        $data['slider']=Slider::where('title','LIKE', '%'.$s.'%')->get();
        $data['user']=User::where('name','LIKE', '%'.$s.'%')->get();
        $data['product']=Product::where('productName','LIKE', '%'.$s.'%')->get();
        $data['order']=Order::where('productname','LIKE', '%'.$s.'%')->get();
        if(count($data) > 0) {
            return view(parent::commondata($this->view_path . 'search'), compact('data'))
            ->with('search', request('search'))
            ->withQuery($s);
        }
        else{
            return view(parent::commondata($this->view_path.'search'),compact('data'))
            ->with('search', request('search'));
        }
    }

    // ORDER SECTION

    //Shows all the Orders
    public function order()
    {
        $data['order'] = Order::all();
        return view(parent::commondata($this->view_path.'Order.orders'),compact('data'));
    }

    //shows Specific Order
    public function showorder($id)
    {
        $data['order'] = Order::find($id);
        return view(parent::commondata($this->view_path.'Order.show'),compact('data'));
    }

    //Order Confirmation
    public function confirm($id)
    {
        $data['order'] = Order::find($id);
        if ($data['order']->confirm == 0)
        {
            $data['order']->confirm = 1;
        }
        else
        {
            $data['order']->confirm = 0;
        }

        $data['order'] ->save();
        Session::flash('success','Status Update Successfully');
        return redirect()->route('order.view');
    }

    //Delivery Confirmation
    public function delivery($id)
    {
        $data['order'] = Order::find($id);
        if ($data['order']->delivery == 0)
        {
            $data['order']->delivery = 1;
        }
        else
        {
            $data['order']->delivery = 0;
        }

        $data['order'] ->save();
        Session::flash('success','Status Update Successfully');
        return redirect()->route('order.view');
    }
}
