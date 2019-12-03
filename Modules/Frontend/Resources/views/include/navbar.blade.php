 <nav class="navbar navbar-default md--navbar" style="position:fixed; top:0; z-index:999; width:100vw;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      @if(isset($data['about']->logo))
      <a class="navbar-header" href="{{ route('frontend') }}"><img src="{{asset('public/images/logo/'.$data['about']->logo)}}" width="30" height="30" alt="logo"></a>
      @else
      <a href="{{ route('frontend') }}"><h3 style="margin: 0;">Home</h3></a>
      @endif
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="together">
        <div class="form-center">
          <form action="{{ route('frontend.search') }}" method="post" class="navbar-form navbar-left md--form">
            @csrf
            <div class="search-bar">
              <span class="search-icon">
                <input type="search" class="search" name="search" placeholder="Search for any Products">
                <button type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
      <div id="navbarCollaps" class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="{{ route('help') }}"><span class="fa fa-question-circle-o" aria-hidden="true"></span> Help</a>
          </li>
          @if(Auth('client')->user())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user-circle-o" aria-hidden="true"> </span> {{Auth('client')->user()->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <div class="row">
                  <div class="bottom text-center">
                   <a href="{{ route('client') }}"><button class="btn btn-info">Profile</button></a><br>
                   <a href="{{ route('client.logout') }}"><button class="btn btn-info">Logout</button></a>
                 </div>
               </div>
             </li>
           </ul>
         </li>
         @else
         <li>
          <a href="{{ route('client.login') }}"><span class="fa fa-user-circle-o" aria-hidden="true"> </span>Log In</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
  <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>