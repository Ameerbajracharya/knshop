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
              <button class="btn btn-default btn-sm"><a href="{{Route('productimage.view',$data['product']->id)}}"  style="color: #e20909;">
                <i class="fa fa-list"></i>
              List</a>  </button>
            </div>
          </div>
          <form action="{{route('productimage.store',$data['product']->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center">Product: {{$data['product']->productName}}</h3>
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>Image:</label>
                    <input type="file" name="image[]" multiple>
                    @if($errors->has('image'))
                    <span class="text-danger">*{{$errors->first('image')}}</span>
                    <br>
                    @endif
                    <br>


                  </div>
                  <div class="col-md-6"> 
                    <label style="color: red;">*you can select multiple images.</label>
                  </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection