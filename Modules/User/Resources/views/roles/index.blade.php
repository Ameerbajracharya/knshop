@extends('dashboard::layouts.master')


@section('content')
@include('dashboard::include.header')

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Role Management</h3>
          <button class="btn btn-default btn-sm"><a href="{{route('roles.create')}}"  style="color: #e20909;">
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
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           @foreach ($roles as $role)
           <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $role->name }}</td>
            <td>
              <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
              <a class="btn btn-danger delete" href="{{ route('roles.delete',$role->id) }}">Delete</a>
              {!! Form::close() !!}
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


{!! $roles->render() !!}


@endsection