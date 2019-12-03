<!DOCTYPE html>
<html lang="en">
@include('frontend::include.head')
<body style="overflow-x:hidden; padding-top:70px;">
    @include('frontend::include.navbar')
    @yield('content')
    @include('frontend::include.footer')
    @include('frontend::include.foot')
</body>
</html>
