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

                    </div>
                </div>
                <!--/.form-->
                @if(isset($data['setting']))
                {!! Form::model($data['setting'],[
                    'url' =>route('setting.update',$data['setting']->id),
                    'enctype' => 'multipart/form-data',
                    'onsubmit'=>"return checkForm(this)"
                    ]) !!}
                    @else
                    {!!Form::open([
                        'url' => route('setting.store'),
                        'enctype' => 'multipart/form-data',
                        'role' => 'form',
                        'onsubmit'=>"return checkForm(this)"

                        ])!!}
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            @if(isset($data['setting']))
                                            <div class="col-lg-6">
                                                <img
                                                src="{{asset('public/images/logo/'.$data['setting']->$_databaseimage)}}"
                                                alt="setting image" style="width: 100px; height: 100px">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Logo:</label>
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
                                                <label>Logo:</label>
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


                                        <label>Name:</label>
                                        {{Form::text("name",null,
                                           [
                                               "class" => "form-control",
                                           ])
                                       }}
                                       @if($errors->has('name'))
                                       <span class="text-danger">*{{$errors->first('name')}}</span>
                                       <br>
                                       @endif
                                       <br>

                                       <label>Address:</label>
                                       {{Form::text("address",null,
                                           [  
                                               "class" => "form-control",
                                           ])
                                       }}
                                       @if($errors->has('address'))
                                       <span class="text-danger">*{{$errors->first('address')}}</span>
                                       <br>
                                       @endif
                                       <br>
                                       <label>Contact:</label>
                                       {{Form::text("contact",null,
                                           [
                                               "class" => "form-control",
                                           ])
                                       }}
                                       @if($errors->has('contact'))
                                       <span class="text-danger">*{{$errors->first('contact')}}</span>
                                       <br>
                                       @endif
                                       <br>

                                       <label>Email:</label>
                                       {{Form::text("email",null,
                                           [
                                            "placeholder" => "example@gmail.com",
                                            "class" => "form-control",
                                        ])
                                    }}
                                    @if($errors->has('email'))
                                    <span class="text-danger">*{{$errors->first('email')}}</span>
                                    <br>
                                    @endif
                                    <br>

                                </div>
                                <div class="col-lg-6">
                                    <!-- Keywords -->

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
                                    <div class="row">
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

                                           <br>
                                           <label>Caption:</label>
                                           {{Form::text("caption",null,
                                               [
                                                "placeholder" => "Eg: Google",
                                                "class" => "form-control",
                                            ])
                                        }}
                                        @if($errors->has('caption'))
                                        <span class="text-danger">*{{$errors->first('caption')}}</span>
                                        <br>
                                        @endif
                                        <br>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Facebook:</label>
                                        {{Form::url("facebook",null,
                                           [
                                            "placeholder" => "Insert Facebook URL.",
                                            "class" => "form-control",
                                        ])
                                    }}
                                    @if($errors->has('facebook'))
                                    <span class="text-danger">*{{$errors->first('facebook')}}</span>
                                    <br>
                                    @endif
                                    <br>
                                    <label>Instagram:</label>
                                    {{Form::url("instagram",null,
                                       [
                                        "placeholder" => "Insert instagram URL.",
                                        "class" => "form-control",
                                    ])
                                }}
                                @if($errors->has('instagram'))
                                <span class="text-danger">*{{$errors->first('instagram')}}</span>
                                <br>
                                @endif
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">
                    Submit
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
