@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row" style="margin: 2%;">
    <h3>This is the List of the Item You have Purchasaed till date.</h3>
    <h4>Get More Products at Affordable Prices Here:<a href="{{ route('frontend') }}" class="btn btn-sm btn-primary">Get More</a> </h4>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['order'] as $orderitems)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$orderitems->productname}}</td>
                <td>{{$orderitems->quantity}} pcs</td>
                <td>Rs. {{$orderitems->price}} /-</td>
                <td>{{Carbon\Carbon::parse($orderitems->created_at)->diffForHumans()}}</td>
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
</section>

@endsection