<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/stylesheets/bootstrap.min.css')}}">
<head>
	<title>404 Not Found</title>
</head>
<body style="background-image: url(public/images/404.jpg);">
	<div class="container">
		<div style="color: red; text-align: center;">
			<h1>Page Not Found.</h1>
			<h3>*The Page You Are Looking For Can't Be Found.</h3>
			<h4>*Please Return to Our Home Page and Enjoy Shopping.</h4>
			<a href="{{ route('frontend')}}" class="btn btn-info" style="color: white;">Back</a>
		</div>
	</div>
</body>
</html>

