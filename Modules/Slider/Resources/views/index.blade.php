@extends('dashboard::layouts.master')
@section('title')


{{$_panel}}


@endsection
@section('content')
@include('dashboard::include.header')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$_panel}} Data</h3>
                        @can('slider-create')
                        <button class="btn btn-default btn-sm"><a href="{{Route('createslider')}}"  style="color: #e20909;">
                            <i class="fa fa-plus"></i>
                        Add</a>  </button>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>S.N.</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            @can('slider-status')
                            <th>Status</th>
                            @endcan
                            <th>Created</th>
                            @can('slider-edit')
                            <th colspan="2" style="text-align: center;">Setting</th>
                            @endcan
                        </tr>
                        @foreach ($data['slider'] as $slider)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>
                                <img src="{{url($_folderpath.DIRECTORY_SEPARATOR.$img['width'].'-'.$img['height'].'-'.$slider->$_databaseimage)}}" alt="" style="width: 50px; height: 50px">
                            </td>

                            <td>{{$slider->title}}</td>

                            <td>{!!$slider->description!!}</td>
                            @can('slider-status')
                            @if($slider->status == 0)
                            <td>
                                @if($slider->status == 0)
                                <a href="{{route('sliderstatus',$slider->id)}}" class="btn btn-md btn-danger">Inactive</a>
                                @else
                                <a href="" class="btn btn-xs btn-info">Active</a>
                                @endif
                            </td>
                            @else
                            <td>
                                @if($slider->status == 1)
                                <a href="{{route('sliderstatus',$slider->id)}}" class="btn btn-md btn-info">Active</a>

                                @else
                                <a href="" class="btn btn-xs btn-danger">Inactive</a>
                                @endif
                            </td>
                            @endif
                            @endcan
                            <td>{{$slider->created_at->diffForHumans()}}</td>
                            @can('slider-edit')
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{Route('editslider',$slider->id)}}">
                                    Edit
                                </a>
                            </td>
                            @endcan
                            @can('slider-delete')
                            <td>
                                <a class="btn btn-danger btn-sm delete" href="{{Route('deleteslider',$slider->id)}}">Delete
                                </a>
                            </td>
                            @endcan
                        </tr>

                        @endforeach
                        <tfoot>
                            {!! $data['slider']->render() !!}
                        </tfoot>
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
