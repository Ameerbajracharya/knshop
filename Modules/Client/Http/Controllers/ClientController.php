<?php

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Entities\Client;
use Modules\Frontend\Entities\Order;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;
use Modules\Setting\Entities\Setting;
use Laravel\Socialite\Facades\Socialite;
use Modules\Slider\Entities\Slider;
use Session;

class ClientController extends BaseController
{
    protected $base_route = 'client';
    protected $view_path = 'client::';
    protected $panel = 'Client';
    protected $folder ='Client';
    protected $folderpath;
    protected $databaseimage = 'avatar';//name of the image column in database

    public function __construct(Client $model){
        $this->model = $model;
        $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
    }

    //Deals with what to be done after Cilents login
    public function loginClient(Request $request)
    {
        //dd(isset($_SERVER['HTTP_REFERER']));
        if(isset($_SERVER['HTTP_REFERER']))
        {
            $data['server'] = $_SERVER['HTTP_REFERER'];
        }
        else{
         $data['server'] = 'frontend';   
     }  
     $data['brand'] = Brand::all();  
     $data['category'] = Category::all();
     $data['about'] = Setting::first();
     return view(parent::commondata($this->view_path.'login'),compact('data'));
     }

   //Client Registration
     public function registerClient()
     {
        $data['brand'] = Brand::all();  
        $data['category'] = Category::all();
        $data['about'] = Setting::first();
        return view(parent::commondata($this->view_path.'register'),compact('data'));
    }

        //Provides Details About The Client
    public function index()
    {
        $data['client'] = Client::where('id', Auth('client')->user()->id);
       $data['about'] = Setting::first();
       return view(parent::commondata($this->view_path.'index'),compact('data'));
    }

        //CLient Section In Dashboard
    public function dashboardindex()
    {
        $data['client'] = Client::all();
        return view(parent::commondata($this->view_path.'dashboardindex'),compact('data'));
    }

    //Shows all the Order that Specified User Had Made in Frontend Section
    public function order($id)
    {
        $data['client'] = Client::find($id);
        $data['order'] = Order::where('email',$data['client']->email)->get();
        $data['brand'] = Brand::all();  
        $data['category'] = Category::all();
        $data['about'] = Setting::first();
        return view(parent::commondata($this->view_path.'orderlist'),compact('data'));
    }

    //Updates User Profile
    public function update(Request $request, $id)
    {
        //dd(isset($_SERVER['HTTP_REFERER']));
        if(isset($_SERVER['HTTP_REFERER']))
        {
            $data['server'] = $_SERVER['HTTP_REFERER'];
        }
        else{
         $data['server'] = 'frontend';   
     }  
        $data['client'] = Client::find($id);
         if($request->hasFile('image'))
        {
            if ($data['client']->avatar)
        {
            if(file_exists($this->folderpath.DIRECTORY_SEPARATOR.$data['client']->avatar))
            {
                unlink($this->folderpath . DIRECTORY_SEPARATOR.$data['client']->avatar);
            }
        }
            $file = $request->file('image');
            $img = config('dimension.dimension-image-slider.slider-image-dimensions');
            $name = uniqid().'-'.$file->getClientOriginalName();
            $file->move($this->folderpath . DIRECTORY_SEPARATOR,$name);
            $data['client']->avatar = $name;
        }
            $data['client']->name = $request->name;
            $data['client']->email = $request->email;
            $data['client']->mobile = $request->mobile;
            $data['client']->social_id = $request->social_id;
            $data['client']->address = $request->address;
            $data['client']->mobile = $request->mobile;
            $data['client']->password = bcrypt($data['client']->social_id);
            $data['client']->update();
        Session::flash('success','client Details Updated Successfully');
        return redirect()->route('client');
    }

    //Deletes Client In Dashboard
    public function delete($id)
    {
        $data['client'] = Client::find($id);
        $this->rowExist($data['client']);
        $data['client']->delete();
        Session::flash('success','Client Deleted Successfully');
        return redirect()->route('client.dashboardindex');
    }

    //Changes The Status of The CLient after Email Confirmation
    public function status($id)
    {
        $this->statuschange($id);
        return redirect()->route('client.dashboardindex');
    }
}
