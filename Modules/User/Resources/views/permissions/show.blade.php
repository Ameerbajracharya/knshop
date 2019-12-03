@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permission</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('permission.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3><strong>Id:</strong>
                {{ $data['permission']->id }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3><strong>Name:</strong>
                {{ $data['permission']->name }}</h3>
            </div>
        </div>
    </div>
@endsection