@extends('layouts/frontend')
@section('content')
<div class="ads_list">
<div class="row my-3 breadcrumb"><div class="col small"><a href="/"><i class="fas fa-home"></i></a> > 
    <a href="/{{ $s_category->category_slug }}">{{ $s_category->category }}</a>  
    @if ($s_location)    
    > <a href="/{{ $s_category->category_slug }}/{{ $s_location->location_slug }}">{{ $s_location->location }}</a>  
    @endif
    </div></div>

    @php ($i = 0)
               
    @foreach ($ads as $ad)
     
    @php ($i++)  
     
        <div class="row">
            <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card_body p-3">
                  <div class="row">
                      <div class="col-4 col-sm-2">                   
                      @if (count($ad->gallery)>0)
                        <div id="myCarousel_{{ $i  }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @php ($y = 0)
                                @foreach ($ad->gallery as $image )
                                
                                <div class="carousel-item  
                                @if ($y == 0)
                                @php ($y = 2)
                                active
                                @endif 
                                ">
                                <img src="{{ asset('user_images/') }}/{{ Str::replace($ad['id'].'_', 'thumb_'.$ad['id'].'_', $image->ad_image) }}" class="d-block text-center" alt="..." style="margin: 0px auto;">
                                  </div>
                                
                            @endforeach
                            
                              
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel_{{ $i }}" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel_{{ $i }}" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                          @else
                          <img src="{{ asset('images/blank.jpg') }}" class="img-fluid">
                          @endif
                        
                      </div>
                      <div class="col-8 col-sm-10 "><!--<h3><a href="/ad/{{ $ad['id'] }}">{{ $ad['title'] }}</a></h3>-->
                        <h3><a href="/{{ $ad['category_slug'] }}/{{ $ad['location_slug'] }}/{{ $ad['title_slug'] }}">{{ $ad['title'] }}</a></h3>
                        <div>{{ Str::limit(str_replace('&nbsp;', ' ',strip_tags($ad['description'])), 280) }}</div>

                        


                        <div class="small my-3">{{ $ad->user_age }} YEARS | {{ $ad->category }} | {{ $ad['region'] }} | {{ $ad['location'] }}</div></div>
                    </div>  
                 
                
                </div>
            </div>
            </div>
        </div>
    @endforeach
    {{ $ads->links() }}  
	<hr class="my-5">

  <div class="row mt-5">
    <div class="col-md-12">
      @if($s_location)
      <div class="text-center mb-5"><h2>Find {{ $s_category->category }} Ads in {{ $s_location->location }}</h2></div>
    <ul class="list-group ads_page_links">
        @foreach ($search_categories as $category ) 
           
          <li class="list-group-item"><a href="/{{ $category->category_slug }}/{{ $s_location->location_slug }}">{{ $category->category }} {{ $s_location->location }}</a> </li>
          @endforeach   
</ul>
@endif
@if(!$s_location)
<div class="text-center mb-5"><h2>Find {{ $s_category->category }} Ads in India</h2></div>
<div class="accordion  my-5" id="accordionExample">
@foreach ($search_categories as $category ) 
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading{{ $category['id'] }}">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category['id'] }}" aria-expanded="true" aria-controls="collapse{{ $category['id'] }}">
        {{ $category['category'] }}
      </button>
    </h2>
    <div id="collapse{{ $category['id'] }}" class="accordion-collapse collapse collapse" aria-labelledby="heading{{ $category['id'] }}" data-bs-parent="#accordionExample">
      <div class="accordion-body">
          <div class="row">
          @foreach ($search_child_locations as $child_location)
          <div class="col-md-4 py-1"><a href="/{{ $category['category_slug'] }}/{{ $child_location->location_slug }}">{{ $child_location->location }} {{ $category['category'] }}</a></div>
                 
                @endforeach
                </div>
              
      </div>
    </div>
  </div>
   @endforeach  
</div>
@endif
    
  </div>
  @if ($s_location)    
  <div class="row mt-3"><div class="col">{!! $Page_data['description'] !!}</div></div>
  @else
  <div class="row mt-3"><div class="col">{!! $s_category['category_description'] !!}</div></div>
  @endif
  
  
</div>
</div>
@endsection