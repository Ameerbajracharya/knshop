<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>@yield('title')</title>
  @if(isset($data['about']->logo))
  <link href="{{asset('public/images/logo/'.$data['about']->logo)}}" rel="icon">
  @endif
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('public/backend/plugins/font-awesome/css/font-awesome.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min.css')}}">
{{-- DataTable --}}
<link rel="stylesheet" href="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/plugins/daterangepicker/daterangepicker.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<style type="text/css">
	tr{
		 text-align: center;
	}
</style>
