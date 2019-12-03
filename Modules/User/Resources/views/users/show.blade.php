@extends('dashboard::layouts.master')


@section('content')
@include('dashboard::include.header')
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"> Show User</h2>
            @can('user')
            <button class="btn btn-default btn-sm"><a href="{{route('users.index')}}"  style="color: #e20909;">
                <i class="fa fa-plus"></i>
            View</a>  </button>
            @endcan
            <br>
        </div>


        <div class="row" style="margin-left: 1%;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3><strong>Name:</strong>
                        {{ $user->name }}</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br>
                        <div class="row">
                            @foreach($permission as $value)
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <label>
                                    {{ $loop->iteration }}. {{ $value->name }}
                                </label>
                                <br/>
                            </div>
                            @endforeach
                        </div> 
                        <div class="row">
                            <strong>Added Permission:</strong>
                            @foreach($added_permission as $value)
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <label>
                                    {{ $value->name }}
                                </label>
                                <br/>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection