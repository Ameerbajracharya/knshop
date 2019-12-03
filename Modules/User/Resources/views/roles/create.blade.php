@extends('dashboard::layouts.master')


@section('content')
@include('dashboard::include.header')


<section class="content">
  <div class="containter-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Create New Role</h3>
            <button class="btn btn-default btn-sm"><a href="{{route('roles.index')}}"  style="color: #e20909;">
              <i class="fa fa-plus"></i>
            View</a>  </button>
            <div class="card-tools">

              <div class="input-group input-group-sm" style="width: 150px;">

                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>


              </div>

            </div>
            <br>
          </div>



          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif


          {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
          <div class="row" style="margin-left: 1%;">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Permission:</strong>
                <br>
                <input type="button" id="toggle" value="Check all" onclick="toggle_check()">
                <div class="row">
                  @foreach($permission as $value)
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                      {{ $value->name }}</label>
                      <br>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" style="margin-bottom: 1%;">Submit</button>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection