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
        <div class="card-header">
          <h3 class="card-title">{{$_panel}} Data</h3>
          <button class="btn btn-default btn-sm"><a href="{{route('unit.create')}}"  style="color: #e20909;">
            <i class="fa fa-plus"></i>
        Add</a>  </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
         <thead>
            <tr>
                <th>No.</th>
                <th>Unit</th>
                <th>Code</th>
                <th>Created</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['unit'] as $unit)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$unit->unit}}</td>
                <td>{{$unit->code}}</td>
                <td>{{Carbon\Carbon::parse($unit->created_at)->diffForHumans()}}</td>
                @if($unit->status == 0)
                <td>
                    @if($unit->status == 0)
                    <a href="{{route('unit.status',$unit->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                    @else
                    <a href="" class="btn btn-sm btn-info">Active</a>
                    @endif
                </td>
                @else
                <td>
                    @if($unit->status == 1)
                    <a href="{{route('unit.status',$unit->id)}}" class="btn btn-sm btn-info">Active</a>

                    @else
                    <a href="" class="btn btn-sm btn-danger">Inactive</a>
                    @endif
                </td>
                @endif
                <td>
                    <a class="btn btn-primary btn-sm" href="{{Route('unit.edit',$unit->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                    <a class="btn btn-danger btn-sm delete" href="{{Route('unit.delete',$unit->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
