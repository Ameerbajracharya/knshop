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
            <h3 class="card-title">{{$_panel}} Data</h3><br>

          {!!Form::model($data['productimage'] ,[
            'url' => route('productimage.update',[$data['product']->id, $data['productimage']->id]),
            'enctype' => 'multipart/form-data',
            'onsubmit' => "return checkForm(this)"
            ])!!}
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                    <label>Product:</label>
                    <select class="form-control" name="productid" value="{{old('productid')}}">
                      @foreach($data['product'] as $product)
                      
                      <option  class="form-control" value="{{$product->id}}">
                        {{$product->productName}}
                      </option>
                      @endforeach
                    </select>
                    @if($errors->has('productid'))
                    <span class="text-danger">*{{$errors->first('productid')}}</span>
                    <br>
                    @endif
                    <br>
                    
                    <label>Image:</label>
                    {{Form::file('image',null,
                      [
                        "class" => "form-control",
                      ])
                    }}
                    <img src="{{url($_folderpath.DIRECTORY_SEPARATOR.$data['productimage']->$_databaseimage)}}" style="width: 120px; height: 120px">
                    @if($errors->has('image'))
                    <span class="text-danger">*{{$errors->first('image')}}</span>
                  <br>
                  @endif
                  <br>

                  <label>Description:</label>
                  {{Form::textarea("description",null,
                    [
                      "class" => "form-control",
                      "col" => 3,
                      "row" => 3,
                    ])
                  }}
                  @if($errors->has('description'))
                  <span class="text-danger">*{{$errors->first('description')}}</span>
                  <br>
                  @endif
                  <br>

                </div>

                <div class="col-md-6">
                  <h2>SEO Management</h2>
                  <label>Caption:</label>
                  {{Form::text("caption",null,
                    [
                      "class" => "form-control",
                    ])
                  }}
                  @if($errors->has('caption'))
                  <span class="text-danger">*{{$errors->first('caption')}}</span>
                  <br>
                  @endif
                  <br>

                  <label>KeyWords:</label>
                  {{Form::text("keywords",null,
                    [
                      "class" => "form-control",
                    ])
                  }}
                  @if($errors->has('keywords'))
                  <span class="text-danger">*{{$errors->first('keywords')}}</span>
                  <br>
                  @endif
                  <br>

                  <label>Meta Tag:</label>
                  {{Form::text("metaTag",null,
                    [
                      "class" => "form-control",
                    ])
                  }}
                  @if($errors->has('metaTag'))
                  <span class="text-danger">*{{$errors->first('metaTag')}}</span>
                  <br>
                  @endif
                  <br>

                  <label>Meta Description:</label>
                  {{Form::text("metaDescription",null,
                    [
                      "class" => "form-control",
                    ])
                  }}
                  @if($errors->has('metaDescription'))
                  <span class="text-danger">*{{$errors->first('metaDescription')}}</span>
                  <br>
                  @endif
                  <br>

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </div>
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
</section>
@endsection