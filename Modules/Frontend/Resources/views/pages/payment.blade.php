@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@section('content')
<div class="checkout--step" style="margin: 2%;">
  <div class="row">
    <h1>3. PAYMENT OPTIONS</h1>
    <div class="col-md-8">
      <form method="post" action="{{ route('payment.update',$data['order']->id)}}">
        {{ csrf_field() }}
        <h3><mark>Cash on Delivery</mark></h3>
        <p>Pay cash at your doorstep at the time of order delivery.</p>
        <p><strong>Imortant:</strong> Please have the exact amount available as the delivery rider may not be carrying sufficient change.</p>
        <p><strong>Imortant:</strong> This is the last step. Once you click "CONFIRM ORDER", you will not be able to change or edit. To cancel, edit or </p>
        <button class="btn">CONFIRM ORDER</button>
      </form>
    </div>
    <h2>Details</h2>
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
<br>
<br>

@endsection