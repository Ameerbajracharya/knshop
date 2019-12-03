@extends('dashboard::layouts.master')


@section('content')

@include('dashboard::include.header')


<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Users Management</h3>
          @can('create-user')
          <button class="btn btn-default btn-sm"><a href="{{route('users.create')}}"  style="color: #e20909;">
           <i class="fa fa-plus"></i>
         Add</a></button>
         @endcan
       </div>
       <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
         <thead>
           <tr>
             <th>No</th>
             <th>Name</th>
             <th>Email</th>
             <th>Roles</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           @foreach ($data as  $user)
           <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
              @endforeach
              @endif
            </td>
            <td>
             <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
             @can('edit-user')
             <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
             @endcan
             @can('delete-user')
             <a class="btn btn-danger delete" href="{{ route('users.delete',$user->id) }}">Delete</a>
             @endcan
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