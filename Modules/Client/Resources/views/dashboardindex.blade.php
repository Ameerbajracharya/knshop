@extends('dashboard::layouts.master')
@section('title')


{{$_panel}}


@endsection
@section('content')
@include('dashboard::include.header')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
         <thead>
            <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['client'] as $client)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$client->email}}</td>
                @if($client->status == 0)
                <td>
                    @if($client->status == 0)
                    <a href="{{route('client.status',$client->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                    @else
                    <a href="" class="btn btn-sm btn-info">Active</a>
                    @endif
                </td>
                @else
                <td>
                    @if($client->status == 1)
                    <a href="{{route('client.status',$client->id)}}" class="btn btn-sm btn-info">Active</a>

                    @else
                    <a href="" class="btn btn-sm btn-danger">Inactive</a>
                    @endif
                </td>
                @endif
                <td>{{Carbon\Carbon::parse($client->created_at)->diffForHumans()}}</td>
                <td>
                    {{-- <a class="btn btn-primary btn-sm" href="{{route('client.edit',$client->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> --}}
                    <a class="btn btn-danger btn-sm delete" href="{{route('client.delete',$client->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                </td>
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
