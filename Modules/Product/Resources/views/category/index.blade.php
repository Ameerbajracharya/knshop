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
          @can('product-category-create')
          <button class="btn btn-default btn-sm">
            <a href="{{route('category.create')}}"  style="color: #e20909;">
                <i class="fa fa-plus"></i>
                Add
            </a>  
        </button>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
         <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Code</th>
                <th>Created</th>
                @can('product-category-status')
                <th>Status</th>
                @endcan
                @can('product-category-edit')
                <th>Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($data['category'] as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->category}}</td>
                <td>{{$category->code}}</td>
                <td>{{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                @can('product-category-status')
                @if($category->status == 0)
                <td>
                    @if($category->status == 0)
                    <a href="{{route('category.status',$category->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                    @else
                    <a href="" class="btn btn-sm btn-info">Active</a>
                    @endif
                </td>
                @else
                <td>
                    @if($category->status == 1)
                    <a  href="{{route('category.status',$category->id)}}" class="btn btn-sm btn-info">Active</a>

                    @else
                    <a href="" class="btn btn-sm btn-danger">Inactive</a>
                    @endif
                </td>
                @endif
                @endcan
                @can('product-category-edit')
                <td>
                    <a class="btn btn-primary btn-sm" href="{{Route('category.edit',$category->id)}}"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                    @endcan
                    @can('product-category-delete')
                    <a class="btn btn-danger btn-sm delete" href="{{Route('category.delete',$category->id)}}"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></td>
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
</div>
</section>


@endsection
