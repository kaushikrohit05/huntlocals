@extends('layouts/frontend1')

@section('content')
<div class="row my-5">
  
  

  <div class="col-md-3">
 
  <div class="text-center mb-3"  style="color:gray">
    <i class="fas fa-user-circle fa-10x"></i>
  </div>

 
  
<div class="list-group"> 
  
    <a class="list-group-item list-group-item-action"   href="/myaccount"><i class="fas fa-user"></i> Dashboard</a>
   
    <a class="list-group-item list-group-item-action" href="/user/ads"><i class="fas fa-address-card"></i> My Ads</a>
   
    <a class="list-group-item list-group-item-action" href="/user/profile"><i class="fas fa-cog"></i> Account Info</a>
   
    <a class="list-group-item list-group-item-action" href="/user/delete_account"><i class="fas fa-trash-alt"></i> Delete Account</a>
   </div>


 
    
  </div>
<div class="col-md-9"><h3 class="mb-3">My Ads</h3>
  <div class="mb-3 small">Dashboard > My Ads</div>
  <div class="card"><div class="card-body">
  <table class="table table-hover">
    <thead>
      <tr>
         
        <th width="col">Ads</th>             
         
        
         
        <th scope="col">Staus</th>
        <th width="120"></th>
         
      </tr>
    </thead>
    <tbody>
        @foreach ($ads as $row)
         
      <tr>
         
        <td><div class="small mb-2">#{{ $row->id }}<br>
          Posted on: {{ $row->created_at }}</div> 
          <a href="/{{ $row->category_slug }}/{{ $row->location_slug }}/{{ $row->title_slug }}"><strong>{{ $row->title }}</strong></a><br>
          {{ $row->category }}<br>
          {{ $row->region }} > {{ $row->location }} </td>             
         
         
        <td>@if ($row->isActive==1)
          <i class="fas fa-circle" style="color: #05A90C"></i>
          @else
          <i class="fas fa-circle"  style="color: #FF0000"></i>
        @endif </td>
        <td><div class="d-grid gap-2"><a href="/user/editgallery/{{ $row->id }}" class="btn btn-dark  btn-sm text-start text-uppercase"><i class="fas fa-camera "></i> Gallery </a> 
         <a href="/user/editad/{{ $row->id }}" class="btn btn-dark btn-sm text-start text-uppercase"><i class="fas fa-edit "></i>  Edit </a>
         <a href="deletead/{{ $row->id }}" class="btn btn-danger btn-sm text-start text-uppercase"><i class="fas fa-trash-alt"></i> Delete</a>
        </div></td>
      </tr>
 @endforeach
    </tbody>
  </table>
  {{ $ads->links() }}</div></div>
    
   
  </div>
</div>
@endsection