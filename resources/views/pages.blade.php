@extends('layouts/frontend1')

@section('content')
<div class="row my-5">
    <div class="col-md-12"><h1 class="mb-3">{{ $Page_data->page_name }}</h1>
    <div class="content">{{ $Page_data->page_description }}</div></div>
</div>


@endsection

