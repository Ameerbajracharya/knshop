@foreach($data['general'][$i] as $general)
                          <div class="col-md-3 col-xs-3 column itembox two firstproduct">
                            <a href="{{ route('product.info',$general->productid)}}">
                                <img src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$general->image)}}" class="img-responsive">
                                <div class="producttitle">{{ucfirst($general->productName)}}</div>
                                <div class="productprice">
                                    <div class="pull-right"><a href="{{route('product.info',$general->productid)}}" class="btn btn-sm" role="button">BUY</a>
                                    </div>
                                    <div class="pricetext">Rs.{{$general->sellingPrice}} | <strike style="color:red; font-size:16px;">
                                        <span style="color:black;">Rs. {{$general->markedPrice}}<span>
                                        </strike></div>
                                </div>
                            </a>
                        </div>
@endforeach