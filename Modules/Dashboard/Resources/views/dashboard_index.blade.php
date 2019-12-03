
@extends('dashboard::layouts.master')
@section('title')


{{$_panel}}


@endsection
@section('content')
@include('dashboard::include.header')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

           {{-- Users --}}
           @role('admin')
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Total Users</h4>
                    <h3><b>{{count($data['user'])}}</b></h3>
                </div>
                <div class="icon">
                    <i class="nav-icon fa fa-user-circle"></i>
                </div>

                <a href="{{Route('users.index')}}" class="small-box-footer">More info <i
                    class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endrole
            <!-- ./col -->
            @can('slider')
            {{-- Silder --}}
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4>Total Clients</h4>
                        <h3><b>{{count($data['client'])}}</b></h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-users"></i>
                    </div>

                    <a href="{{Route('client.dashboardindex')}}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endcan

                @role('admin|shop')
                {{-- Product --}}
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Total Products</h4>
                            <h3><b>{{count($data['product'])}}</b></h3>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fa fa-cart-plus"></i>
                        </div>

                        <a href="{{route('product.view')}}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endrole
                    <!-- ./col -->
                    @role('admin|shop')
                    {{-- Brands --}}
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4>Total Orders</h4>
                                <h3><b>{{count($data['order'])}}</b></h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa fa-book"></i>
                            </div>

                            <a href="{{route('order.view')}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endrole
                        {{-- Users --}}
                        @role('admin')
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4>Users</h4>
                                </div>

                                <a href="{{Route('users.index')}}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            @endrole
                            <!-- ./col -->
                            @can('slider')
                            {{-- Silder --}}
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h4>Slider</h4>


                                    </div>

                                    <a href="{{Route('viewslider')}}" class="small-box-footer">More info <i
                                        class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                @endcan

                                @role('admin|shop')
                                {{-- Product --}}
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h4>Product</h4>


                                        </div>

                                        <a href="{{route('product.view')}}" class="small-box-footer">More info <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    @endrole
                                    <!-- ./col -->
                                    @role('admin|shop')
                                    {{-- Brands --}}
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h4>Brands</h4>


                                            </div>

                                            <a href="{{route('brand.view')}}" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        @endrole
                                        <!-- ./col -->
                                        @role('admin|shop')
                                        {{-- Units --}}
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h4>Units</h4>


                                                </div>

                                                <a href="{{route('unit.view')}}" class="small-box-footer">More info <i
                                                    class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            @endrole
                                            <!-- ./col -->

                                            {{-- @role('admin|shop') --}}
                                            {{-- AltUnit --}}
{{--                                 <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h4>Alt. Unit</h4>


                                        </div>

                                        <a href="{{route('altunit.view')}}" class="small-box-footer">More info <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div> --}}
                                    {{--  @endrole --}}
                                    <!-- ./col -->

                                    {{-- Category --}}
                                    @role('admin|shop')
                                    {{-- Category --}}
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h4>Category</h4>


                                            </div>

                                            <a href="{{route('category.view')}}" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        {{-- productType --}}
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h4>ProductType</h4>


                                                </div>

                                                <a href="{{route('producttype.view')}}" class="small-box-footer">More info <i
                                                    class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            @endrole
                                            {{-- About --}}
                                            @role('admin')
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-warning">
                                                    <div class="inner">
                                                        <h4>Abouts</h4>
                                                    </div>
                                                    <a href="{{Route('setting.index')}}" class="small-box-footer">More info <i
                                                        class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div> 
                                                @endrole
                                                <!-- ./col -->

                                                <!-- ./col -->
                                            </div>
                                        </div>
                                    </section>
                                    <!-- /.content -->
                                    @stop
