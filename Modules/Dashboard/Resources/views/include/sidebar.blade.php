<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link text-center">
        <span class="brand-text font-weight-light">DASHBOARD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/backend/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info"  style="color: #d6d6d6;">
                @can('show-user')
                <a href="{{route('users.show',Auth::user()->id)}}" class="d-block">
                    @endcan
                    {{Auth::user()->name}}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav  nav-pills nav-sidebar flex-column navbar-nav" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 @role('admin')
                 {{-- Product --}}
                 @can('slider')
                 <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-image"></i>
                        <p>
                            Slider
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('viewslider')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        @can('slider-create')
                        <li class="nav-item">
                            <a href="{{Route('createslider')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @endrole


                @role('admin|shop')
                {{-- Product --}}
                @can('product')
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-cart-plus"></i>
                        <p>
                            Product
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.view')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        @can('product-create')
                        <li class="nav-item">
                            <a href="{{Route('product.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                {{-- Unit--}}
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-magic"></i>
                        <p>Units
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('unit.view')}}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o "></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('unit.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ProductScheme--}}
                {{-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-shopping-bag "></i>
                        <p>ProductScheme
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('productscheme.view')}}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o "></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('productscheme.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- Brand --}}
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-apple "></i>
                        <p>Brand
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('product-brand')
                        <li class="nav-item">
                            <a href="{{route('brand.view')}}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o "></i>
                                <p>List</p>
                            </a>
                        </li>
                        @endcan

                        @can('product-brand-create')
                        <li class="nav-item">
                            <a href="{{Route('brand.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                {{-- Category --}}
                @can('product-category')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-bookmark-o"></i>
                        <p>Category
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.view')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        @can('product-category-create')
                        <li class="nav-item">
                            <a href="{{Route('category.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                {{-- productType --}}
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-text-height"></i>
                        <p>ProductType
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('producttype.view')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('producttype.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole

                {{-- Acceses Management --}}
                @role('admin')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Access Management
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('user')
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>User</p>
                            </a>
                        </li>
                        @endcan
                        @can('role')
                        <li class="nav-item">
                            <a href="{{Route('roles.index')}}" class="nav-link">
                                <i class="fa fa-handshake-o"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        @endcan
                        @can('permission')
                        <li class="nav-item">
                            <a href="{{Route('permission.index')}}" class="nav-link">
                                <i class="fa fa-sign-in"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                {{-- Client --}}
                <li class="nav-item">
                    <a href="{{Route('client.dashboardindex')}}" class="nav-link">
                        <i class="nav-icon fa fa-users" ></i>
                        <p>
                            Client
                        </p>
                    </a>
                </li> 

                {{-- Orders --}}
                <li class="nav-item">
                    <a href="{{Route('order.view')}}" class="nav-link">
                        <i class="nav-icon fa fa-book" ></i>
                        <p>
                            Order Book
                        </p>
                    </a>
                </li> 

                {{-- Setting --}}
                <li class="nav-item">
                    <a href="{{Route('setting.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-envelope" ></i>
                        <p>
                            About
                        </p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
