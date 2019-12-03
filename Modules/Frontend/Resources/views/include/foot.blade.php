    <script type="text/javascript" src="{{asset('public/frontend/js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/product.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/register.js')}}"></script>
    <script src="{{asset('public/frontend/js/sidemenu.js')}}"></script>
    <div id="fb-root"></div>
    @yield('script')
    <script>
      $(function () {
        $('#example1').DataTable()
    })
</script>
<script>
    toastr.options = {
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 1000,
        "timeOut": 3000,
        "extendedTimeOut": 1000
    }

    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('warning'))
    toastr.error("{{Session::get('warning')}}");
    @endif
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=475101103353942&autoLogAppEvents=1"></script>