@extends('dashboard::layouts.master')
@section('title')
    {{$_panel}}
@endsection
@section('content')
    @include('dashboard::include.header')
     <div class="card-body">
         {!!Form::model($data['productdetail'] ,[
         'url' => route('productdetail.update',[$data['productdetail']->productid, $data['productdetail']->id]),
         'enctype' => 'multipart/form-data',
         'onsubmit' => "return checkForm(this)"
         ])!!}
                                <div class="form-group">
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Description:</label>
                                            {{Form::textarea("description",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('description'))
                                                <span class="text-danger">*{{$errors->first('description')}}</span>
                                                <br>
                                            @endif

                                           {{--  <label>Features:</label>
                                            {{Form::text("features",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('features'))
                                                <span class="text-danger">*{{$errors->first('features')}}</span>
                                                <br>
                                            @endif

                                            <label>Services:</label>
                                            {{Form::text("services",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('services'))
                                                <span class="text-danger">*{{$errors->first('services')}}</span>
                                                <br>
                                            @endif

 --}}
                                        </div>
                                        {{-- <div class="col-lg-4">

                                            <label>Color:</label>
                                            {{Form::text("color",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('color'))
                                                <span class="text-danger">*{{$errors->first('color')}}</span>
                                                <br>
                                            @endif

                                            <label>Capacity:</label>
                                            {{Form::text("capacity",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('capacity'))
                                                <span class="text-danger">*{{$errors->first('color')}}</span>
                                                <br>
                                            @endif

                                            <label>Size:</label>
                                            {{Form::text("size",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('size'))
                                                <span class="text-danger">*{{$errors->first('size')}}</span>
                                                <br>
                                            @endif

                                        </div> --}}
                                        <div class="col-lg-6">

                                            <label>keyword:</label>
                                            {{Form::text("keyword",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('keyword'))
                                                <span class="text-danger">*{{$errors->first('keyword')}}</span>
                                                <br>
                                            @endif


                                            <label>metaTags:</label>
                                            {{Form::text("metaTags",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('metaTags'))
                                                <span class="text-danger">*{{$errors->first('metaTags')}}</span>
                                                <br>
                                            @endif


                                            <label>metaDescription:</label>
                                            {{Form::text("metaDescription",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('metaDescription'))
                                                <span class="text-danger">*{{$errors->first('metaDescription')}}</span>
                                                <br>
                                            @endif
                                        </div>


                                    </div>
                                    <button type="submit" name="myButton" class="btn btn-primary ">
                                        <span class="state">Save</span>
                                    </button>

                                </div>
                            </div>
@endsection
