@extends('dashboard::layouts.master')
@section('title')


{{$_panel}}


@endsection
@section('content')

@include('dashboard::include.header')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$_panel}} Data</h3>
          <button class="btn btn-info btn-sm" style=" margin-right: 10px;"><a href="{{route('product.view')}}"  style="color: white;">
              <i class="fa fa-chevron-left"></i>
          Back</a>
      </button>
      <button class="btn btn-default btn-sm"><a href="{{route('productimage.create',$data['product']->id)}}"  style="color: #e20909;">
        <i class="fa fa-plus"></i>
    Add</a> 
</button>
</div>
<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Image</th>
            <th>Status</th>
            <th>Time</th>
            <th>Setting</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data['productimage'] as $product)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->productName}}</td>
            <td><img src="{{url($_folderpath.DIRECTORY_SEPARATOR.$product->$_databaseimage)}}" style="width: 50px; height: 50px"></td>
            @if($product->status == 0)
            <td>
                @if($product->status == 0)
                <a href="{{route('productimage.status',[$product->productid, $product->id])}}" class="btn btn-sm btn-danger">Inactive</a>
                @else
                <a href="" class="btn btn-sm btn-info">Active</a>
                @endif
            </td>
            @else
            <td>
                @if($product->status == 1)
                <a href="{{route('productimage.status',[$product->productid, $product->id])}}" class="btn btn-sm btn-info">Active</a>
                @else
                <a href="" class="btn btn-sm btn-danger">Inactive</a>
                @endif
            </td>
            @endif
            <td>{{Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{Route('productimage.show',[$product->productid, $product->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                {{-- <a class="btn btn-primary btn-sm"  href="{{Route('productimage.edit',[$product->productid, $product->id])}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> --}}
                <a class="btn btn-danger btn-sm delete" href="{{Route('productimage.delete',[$product->productid, $product->id])}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div><!-- /.row -->
</div>
</section>


@endsection
