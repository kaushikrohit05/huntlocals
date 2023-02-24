@extends('layouts/frontend')

@section('content')
 
  <div class="row my-5"><div class="col text-center"><h1 class="my-3">Find Adult Classified Ads in Your City</h1>
    <h3 class="my-3">Choose your favourite individuals from here for meeting!</h3>
     </div></div>

<div class="row categories">
    @if ($categories)  
    @foreach ($categories as $category ) 
         
    <div class="col-md-4 mb-4">
        
        <div class="card" >
            <a href="/{{ $category['category_slug'] }}"><img src="{{ asset('uploads/'.$category['category_image'] ) }}" class="card-img-top" alt="{{ $category['category'] }}"></a>
            <a href="/{{ $category['category_slug'] }}"><h5 class="card-title  text-center">{{ $category['category'] }}</h5></a><div class="card-body">
              <p class="card-text">{{ $category['category_small_description'] }}</p>
              <ul class="list-group list-group-flush">
                @foreach ($featured_locations as $featured_location)
                <li class="list-group-item"><a href="/{{ $category['category_slug'] }}/{{ $featured_location->location_slug }}">{{ $featured_location->location }} {{ $category['category'] }}</a></li>
                @endforeach
              </ul>
                
              
               
            </div>
          </div>
        
        
        </div>
    @endforeach 
    @endif
</div>
  <div class="row my-5"><div class="col text-center"> 
Welcome to HuntLocals.</div></div>

@endsection

