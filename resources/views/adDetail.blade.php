@extends('layouts/frontend1')

@section('content')
 


@if(($ads['isActive']=='1') || (session()->has('SiteUser')) )




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<div class="row my-3 breadcrumb"><div class="col small"><a href="/"><i class="fas fa-home"></i></a> > 
<a href="/{{ $ads['category_slug'] }}">{{ $ads['category'] }}</a> > 
<a href="/{{ $ads['category_slug'] }}/{{ $ads['region_slug'] }}">{{ $ads['region'] }}</a> > 
<a href="/{{ $ads['category_slug'] }}/{{ $ads['location_slug'] }}">{{ $ads['location'] }}</a>  </div></div>

<div class="row my-3 backto"><div class="col small"><!-- <a href="/"><i class="far fa-arrow-alt-circle-left"></i> Back to search</a> -->
<div class="small my-3">{{ $ads['created_at'] }}<br>
    {{ $ads['user_age'] }} YEARS | {{ $ads['category'] }} | {{ $ads['region'] }} | {{ $ads['location'] }}<br>
    Ad ID : {{ $ads['title_slug'] }}</div>
</div></div>
<div class="row">
    <div class="col-md-9"><h1>{{ $ads['title'] }}</h1>
     
    {!! str_replace('contenteditable', 'article', $ads['description']) !!}    
    <div class="row my-5">
    @foreach ($gallery as $image)
    <div class="col-md-4 mb-3 git "><a href="{{ asset('user_images/'.$image['ad_image'] ) }}" data-lightbox="roadtrip"><img src="{{ asset('user_images/'.$image['ad_image'] ) }}" class="img-fluid"></a></div>
    @endforeach
</div>    
</div>
<div class="col-md-3">
    <div class="d-grid gap-3 mt-5">
        @if($ads['phone'])
        <a href="http://tel:{{ $ads['phone'] }}" id="tel_txt" class="btn btn-primary" phone_number="{{ $ads['phone'] }}"><i class="fas fa-phone-alt"></i>
            <span id="tel_txt" >Telephone</span>
            <span id="tel_no" style="display: none;;">{{ $ads['phone'] }}</span></a>
        <a class="btn btn-success" href="https://wa.me/{{ $ads['phone'] }}?text=Hi! I saw your ad {{ $ads['title'] }} on HuntLocals" role="button" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        @endif
        
        <a class="btn btn-light" href="#" role="button">Report</a>
      </div>      
</div></div>
<script>    
function showStuff()
{      
    document.getElementById("tel_txt").style.display = "none";
     document.getElementById("tel_no").style.display = "inline";

 }
</script>

@else
<div class="row my-5">
    <div class="col text-center">
        <h1>Inactive Add</h1>
    </div>
</div>


@endif

@endsection

