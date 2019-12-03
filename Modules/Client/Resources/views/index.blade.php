@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@section('content')
<div class="row" style="margin: 0% 10%;">
	<div class="col-md-3">
		<a href="{{ route('client.order', Auth('client')->user()->id) }}" class="btn btn-info">View Orders</a>
	</div>
</div>
@if(Auth('client')->user()->social_id)
<h3 class="text-center" style="color: red;">*****  If Login through Social Application Please Copy The Password into secured file. Thank You!  *****</h3>
@endif

<form class="form-horizontal" action="{{ route('client.update', Auth('client')->user()->id) }}"  method="post" enctype="multipart/form-data">
	@csrf
	<input type="text" name="backlink" hidden value="{{$data['server']}}">
	<div class="row" style="margin: 1% 	10%;">
	    <div class="col-sm-6">
	        	<h3>Client Detail</h3>
	    </div>
	    <div class="col-sm-6">
	            @if(isset(Auth('client')->user()->avatar))
	            @if(filter_var(Auth('client')->user()->avatar, FILTER_VALIDATE_URL))
                                                <img
                                                src="{{Auth('client')->user()->avatar}}"
                                                alt="client image" style="width: 150px; height: 150px; border-radius:50%; float: right;">
                                                @else
                                                <img
                                                src="{{asset('public/images/Client/'. Auth('client')->user()->avatar)}}"
                                                alt="client image" style="width: 100px; height: 100px; border-radius:50%; float: right;">
                                                @endif
                                                <label>Profile Picture:</label>
                                                {{Form::file("image",null,
                                                    [
                                                        'class'=>'form-control',
                                                    ])
                                                }}
                                                <br>
                                                @if($errors->has('image'))
                                                <span class="text-danger">*{{$errors->first('image')}}</span>
                                                <br>
                                                @endif
                                            @else
                                                <label>Profile Picture:</label>
                                                {{Form::file("image",null,
                                                    [
                                                        'class'=>'form-control',
                                                    ])
                                                }}
                                                <br>
                                                @if($errors->has('image'))
                                                <span class="text-danger">*{{$errors->first('image')}}</span>
                                                <br>
                                                @endif
                                            @endif
	    </div>
	</div>
	<div class="row" style="margin: 1% 	10%;">
		<div class="col-sm-6">
			<div class="form-group row">
				<label  class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					{{Form::text("name",Auth('client')->user()->name,
						[
							"class" => "form-control",
						])
					}}
					@if($errors->has('name'))
					<span class="text-danger">*{{$errors->first('name')}}</span>
					<br>
					@endif
				</div>
			</div>
			@if(Auth('client')->user()->social_id)
			<div class="form-group row">
				<label  class="col-sm-2 col-form-label">Social ID:</label>
				<div class="col-sm-10">
					{{Form::text("social_id",Auth('client')->user()->social_id,
						[
							"class" => "form-control",
						])
					}}
					@if($errors->has('social_id'))
					<span class="text-danger">*{{$errors->first('social_id')}}</span>
					<br>
					@endif
				</div>
			</div>
			@endif



			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
				<div class="col-sm-10">
					{{Form::text("mobile",Auth('client')->user()->mobile,
						[
							"class" => "form-control",
							"placeholder" => "Please Provide Your Contact Details.",
						])
					}}
					@if($errors->has('mobile'))
					<span class="text-danger">*{{$errors->first('mobile')}}</span>
					<br>
					@endif
				</div>
			</div>


		</div>
		<div class="col-sm-6">
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					{{Form::text("email",Auth('client')->user()->email,
						[
							"class" => "form-control",
							"placeholder" => "Please Provide Your Contact Details.",
						])
					}}
					@if($errors->has('email'))
					<span class="text-danger">*{{$errors->first('email')}}</span>
					<br>
					@endif
				</div>
			</div>
			
			@if(Auth('client')->user()->social_id)
			<div class="form-group row">
				<label  class="col-sm-2 col-form-label">Password:</label>
				<div class="col-sm-10">
					{{Form::text("password",Auth('client')->user()->social_id,
						[
							"class" => "form-control",
						])
					}}
					@if($errors->has('password'))
					<span class="text-danger">*{{$errors->first('password')}}</span>
					<br>
					@endif
				</div>
			</div>
			@endif

			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
				<div class="col-sm-10">
					{{Form::text("address",Auth('client')->user()->address,
						[
							"class" => "form-control",
							'placeholder'=>'provide Street',
						])
					}}
					@if($errors->has('address'))
					<span class="text-danger">*{{$errors->first('address')}}</span>
					<br>
					@endif
				</div>
			</div>
			<br>
		</div>
		<button class="btn btn-md btn-primary" type="submit">Update Details</button>
	</div>

</form>
@endsection
