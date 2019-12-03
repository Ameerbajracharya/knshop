 <div class="col-md-3 col-xs-3 column itembox two firstproduct">
  <a href="{{ route('product.info',$relateditem->id) }}">
    @foreach($data['relatedimage'] as $key => $relatedimage)
    @if($relatedimage->productid == $relateditem->id )
    <img src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$relatedimage->image)}}" class="img-responsive">
    @endif
    @endforeach
    <div class="producttitle">{{ucfirst($relateditem->productName)}}</div>
    <div class="productprice">
      <div class="pricetext" style="color:black">Rs. {{$relateditem->sellingPrice}} | <strike style="color:red; font-size:16px;">
                <span style="color:black">Rs. {{$relateditem->markedPrice}}<span>
                </strike></div>
      <div class="pull-right"><a href="{{ route('product.info',$relateditem->id) }}" class="btn btn-sm" role="button">BUY</a></div>
    </div>
  </a>
</div>