@extends('frontend::layouts.master')
@section('title')
KN_Shop
@endsection
@section('content')
<div class="container" style="margin-top:20px;max-width:1400px;">
  @include('frontend::include.slider')
  @include('frontend::include.offer')
</div>
<div class="container" style="margin-top:20px;max-width:1400px;">
    {{-- Tab System --}}
    <div class="container">
        @if(isset($data['category']) && $data['category']->count()>0)
        <ul class="nav nav-tabs">
             @for($i=0; $i<count($data['category']); $i++)
            <li class="@if ($i ==0) active @endif">
                <a data-toggle="tab" href="#{{$data['category'][$i]->id}}" aria-expanded="true">{{$data['category'][$i]->category}}</a>
            </li>
            @endfor
        </ul>
        <div class="tab-content">
            <!-- Relative tab -->
            @for($i=0; $i<count($data['category']); $i++)
            <div id="{{$data['category'][$i]->id}}" class="tab-pane fade @if ($i == 0) active in @endif">
               <div class="container">
                @if($data['general'][$i])
                <div class="row">
                  <div class="col-md-12">
                    <div class="mainItems">
                      <div class="row">
                          @include('frontend::include.productcategory')
                    </div>
                    <div class="row text-center">
                        <a href="{{route('category',$data['category'][$i]->id)}}" class="btn btn-sm" role="button">View all</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class='row text-center'>
            <h3 style="color:#f46600;">Currently No Products in this Category.</h3>
        </div>
        @endif
    </div>
</div>

@endfor
</div>
@endif
</div>
</div>
</div>



@endsection
