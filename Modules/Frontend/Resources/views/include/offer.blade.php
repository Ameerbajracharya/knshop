<!-- Offers -->
<h3 style="color:#f46600; text-align:center;"><u><strong>OFFERS</strong></u></h3>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if(!empty($data['offerimage']))
            @foreach($data['offerimage'] as $offerimage)
            @if(!empty($data['boostimage']))
            @if($offerimage->productid != $data['boostimage']->productid)
            <div class="col-md-3 column itembox two firstproduct">
                <a href="{{route('product.info',$offerimage->productid)}}">
                    <img src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$offerimage->image)}}" class="img-responsive">
                    <div class="producttitle">{{ucfirst($offerimage->productName)}}</div>
                    <div class="productprice">
                        <div class="pull-right"><a href="{{route('product.info',$offerimage->productid)}}" class="btn btn-sm" role="button">BUY</a>
                        </div>
                        <div class="pricetext">Rs. {{$offerimage->sellingPrice}} | <strike style="color:red; font-size:16px;">
                                        <span style="color:black">Rs. {{$offerimage->markedPrice}}<span>
                                        </strike> </div>
                    </div>
                </a>
            </div>
            @endif
            @else
            <div class="col-md-3 column itembox two firstproduct">
                <a href="{{route('product.info',$offerimage->productid)}}">
                    <img src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$offerimage->image)}}" class="img-responsive">
                    <div class="producttitle">{{ucfirst($offerimage->productName)}}</div>
                    <div class="productprice">
                        <div class="pull-right"><a href="{{route('product.info',$offerimage->productid)}}" class="btn btn-sm" role="button">BUY</a>
                        </div>
                        <div class="pricetext">Rs. {{$offerimage->sellingPrice}} | <strike style="color:red; font-size:16px;">
                                        <span style="color:black">Rs. {{$offerimage->markedPrice}}<span>
                                        </strike>
                        </div>
                    </div>
                </a>
               
            </div>
            @endif
            @endforeach
            @else
            <h3 style="color: orange;">There Are No Any Offers Running.</h3>
            @endif
        </div>
    </div>
</div>
