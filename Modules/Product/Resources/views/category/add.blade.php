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
                            <div class="row">
                                <button class="btn btn-default btn-sm"><a href="{{Route('category.view')}}"  style="color: #e20909;">
                                        <i class="fa fa-list"></i>
                                        List</a>  </button>


                            </div>
                           
                        </div>
                        <!--/.form-->
                        @if(isset($data['category']))
                            {!! Form::model($data['category'],[
                                    'url' =>route('category.update',$data['category']->id),
                                    'enctype' => 'multipart/form-data',
                                    'onsubmit'=>"return checkForm(this)"
                            ]) !!}
                        @else
                            {!!Form::open([
                                    'url' => route('category.store'),
                                    'enctype' => 'multipart/form-data',
                                    'role' => 'form',
                                    'onsubmit'=>"return checkForm(this)"

                            ])!!}
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <br>
                                        <label>Category Name:</label>
                                        {{Form::text("category",null,
                                            [
                                                "class" => "form-control",
                                            ])
                                        }}
                                        @if($errors->has('category'))
                                            <span class="text-danger">*{{$errors->first('category')}}</span>
                                            <br>
                                        @endif
                                        <br>
                                         <label>Code:</label>
                                        {{Form::text("code",null,
                                            [
                                                "class" => "form-control",
                                            ])
                                        }}
                                        @if($errors->has('code'))
                                            <span class="text-danger">*{{$errors->first('code')}}</span>
                                            <br>
                                        @endif
                                        <br>
                                        <button type="submit" name="myButton" class="btn btn-primary">
                                            <span class="state">Save</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>



                                {!! Form::close() !!}

                            </div>

                            <!-- /.card -->
                        </div>
                    </div><!-- /.row -->
                </div>
    </section>


@endsection
