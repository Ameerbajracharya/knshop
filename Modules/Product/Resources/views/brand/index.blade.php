@extends('dashboard::layouts.master')
@section('title')


{{$_panel}}


@endsection
@section('content')
@include('dashboard::include.header')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$_panel}} Data</h3>
          @can('product-brand-create')
          <button class="btn btn-default btn-sm"><a href="{{route('brand.create')}}"  style="color: #e20909;">
            <i class="fa fa-plus"></i>
        Add</a>  </button>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
         <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Code</th>
                <th>Created</th>
                @can('product-brand-status')
                <th>Status</th>
                @endcan
                @can('product-brand-edit')
                <th>Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($data['brand'] as $brand)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$brand->brand}}</td>
                <td>{{$brand->code}}</td>
                <td>{{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}</td>
                @can('product-brand-status')
                @if($brand->status == 0)
                <td>
                    @if($brand->status == 0)
                    <a href="{{route('brand.status',$brand->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                    @else
                    <a href="" class="btn btn-sm btn-info">Active</a>
                    @endif
                </td>
                @else
                <td>
                    @if($brand->status == 1)
                    <a href="{{route('brand.status',$brand->id)}}" class="btn btn-sm btn-info">Active</a>

                    @else
                    <a href="" class="btn btn-sm btn-danger">Inactive</a>
                    @endif
                </td>
                @endif 
                @endcan
                @can('product-brand-edit')
                <td>
                    <a class="btn btn-primary btn-sm" href="{{Route('brand.edit',$brand->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                    @can('product-brand-delete')
                    <a class="btn btn-danger btn-sm delete" href="{{Route('brand.delete',$brand->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    @endcan
                </td>
                @endcan
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
</section>


@endsection
