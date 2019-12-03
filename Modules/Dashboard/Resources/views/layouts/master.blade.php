<!DOCTYPE html>
<html>
<head>
    @include('dashboard::include.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
        @include('dashboard::include.navbar')
        @include('dashboard::include.sidebar')
        @yield('content')
        @include('dashboard::include.footer')
    @yield('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>
</div>
</body>
</html>
