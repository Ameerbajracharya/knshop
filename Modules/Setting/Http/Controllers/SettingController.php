<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\BaseController;
use Modules\Setting\Entities\Setting;
use Validator;
use Modules\Setting\Http\Requests\EditSettingValidation;
use Intervention\Image\ImageManager;
use Image;
use Session;


class SettingController extends BaseController
{

    protected $view_path = 'setting::';
    protected $base_route = 'viewsetting';
    protected $folder ='logo';
    protected $folderpath;
    protected $databaseimage = 'logo';//name of the image column in database
    protected $panel = 'About';


    public function __construct(Setting $model){
        $this->model = $model;
        $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
    }


    public function setting(){

        $data['setting'] = Setting::first();    
        if($data['setting']){
            return view(parent::commondata($this->view_path.'form'),compact('data'));
        }
        else{
            return view(parent::commondata($this->view_path.'form'));
        }
} 

    public function store(EditSettingValidation $request)
    {
            $this->storeimage($request);
            $data['setting']= Setting::create($request->all());
            Session::flash('success','Setting Store Successfully');
           return redirect()->Route('setting.index');
     }

    public function update(EditSettingValidation $request, $id)
    {
        $data['setting'] = Setting::first();
        $this->storeimage($request,$data['setting']->id);
        $data['setting']->update($request->all());
        //dd($data['setting']);
        Session::flash('success','Setting Updated Successfully.');
        return redirect()->Route('setting.index');
    }
}
