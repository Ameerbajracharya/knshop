@extends('dashboard::layouts.master')


@section('content')

@include('dashboard::include.header')

<section class="content">
  <div class="containter-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Permissions.</h3>
            <button class="btn btn-default btn-sm"><a href="{{route('permission.index')}}"  style="color: #e20909;">
                <i class="fa fa-plus"></i>
            View</a>  </button>

            <br>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif



        {!! Form::open(['route' => 'permission.store'])!!}
        <div class="row" style="margin-left: 1%;">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <h5>Permission Name: </h5>
                    {!! Form::text('name', null, ['placeholder'=>'Example: Create Post','class' => 'form-control'])!!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" class="btn btn-primary" style="margin-bottom: 1%;">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>
</div>
</div>
</section>
@endsection