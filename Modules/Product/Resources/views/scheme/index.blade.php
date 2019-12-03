@extends('dashboard::layouts.master')
@section('title')


    {{$_panel}}


@endsection
@section('content')

    @include('dashboard::include.header')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">{{$_panel}} List</h3>
                            <button class="btn btn-default btn-sm">
                                <a href="{{route('scheme.create')}}"  style="color: #e20909;">
                                    <i class="fa fa-plus"></i>
                                    Add
                                </a>
                            </button>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Description</th>
                                {{-- <th>Discount Percent</th>
                                <th>Discount Amount</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['scheme'] as $scheme)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$scheme->name}}</td>
                                    <td>{{$scheme->description}}</td>
                                    {{-- <td>{{$scheme->discountpercent}}</td>
                                    <td>{{$scheme->discountamount}}</td>
                                    <td>{{$scheme->startdate}}</td>
                                    <td>{{$scheme->enddate}}</td>
                                    @if($scheme->status == 0)
                                        <td>
                                            @if($scheme->status == 0)
                                                <a href="{{route('scheme.status',$scheme->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                                            @else
                                                <a href="" class="btn btn-sm btn-info">Active</a>
                                            @endif
                                        </td>
                                    @else
                                        <td>
                                            @if($scheme->status == 1)
                                                <a href="{{route('scheme.status',$scheme->id)}}" class="btn btn-sm btn-info">Active</a>

                                            @else
                                                <a href="" class="btn btn-sm btn-danger">Inactive</a>
                                            @endif
                                        </td>
                                    @endif
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{Route('scheme.edit',$scheme->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>

                                      {{--   <a class="btn btn-danger btn-sm" href="{{Route('scheme.delete',$scheme->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> --}}
                                 {{--    </td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.row -->
        </div>
    </section>


@endsection
