@extends('dashboard::layouts.master')


@section('content')

@include('dashboard::include.header')


<section class="content">
  <div class="containter-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Role</h3>
            <button class="btn btn-default btn-sm"><a href="{{route('roles.index')}}"  style="color: #e20909;">
              <i class="fa fa-plus"></i>
            View</a>  </button>
            <br>
          </div>


          <div class="row" style="margin-left: 1%;">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Permissions:</strong><br>
                <div class="row">
                  @if(!empty($rolePermissions))
                  @foreach($rolePermissions as $v)
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    {{$loop->iteration}}. <label class="label">{{ $v->name }}</label><br>
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection