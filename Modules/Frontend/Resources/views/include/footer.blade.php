  <!--footer-->
  <footer class="bottom-footer">
    <div class="container">
      @if(isset($data['about']))
      <div class="row">
        <!-- row -->
        <!-- widgets column left end -->
        <div class="col-lg-6 col-md-6">
          <!-- widgets column center -->
          <ul class="list-unstyled clear-margins">
            <!-- widgets -->
            <li class="widget-container widget_recent_news">
              <!-- widgets list -->
              <h1 class="title-widget">Contact Detail </h1>
              <div class="footerp">
                @if(isset($data['about']->email))
                <h2 class="title-median">{{$data['about']->name}}</h2>
                <p><b>Email Id:</b> <a href="mailto:info@kitenepal.comd">{{$data['about']->email}}</a></p>
                @endif
                @if(isset($data['about']->contact))
                <p><b>Phone Numbers : </b>{{$data['about']->contact}}</p>
                @endif
              </div>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="social-icons">
            <ul class="nomargin">
              <ul class="social-network social-circle">
                <li><a href="{{$data['about']->facebook}}" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https:\\www.twitter.com\kitenepal" target="_blank" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{$data['about']->instagram}}" target="_blank" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </ul>
            </div>
          </div>
        </div>
        @endif
      </div>
    </footer>
    <!--header-->
    <div class="footer-bottom ">
      <div class="container ">
        <div class="row ">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
            <div class="copyright ">
              © 2019, KITE Nepal, All rights reserved
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
            <div class="design ">
              <a target="_blank " href="http://www.kitenepal.com ">Web Design & Development by KITE Nepal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- Footer Ends --}}
