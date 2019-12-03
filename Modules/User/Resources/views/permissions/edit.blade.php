@extends('dashboard::layouts.master')


@section('content')
@include('dashboard::include.header')

<section class="content">
  <div class="containter-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Create New Permission</h3>
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

        {!! Form::model($data['permission'],[
            'url' =>route('permission.update',$data['permission']->id),
            'onsubmit'=>"return checkForm(this)"
            ]) !!}
            <div class="row" style="margin-left: 1%;">
            <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <h5>Permission Name: </h5>
                        {!! Form::text('name', null, ['placeholder'=>'Example: Create Post','class' => 'form-control'])!!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 1%;">Update</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
</section>
@endsection