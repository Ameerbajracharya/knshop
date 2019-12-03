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
                    <!--/.form-->
                    @if(isset($data['product']))
                    {!! Form::model($data['product'],[
                        'url' =>route('product.update',$data['product']->id),
                        'enctype' => 'multipart/form-data',
                        'onsubmit'=>"return checkForm(this)"
                        ]) !!}
                        @else
                        {!!Form::open([
                            'url' => route('product.store'),
                            'enctype' => 'multipart/form-data',
                            'role' => 'form',
                            'onsubmit'=>"return checkForm(this)"

                            ])!!}
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {{-- Name --}}
                                            <label>Name:</label>
                                            {{Form::text("productName",old("productName"),
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Enter Product Name"
                                                ])
                                            }}
                                            @if($errors->has('productName'))
                                                <span class="text-danger">*{{$errors->first('productName')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                            {{-- Wholesale Price --}}
                                            <label>Wholesale Price:</label>
                                            {{Form::number("wholeSalePrice",old("wholeSalePrice"),
                                                [
                                                    "class" => "form-control",
                                                    "min" => 1,
                                                    "placeholder" => "Enter WholeSale Price"
                                                ])
                                            }}
                                            @if($errors->has('wholeSalePrice'))
                                                <span class="text-danger">*{{$errors->first('wholeSalePrice')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            {{-- MarkedPlace --}}
                                            <label>Marked Price:</label>
                                            {{Form::number("markedPrice",old("markedPrice"),
                                                [
                                                    "class" => "form-control",
                                                    "min" => 1,
                                                    "placeholder" => "Enter Product marked Price"
                                                ])
                                            }}
                                            @if($errors->has('markedPrice'))
                                                <span class="text-danger">*{{$errors->first('markedPrice')}}</span>
                                                <br>
                                            @endif
                                            <br>


                                            {{-- Selling Price --}}
                                            <label>Selling Price:</label>
                                            {{Form::number("sellingPrice",old("sellingPrice"),
                                                [
                                                    "class" => "form-control",
                                                    "min" => 1,
                                                    "placeholder" => "Enter Selling Price"
                                                ])
                                            }}
                                            @if($errors->has('sellingPrice'))
                                                <span class="text-danger">*{{$errors->first('sellingPrice')}}</span>
                                                <br>
                                            @endif
                                            <br>


                                            {{-- Code --}}
                                           {{--  <label>Code:</label>
                                            {{Form::text("code",old("code"),
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Enter Product Code"
                                                ])
                                            }}
                                            @if($errors->has('code'))
                                                <span class="text-danger">*{{$errors->first('code')}}</span>
                                                <br>
                                            @endif
                                            <br> --}}

                                            {{-- qrCode --}}
                                            {{-- <label>QR Code:</label>
                                            {{Form::text("qrCode",old("qrCode"),
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Enter Product QrCode"
                                                ])
                                            }}
                                            @if($errors->has('qrCode'))
                                                <span class="text-danger">*{{$errors->first('qrCode')}}</span>
                                                <br>
                                            @endif
                                            <br> --}}

                                            {{-- BarCode --}}
                                           {{--  <label>Bar Code:</label>
                                            {{Form::text("barCode",old("barCode"),
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Enter Product barcode"
                                                ])
                                            }}
                                            @if($errors->has('barCode'))
                                                <span class="text-danger">*{{$errors->first('barCode')}}</span>
                                                <br>
                                            @endif
                                            <br> --}}
                                        </div>
                                        <div class="col-sm-6">
                                            
                                            {{-- Alternative Unit  --}}
                                            <label>Product Scheme:</label>
                                            {{Form::select("schemeid",$data['scheme'], null,
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Pick a Scheme Type."
                                                ])
                                            }}
                                            @if($errors->has('schemeid'))
                                                <span class="text-danger">*{{$errors->first('schemeid')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            {{-- Brand --}}
                                            <label>Brand:</label>

                                            {{Form::select("brandid",$data['brand'], null,
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Pick a brand...",
                                                ])
                                            }}

                                            @if($errors->has('brandid'))
                                                <span class="text-danger">*{{$errors->first('brandid')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            {{-- Category --}}
                                            <label>Category:</label>
                                            {{Form::select("categoryid",$data['category'], null,
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Pick a category"
                                                ])
                                            }}
                                            @if($errors->has('categoryid'))
                                                <span class="text-danger">*{{$errors->first('categoryid')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            {{-- ProductType --}}
                                            <label>Product Type:</label>
                                            {{Form::select("typeid",$data['producttype'], null,
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Pick a Product Type"
                                                ])
                                            }}
                                            @if($errors->has('typeid'))
                                                <span class="text-danger">*{{$errors->first('typeid')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            {{-- Unit  --}}
                                            <label>Unit:</label>
                                            {{Form::select("unitid",$data['unit'], null,
                                                [
                                                    "class" => "form-control",
                                                    "placeholder" => "Pick a Unit."
                                                ])
                                            }}
                                            @if($errors->has('unitid'))
                                                <span class="text-danger">*{{$errors->first('unitid')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                        </div>

                                    </div>

                                    </div>

                                    <button type="submit" name="myButton" class="btn btn-primary ">
                                        <span class="state">Save</span>
                                    </button>

                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>

                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div>
        </section>


        @endsection
