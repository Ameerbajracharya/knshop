<?php

namespace Modules\Slider\Http\Controllers;

use App\Http\Controllers\BaseController;
use Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Http\Requests\AddFormValidation;
use Modules\Slider\Http\Requests\EditSliderValidation;
use Intervention\Image\ImageManager;
use Session;

class SliderController extends BaseController
{
    protected $base_route = 'viewslider';
    protected $view_path = 'slider::';
    protected $panel = 'Slider';
    protected $folder ='slider';
    protected $folderpath;
    protected $databaseimage = 'image';//name of the image column in database

    public function __construct(Slider $model){
        $this->model = $model;
        $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
    }


    public function view()
    {
        $img = config('dimension.dimension-image-slider.slider-image-dimensions');
        $data['slider'] = Slider::paginate(10);
        return view(parent::commondata($this->view_path.'index'),compact('data','img'));
    }

    public function create()
    {
        return view(parent::commondata($this->view_path.'form'));
    }


    public function store(AddFormValidation $request)
    {
            $this->storeimage($request);
            $data['slider']= Slider::create($request->all());
            Session::flash('success','Slider Store Successfully');
            return redirect()->Route($this->base_route);

    }

    public function edit($id)
    {
        $data['slider'] = Slider::find($id);
        $this->rowExist($data['slider']);
        return view(parent::commondata($this->view_path.'form'),compact('data'));
    }

    public function update(EditSliderValidation $request, $id)
    {
        $data['slider'] = Slider::find($id);
        $this->storeimage($request, $id);
        $data['slider']->update($request->all());
        Session::flash('success','Slider Update Successfully');
        return redirect()->Route($this->base_route);

    }

    public function destroy($id)
    {
        $data['slider'] = Slider::find($id);
        $this->rowExist($data['slider']);
        $this->destroydata($id);
        Session::flash('success','Slider delete Successfully');
        return redirect()->Route($this->base_route);
    }

    public function status($id)
    {

        $this->statuschange($id);
        return redirect()->route($this->base_route);

    }
}
