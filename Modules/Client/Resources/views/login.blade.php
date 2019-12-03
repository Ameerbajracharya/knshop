@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@section('content')
<div class="row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-4">
		<center><b>Please Login To Continue</b></center>
		<br>
		<form class="form" method="POST" action="{{ route('client.login') }}">
			@csrf
			<input type="text" name="backlink" hidden value="{{$data['server']}}">

			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

					@if ($errors->has('password'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6 offset-md-4">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

						<label class="form-check-label" for="remember">
							{{ __('Remember Me') }}
						</label>
					</div>
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-md-8 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Login') }}
					</button>

					@if (Route::has('password.request'))
					<a class="btn btn-primary" href="{{ route('client.password.request') }}">
						{{ __('Forgot Your Password?') }}
					</a>
					@endif
				</div>
			</div>
		</form>
		<div class="bottom text-center">
			<b>New here? Please Register to Join: </b><a href="{{ route('client.register') }}" class="btn btn-xs btn-primary" style="margin: 2px;"><b>Join Us</b></a>
		</div>
	</div>
	<div class="col-md-4">
		
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-4">
		<h4>Login With Social Networks:</h4>
		<a href="{{ route('service.login',"facebook") }}" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
		<a href="{{ route('service.login',"google") }}"   class="btn btn-gplus"><i class="fa fa-google"></i> Google</a>
	</div>
	<div class="col-md-4">
		
	</div>
</div>
<br>
@endsection
