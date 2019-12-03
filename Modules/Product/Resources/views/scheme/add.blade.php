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


                            <h3 class="card-title">{{$_panel}} </h3>
                            <div class="row">
                                <button class="btn btn-default btn-sm"><a href="{{Route('scheme.view')}}"  style="color: #e20909;">
                                        <i class="fa fa-list"></i>
                                        List</a>
                                </button>
                            </div>
                        </div>
                            <!--/.form-->
                            @if(isset($data['scheme']))
                                {!! Form::model($data['scheme'],[
                                    'url' =>route('scheme.update',$data['scheme']->id),
                                    'enctype' => 'multipart/form-data',
                                    'onsubmit'=>"return checkForm(this)"
                                    ]) !!}
                            @else
                                {!!Form::open([
                                    'url' => route('scheme.store'),
                                    'enctype' => 'multipart/form-data',
                                    'role' => 'form',
                                    'onsubmit'=>"return checkForm(this)"

                                    ])!!}
                            @endif
                            <div class="card-body">
                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            {{-- Name --}}
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
                                            <br>

                                        </div>

                                        <div class="col-lg-4">

                                            <label>Discount Percent:</label>
                                            {{Form::number("discountpercent",null,
                                                [
                                                    "class" => "form-control",
                                                    "min" => 1
                                                ])
                                            }}
                                            @if($errors->has('discountpercent'))
                                                <span class="text-danger">*{{$errors->first('discountpercent')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            <label>Discount Amount:</label>
                                            {{Form::number("discountamount",null,
                                                [
                                                    "class" => "form-control",
                                                    "min" => 1
                                                ])
                                            }}
                                            @if($errors->has('discountamount'))
                                                <span class="text-danger">*{{$errors->first('discountamount')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            <label>Start Date:</label>
                                            {{Form::date("startdate",null,
                                                [
                                                    "class" => "form-control",
                                                    "required",
                                                ])
                                            }}
                                            @if($errors->has('startdate'))
                                                <span class="text-danger">*{{$errors->first('startdate')}}</span>
                                                <br>
                                            @endif
                                            <br>



                                            <label>End Date:</label>
                                            {{Form::date("enddate",null,
                                                [
                                                    "class" => "form-control",
                                                    "id" =>'reservationtime',
                                                    "required",
                                                ])
                                            }}
                                            @if($errors->has('enddate'))
                                                <span class="text-danger">*{{$errors->first('enddate')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                        </div>

                                        <div class="col-lg-4">


                                            <label>Caption:</label>
                                            {{Form::text("caption",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('caption'))
                                                <span class="text-danger">*{{$errors->first('caption')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            <label>Keyword:</label>
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


                                            <label>metaTag:</label>
                                            {{Form::text("metaTags",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('metaTag'))
                                                <span class="text-danger">*{{$errors->first('metaTag')}}</span>
                                                <br>
                                            @endif
                                            <br>


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
                                            <br>



                                        </div>

                                    </div>
                                    <button type="submit" name="myButton" class="btn btn-primary ">
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
