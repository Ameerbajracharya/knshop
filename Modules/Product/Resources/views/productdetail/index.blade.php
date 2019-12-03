@extends('dashboard::layouts.master')
@section('title')


{{$_panel}}


@endsection
@section('content')

@include('dashboard::include.header')
<section class="content">
  <div class="card-header">


    <h3 class="card-title">{{$_panel}} Data</h3>
    <div class="row">
      <button class="btn btn-info btn-sm" style=" margin-right: 10px;"><a href="{{route('product.view')}}"  style="color: white;">
        <i class="fa fa-chevron-left"></i>
      Back</a>
    </button>
    @can('product-detail-edit')
    <button class="btn btn-default btn-sm"><a href="{{Route('productdetail.edit',[$data['productdetail']->productid])}}"  style="color: #e20909;">
      <i class="fa fa-list"></i>
    Edit</a>
  </button>
  @endcan
  <br>

</div>
<br>
<div class="row">
 <div class="col-lg-6">
   <label for="">Name:</label>
   <p>{{$data['product']->productName}}</p>

   <label for="">Description:</label>
   <p>{{$data['productdetail']->description}}</p>

   <!--<label for="">capacity:</label>-->
   <!--<p>{{-- {{$data['productdetail']->capacity}} --}}</p>-->

 </div>
 <!--<div class="col-lg-6">-->
   <!--<label for="">services:</label>-->
   <!--<p>{{-- {{$data['productdetail']->services}} --}}</p>-->

   <!--<label for="">features:</label>-->
   <!--<p>{{-- {{$data['productdetail']->features}} --}}</p>-->

   <!--<label for="">size:</label>-->
   <!--<p>{{-- {{$data['productdetail']->size}} --}}</p>-->
 <!--</div>-->
 <div class="col-lg-6">
   <!--<label for="">color:</label>-->
   {{-- <!-- <p>{{$data['productdetail']->color}</p> --> --}}

   <label for="">Keywords:</label>
   <p>{{$data['productdetail']->keyword}}</p>
   
   <label for="">Meta-Description:</label>
   <p>{{$data['productdetail']->metaDescription}}</p>

   <label for="">Meta-Tags:</label>
   <p>{{$data['productdetail']->metaTags}}</p>
 </div>
</div>

</div>
</section>
@endsection
