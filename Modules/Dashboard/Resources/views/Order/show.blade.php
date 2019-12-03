@extends('dashboard::layouts.master')
@section('title')


{{$data['order']->productname}}


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
                        <h3 class="card-title">{{$data['order']->productname}} Order</h3>
                        <div class="row">
                            <button class="btn btn-default btn-sm"><a href="{{route('order.view')}}"  style="color: #e20909;">
                                <i class="fa fa-list"></i>
                            List</a>
                        </button>

                    </div>
                </div>
                <div>
                <div class="row" style="padding: 20px;">
                    <div class="col-md-6">

                        {{-- ProductName --}}
                        <label>Product Name:</label>
                        <p>{{$data['order']->productname}}</p>

                        {{--quantity--}}
                        <label>Quantity</label>
                        <p>{{$data['order']->quantity}}</p>

                        {{-- email--}}
                        <label>Email:</label>
                        <p>{{$data['order']->email}}</p>
                    </div>
                    <div class="col-md-6">
                        {{-- Full Name --}}
                        <label>Client Name: </label>
                        <p>{{$data['order']->fullname}}</p>


                        {{--address--}}
                        <label>Address:</label>
                        <p>{{$data['order']->address}}</p>

                        {{--contact no --}}
                        <label>Contact:</label>
                        <p>{{$data['order']->contactno}}</p>

                        {{--Price --}}
                        <label>Price:</label>
                        <p>Rs. {{$data['order']->price}}</p>

                    </div>

                </div>
            </div>                            
        </div>
    </div>

    <!-- /.card -->
</div>
</div><!-- /.row -->
</div>
</section>


@endsection
