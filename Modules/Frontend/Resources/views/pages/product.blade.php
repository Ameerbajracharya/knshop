@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@if(isset($data['productinfo']))
@section('facebook')
<meta property="og:url"           content="{{ route('product.info',$data['productinfo']->id) }}"/>
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ucfirst($data['productinfo']->productName)}} "/>
@if(isset($data['productdetails']))
<meta property="og:description"   content="{{$data['productdetails']->description}}"/>
@endif
@if($data['productimage']->count() > 0)
<meta property="og:image"         content="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$data['productimage'][0]->image)}}" />
@endif
@endsection
@endif
@section('content')

<!-- products -->
<div class="container-fluid">
  <div class="row product">
    <div class="col-md-8">
      @if($data['productimage']->count() > 0)
      <div class="col-sm-3 sub_img" id="sub_img" onclick="changeImage(event)">
        @for($i=0; $i < $data['productimage']->count(); $i++)
        @if($i < 3)
        <img src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$data['productimage'][$i]->image)}}" alt="" width="75%" height="75%">
        @endif
        @endfor
      </div>
      <div class="col-sm-9">
        <img id="mainImage" src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$data['productimage'][0]->image)}}" alt="" width="75%" height="75%" data-toggle="magnify">
      </div>
      @else
      <div class="col-sm-9 text-center">
        <h3>No Image</h3>
        <h3>To</h3>
        <h3>Display</h3>
      </div>
      @endif
    </div>
    @if(Auth('client')->user())
    <form action="{{ route('productinfo.store', $data['productinfo']->id) }}" method="post">
      @csrf
      <h4>{{ucfirst($data['productinfo']->productName)}}</h4>
      <h5>Brand: {{$data['brand']->brand}}</h5>
      <h5>Category: {{$data['category']->category}}</h5>
      <div class="col-md-4">
        @if($data['productdetails'])
        <ul type="circle">
          <li>
            {{$data['productdetails']->description}}
          </li>
          <!--<li>-->
          <!--  {{$data['productdetails']->features}}-->
          <!--</li>-->
          <!--<li>-->
          <!--  {{$data['productdetails']->color}}-->
          <!--</li>-->
          <!--<li>-->
          <!--  {{$data['productdetails']->size}}-->
          <!--</li>-->
          <!--<li>-->
          <!--  {{$data['productdetails']->capacity}}-->
          <!--</li>-->
        </ul>
        @else
        <div class="container">
          <h3>NO DETAILS</h3>
        </div>
        @endif
        <div class="quantity_buy">
          <div class="row">
            <div class="col-md-3">
              <h4>Quantity:</h4>
            </div>
            <div class="col-md-3 text-center">
              <input type="number" class="form-control"  name="quantity" min="1"  value="1">
            </div>
            <div class="col-md-6">
              <h4>Rs. {{$data['productinfo']->sellingPrice}} /-</h4>  
               <strike style="color:red; font-size:16px;">
                <span style="color:black">Rs. {{$data['productinfo']->markedPrice}}<span>
                </strike>
              <!-- <button class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i></button> -->
            </div>
            <div class="col-md-12">
             <button class="btn btn-block">Buy Now</button>
           </div>
           <br>
         </div>
         
         <h4>Share Product on Social Networks:</h4>
          <!-- Your share button code -->
       <div class="fb-share-button" 
       data-href="{{ route('product.info',$data['productinfo']->id) }}" 
       data-layout="button_count" style="margin:1%;">
     </div>
       </div>
     </div>
   </form>
   @else
   <div class="col-md-4">
     <h4>{{ucfirst($data['productinfo']->productName)}}</h4>
     <h5>Brand: {{$data['brand']->brand}}</h5>
     <h5>Category: {{$data['category']->category}}</h5>
     @if($data['productdetails'])
     <ul type="circle">
      <li>
        {{$data['productdetails']->description}}
      </li>
    </ul>
    @else
    <div class="container">
      <h3>NO DETAILS</h3>
    </div>
    @endif
    <div class="quantity_buy">
      <div class="row">
        <div class="col-md-3 text-center">
          <h4>Quantity:</h4>
        </div>
        <div class="col-md-3">
          <input type="number" class="form-control"  name="quantity" min="1" value="1">
        </div>
        <div class="col-md-6">
          <h4>Rs. {{$data['productinfo']->sellingPrice}} /-</h4>
          <strike style="color:red; font-size:16px;">
                <span style="color:black">Rs. {{$data['productinfo']->markedPrice}}<span>
                </strike>
          <!-- <button class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i></button> -->
        </div>
        <div class="col-md-12">
         <a href="{{route('client.login')}}" class="btn btn-block" role="button">BUY</a>
       </div>
   </div>
    <h4>Share Product on Social Networks:</h4>
          <!-- Your share button code -->
       <div class="fb-share-button" 
       data-href="{{ route('product.info',$data['productinfo']->id) }}" 
       data-layout="button_count" style="margin:1%;">
     </div>
 </div>
</div>
@endif
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
          <!--Comment Sections-->
          @comments(['model' => $data['productinfo']])
        </div>
      </div>
    </div>

    <!-- Offers -->
    <div class="container">
      <h3><u><b>Related Items</b></u></h3>
      <div class="row">
        @if(!empty($data['relateditem']))
        @foreach($data['relateditem'] as $key => $relateditem)
        @if(!empty($data['offerimage']) && !empty($data['boostimage']))
        @if($data['productinfo']->id != $relateditem->id && $data['offerimage']->productid != $relateditem->id && $data['boostimage']->productid != $relateditem->id)
        @include('frontend::include.productinfo')
        @endif
        @elseif(!empty($data['offerimage']) && empty($data['boostimage']))
        @if($data['productinfo']->id != $relateditem->id && $data['offerimage']->productid != $relateditem->id)
        @include('frontend::include.productinfo')
        @endif 
        @elseif(!empty($data['boostimage']) && empty($data['offerimage']))
        @if($data['productinfo']->id != $relateditem->id && $data['boostimage']->productid != $relateditem->id)
        @include('frontend::include.productinfo')
        @endif
        @else
        @if($data['productinfo']->id != $relateditem->id)
        @include('frontend::include.productinfo')
        @endif
        @endif
        @endforeach
        @else
        <h3>No Items To Displays</h3>      
        @endif
      </div>
    </div>
    <!--header-->
    <script id="dsq-count-scr" src="//knshop-1.disqus.com/count.js" async></script>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    @endsection
