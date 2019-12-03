
@extends('dashboard::layouts.master')
@section('title')


    {{$_panel}}


@endsection
@section('content')
    @include('dashboard::include.header')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1 class="stunning-header-title">Search Result For: {{ $search}} </h1>
            <from>
                <div class="form-group row">
                    @if($data['product']->count() > 0)
                    @foreach($data['product'] as $product)
                        <label> {{ $data['product']->productName }}</label>
                    @else
                        <h1 class="stunning-header-title">No Details found. Try to search again ! </h1>
                    @endif
                </div>
            </from>
        </div>
    </section>
    <!-- /.content -->
@stop
