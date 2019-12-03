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
          @can('product-create')
          <button class="btn btn-default btn-sm">
            <a href="{{route('product.create')}}"  style="color: #e20909;">
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
                <th>No.</th>
                <th>Name</th>
                <th>Code</th>
                <th>Category</th>
                <th>Scheme</th>
                <th>Image</th>
                @can('product-status')
                <th>Status</th>
                @endcan
                <th>Time</th>
                @can('product-detail')
                <th>Detail</th>
                @endcan
                <th>Setting</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($productsdetails as $products)
            <tr>
                <td>{{ $loop->iteration }}</td>
            {{--   <td> <img src="{{asset('public/images/product/'.$products->image)}}" alt="" style="width: 50px; height: 50px">
            </td> --}}
            <td>{{ucfirst($products->productName)}}</td>
            <td>{{$products->code}}</td>
            <td>
                @if(isset($products->categoryid))
                {{$products->category}}
                @else
                {{" Unknown category"}}
                @endif
            </td>

            {{-- Scheme Status --}}
            @if($products->schemeid == 1)
            <td>
                @if($products->schemeid == 1)
                <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-info">General</a>
                @elseif($products->schemeid == 2)
                <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-success">Offer</a>
                @elseif($products->schemeid == 3)
                <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-warning">Boost</a>
                @endif
            </td>
            @elseif($products->schemeid == 2)
            <td>
               @if($products->schemeid == 1)
               <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-info">General</a>
               @elseif($products->schemeid == 2)
               <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-success">Offer</a>
               @elseif($products->schemeid == 3)
               <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-warning">Boost</a>
               @endif
           </td>
           @elseif($products->schemeid == 3)
           <td>
             @if($products->schemeid == 1)
             <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-info">General</a>
             @elseif($products->schemeid == 2)
             <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-success">Offer</a>
             @elseif($products->schemeid == 3)
             <a href="{{route('product.scheme',$products->id)}}" class="btn btn-sm btn-warning">Boost</a>
             @endif
         </td>
         @endif

         <td>
            <a href="{{Route('productimage.view',$products->id)}}">View Image</a>
        </td>
        @can('product-status')
        @if($products->status == 0)
        <td>
            @if($products->status == 0)
            <a href="{{route('product.status',$products->id)}}" class="btn btn-sm btn-danger">Inactive</a>
            @else
            <a href="" class="btn btn-sm btn-info">Active</a>
            @endif
        </td>
        @else
        <td>
            @if($products->status == 1)
            <a href="{{route('product.status',$products->id)}}" class="btn btn-sm btn-info">Active</a>

            @else
            <a href="" class="btn btn-sm btn-danger">Inactive</a>
            @endif
        </td>

        @endif
        @endcan
        <td>{{Carbon\Carbon::parse($products->created_at)->diffForHumans()}}</td>
        @can('product-detail')
        <td>
            <a href="{{Route('productdetail.view', $products->id)}}">View Detail</a>

        </td>
        @endcan
        <td>
            <a class="btn btn-info btn-sm" href="{{Route('product.show',$products->id)}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
            @can('product-edit')
            <a class="btn btn-primary btn-sm"  href="{{Route('product.edit',$products->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
            @endcan
            @can('product-delete')
            <a class="btn btn-danger btn-sm delete" href="{{Route('product.delete',$products->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
            @endcan
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
