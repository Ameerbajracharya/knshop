<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
  {{--   <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{$dashboard}}" class="nav-link">Home</a>
        </li>

    </ul> --}}

    <!-- SEARCH FORM -->
  {{--   <form  action="{{route('search')}}" method="post" role="search" class="form-inline ml-3">
        @csrf
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search" required>
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
 --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <li class="nav-item dropdown no-arrow">

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <li class="dropdown-item ">
                <a class="btn btn-danger btn-sm" role="button" href="{{route('logout')}}" id="logout" onclick="event.preventDefault();
                document.getElementById('logout-form').submit()" ;>

                Log Out
            </a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                {{@csrf_field()}}
            </form>
        </li>
    </div>
</li>
</ul>
</nav>
<!-- /.navbar -->
