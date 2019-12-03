@extends('dashboard::layouts.master')


@section('content')
@include('dashboard::include.header')

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Permissions</h3>
          <button class="btn btn-default btn-sm"><a href="{{route('permission.create')}}"  style="color: #e20909;">
            <i class="fa fa-plus"></i>
          Add</a>  </button>
          <br>
        </div>

        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Details</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['permission'] as $permission)
            <tr>
             <td>{{ $permission->id }}</td>
             <td>{{ $permission->name }}</td>
             <td>{{ $permission->guard_name }}</td>
             <td>
              <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
              <a class="btn btn-danger delete" href="{{ route('permission.delete',$permission->id) }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</section>
@endsection