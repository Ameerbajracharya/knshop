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
            <h3 class="card-title">{{$_panel}} Data</h3><br>
            <div class="row">
            </div>
          </div>
         
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>Product:</label>
                   <strong>{{$data['productimage']->productName}}</strong><br>
                    <label>Image:</label>
                    <br>
                    <img src="{{url($_folderpath.DIRECTORY_SEPARATOR.$data['productimage']->$_databaseimage)}}" style="width: 500px; height: 500px">
                    <br>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection