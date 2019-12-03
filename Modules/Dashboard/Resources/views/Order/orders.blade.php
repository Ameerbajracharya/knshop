@extends('dashboard::layouts.master')
@section('title')


Order


@endsection
@section('content')
@include('dashboard::include.header')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
         <thead>
            <tr>
                <th>No.</th>
                <th>Client Name</th>
                <th>Product</th>
                <th>Contact</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Created</th>
                <th>Confirm</th>
                <th>Delivered</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['order'] as $order)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$order->fullname}}</td>
                <td>{{$order->productname}}</td>
                <td>{{$order->contactno}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->address}}</td>
                <td>{{Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</td>
                {{-- Confirmation status --}}
                @if($order->confirm == 0)
                <td>
                    @if($order->confirm == 0)
                    <a href="{{route('confirm.status',$order->id)}}" class="btn btn-sm btn-danger">Not Confirmed</a>
                    @else
                    <a href="" class="btn btn-sm btn-info">Delivered</a>
                    @endif
                </td>
                @else
                <td>
                    @if($order->confirm == 1)
                    <a href="{{route('confirm.status',$order->id)}}" class="btn btn-sm btn-info">Confirmed</a>

                    @else
                    <a href="" class="btn btn-sm btn-danger">Not Delivered</a>
                    @endif
                </td>
                @endif
                {{-- Delivery Status --}}
                @if($order->delivery == 0)
                <td>
                    @if($order->delivery == 0)
                    <a href="{{route('delivery.status',$order->id)}}" class="btn btn-sm btn-danger">Not Delivered</a>
                    @else
                    <a href="" class="btn btn-sm btn-info">Delivered</a>
                    @endif
                </td>
                @else
                <td>
                    @if($order->delivery == 1)
                    <a href="{{route('delivery.status',$order->id)}}" class="btn btn-sm btn-info">Delivered</a>

                    @else
                    <a href="" class="btn btn-sm btn-danger">Not Delivered</a>
                    @endif
                </td>
                @endif
                <td><a href="{{ route('order.show',$order->id) }}" class="btn btn-sm btn-success">Full Details</a></td>
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
