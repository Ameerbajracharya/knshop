@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@section('content')

        <div class="checkout--step" style="margin: 2%;">
          <div class="row">
            <h1>Congratulation</h1>
            
            <div class="col-md-8">
              <h3><mark>Your order has been successful</mark></h3>
              <p>We will contact you very soon</p>
              <p><strong>Imortant:</strong> Please have the exact amount available as the delivery rider may not be carrying sufficient change.</p>
              <p><strong>Imortant:</strong> This is the last step. Once you click "CONFIRM ORDER", you will not be able to change or edit. To cancel, edit or </p>
              <a href="{{route('frontend')}}"><button class="btn"><< Back to Home Page</button></a>
            </div>
    
            <div class="col-md-4">
                <div class="producttitle">{{$data['confirm']->productName}}</div>
                  <img src="{{asset('public/images/products/'.$data['confirm']->image)}}" class="img-responsive" height="200" width="200">
                  <div class="productprice">
                    <div class="pricetext">Rs. {{$data['confirm']->sellingPrice}} per quantity</div>
                    <div class="pricetext">Total order Qty : {{$data['confirm']->quantity}}</div>
                    <div class="pricetext">Total Amount : Rs. {{$data['confirm']->quantity * $data['confirm']->sellingPrice}} </div>
                </div>
            </div>
          </div>
        </div>
      </div>

@endsection