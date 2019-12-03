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


                        <h3 class="card-title">{{$_panel}} Data</h3>
                        <div class="row">
                            <button class="btn btn-default btn-sm"><a href="{{Route('product.view')}}"  style="color: #e20909;">
                                <i class="fa fa-list"></i>
                            List</a>
                        </button>

                    </div>
                    <div class="card-tools">

                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i
                                    class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">

                        @foreach($productsdetails as $productsdetails)
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- Name --}}
                                <label>Name:</label>
                                <p>{{$productsdetails->productName}}</p>

                                {{-- Code --}}
                                <label>Code:</label>
                                <p>{{$productsdetails->code}}</p>


                                {{-- qrCode --}}
                                <label>QR Code:</label>
                                <p>{{$productsdetails->qrCode}}</p>

                                {{-- BarCode --}}
                                <label>Bar Code:</label>
                                <p>{{$productsdetails->barCode}}</p>


                                {{-- Wholesale Price --}}
                                <label>Wholesale Price:</label>
                                <p>Rs. {{$productsdetails->wholeSalePrice}}</p>


                                {{-- MarkedPlace --}}
                                <label>Marked Price:</label>
                                <p>Rs. {{$productsdetails->markedPrice}}</p>

                                {{-- Selling Price --}}
                                <label>Selling Price:</label>
                                <p>Rs. {{$productsdetails->sellingPrice}}</p>

                            </div>


                            <div class="col-lg-6">

                                {{-- Brand --}}
                                <label>Brand:</label>
                                <p>{{$productsdetails->brand}}</p>

                                {{-- Category --}}
                                <label>Category:</label>
                                <p>{{$productsdetails->category}}</p>

                                {{-- ProductType --}}
                                <label>Product Type:</label>
                                <p>{{$productsdetails->type}}</p>

                                {{-- Unit  --}}
                                <label>Unit:</label>
                                <p>{{$productsdetails->unit}}</p>

                                {{-- Alternative Unit  --}}
                                <label>Scheme:</label>
                                <p>{{$productsdetails->name}}</p>
                                
                            </div>

                        </div>
                        @endforeach
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
