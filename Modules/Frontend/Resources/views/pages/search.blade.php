@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@section('content')
<!-- Offers -->
<div class="container">
    <div class="row">
            @if(!empty($data['product']))
            @foreach($data['product'] as $product)
            <div class="col-md-3 col-xs-3 column itembox two firstproduct">
                <a href="{{route('product.info',$product->id)}}">
                    @if(!empty($data['productimage']))
                    @foreach($data['productimage'] as $productimage)
                    @if($productimage->productid == $product->id)
                    <img src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$productimage->image)}}" class="img-responsive">
                    @endif
                    @endforeach
                    @else
                    <h3 class="text-center" style="border: 1px solid orange; padding: 40px;">NO IMAGE</h3>
                    @endif
                    <div class="producttitle">{{ucfirst($product->productName)}}</div>
                    <div class="productprice">
                        <div class="pull-right"><a href="{{route('product.info',$product->id)}}" class="btn btn-sm" role="button">BUY</a>
                        </div>
                        <div class="pricetext">Rs. {{$product->sellingPrice}} | <strike style="color:red; font-size:16px;">
                                        <span style="color:black">Rs. {{$product->markedPrice}}<span>
                                        </strike></div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
    </div>
</div>

@endsection