@extends('dashboard::layouts.master')
@section('title')


{{$_panel}}


@endsection
@section('content')
@include('dashboard::include.header')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">


                        <h3 class="card-title">{{$_panel}} Data</h3>
                        @can('slider')
                        <div class="row">
                            <button class="btn btn-default btn-sm"><a href="{{Route('viewslider')}}"  style="color: #e20909;">
                                <i class="fa fa-list"></i>
                            List</a>
                        </button>

                    </div>
                    @endcan
                    <div class="card-tools">

                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i
                                    class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!--/.form-->
                @if(isset($data['slider']))
                {!! Form::model($data['slider'],[
                    'url' =>route('updateslider',$data['slider']->id),
                    'enctype' => 'multipart/form-data',
                    'onsubmit'=>"return checkForm(this)"
                    ]) !!}
                    @else
                    {!!Form::open([
                        'url' => route('addslider'),
                        'enctype' => 'multipart/form-data',
                        'role' => 'form',
                        'onsubmit'=>"return checkForm(this)"

                        ])!!}
                        @endif
                        <div class="card-body">
                            <div class="form-group">

                                <div class="row">
                                    @if(isset($data['slider']))
                                    <div class="col-lg-6">
                                        <img
                                        src="{{asset('public/images/slider/'.$data['slider']->$_databaseimage)}}"
                                        alt="slider image" style="width: 50px; height: 50px">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Image:</label>
                                        {{Form::file("mainimage",null,
                                            [
                                                'class'=>'form-control',
                                            ])
                                        }}
                                        <br>
                                        @if($errors->has('mainimage'))
                                        <span class="text-danger">*{{$errors->first('mainimage')}}</span>
                                        <br>
                                        @endif
                                    </div>
                                    @else
                                    <div class="col-lg-6">
                                        <label>Image:</label>
                                        {{Form::file("mainimage",null,
                                            [
                                                'class'=>'form-control',
                                            ])
                                        }}
                                        <br>
                                        @if($errors->has('mainimage'))
                                        <span class="text-danger">*{{$errors->first('mainimage')}}</span>
                                        <br>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-lg-6">

                                        <label>Title:</label>
                                        {{Form::text("title",null,
                                         [
                                             "class" => "form-control",
                                         ])
                                     }}
                                     @if($errors->has('title'))
                                     <span class="text-danger">*{{$errors->first('title')}}</span>
                                     <br>
                                     @endif
                                     <br>
                                     <label>MetaTag:</label>
                                     {{Form::text("metatag",null,
                                         [
                                             "class" => "form-control",
                                         ])
                                     }}
                                     @if($errors->has('metadata'))
                                     <span class="text-danger">*{{$errors->first('title')}}</span>
                                     <br>
                                     @endif
                                     <br>

                                     <label>Tags:</label>
                                     {{Form::text("tags",null,
                                         [
                                             "class" => "form-control",
                                         ])
                                     }}
                                     @if($errors->has('metadata'))
                                     <span class="text-danger">*{{$errors->first('title')}}</span>
                                     <br>
                                     @endif
                                     <br>
                                     <!-- Keywords -->
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

                                     <br>
                                 </div>
                                 <div class="col-lg-6">


                                    <label>Description:</label>
                                    {{Form::textarea("description",null,
                                        [
                                            "class" => "form-control",

                                        ])
                                    }}
                                    @if($errors->has('title'))
                                    <span class="text-danger">*{{$errors->first('description')}}</span>
                                    <br>
                                    @endif
                                    <br>




                                    <!-- End of Keywords -->
                                </div>
                            </div>
                            <button type="submit" name="myButton"  class="btn btn-primary">
                                <span class="state">Save</span>
                            </button>

                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

                <!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div>
</section>


@endsection
