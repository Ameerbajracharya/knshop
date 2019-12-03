  <!-- Slider -->
  <div class="container">
    <div id="main_area">
      <!-- Slider -->
      <div class="row">
        <div class="col-xs-12" id="slider">
          <div class="row">
            <div class="col-sm-8" id="carousel-bounding-box">
              <div class="carousel slide" id="myCarousel">
                <!-- Carousel items -->
                @if(isset($data['slider']) && $data['slider']->count()>0)
                <div class="carousel-inner">

                      @for($i=0; $i<count($data['slider']); $i++)

                      @if($i==0)


                      <div class="item active">
                        <img src="{{asset('public/images/slider/'.DIRECTORY_SEPARATOR.$img['width'].'-'.$img['height'].'-'.$data['slider'][$i]->image)}}" alt="" style="width:100%;" class="img-responsive">
                      </div>

                      @else

                      <div class="item">
                        <img src="{{asset('public/images/slider/'.$img['width'].'-'.$img['height'].'-'.$data['slider'][$i]->image)}}" alt="" style="width:100%;" class="img-responsive">
                      </div>
                      @endif
                      @endfor

                    </div>
                    @endif
                    <!-- Carousel nav -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="slider__icon">
                        <!-- <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> -->
                      </span>                               
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="slider__icon">
                        <!-- <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> -->
                      </span>                                    
                    </a> 
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="hotdeal">
                    @if(!empty($data['boostimage']))
                    <h3 class="hotdeal--heading text-center">Hot Deal</h3>
                    <a href="{{ route('product.info',$data['boostimage']->productid) }}">
                    <img src="{{asset('public/images/products/'.$dim['width'].'-'.$dim['height'].'-'.$data['boostimage']->image)}}" alt="" style="width:100%;" class="img-responsive">
                    <label><u>{{$data['boostimage']->productName}}</u></label>
                    </a>
                    @else
                    <h3 class="hotdeal--heading text-center">Hot Deal Coming Soon.</h3>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

