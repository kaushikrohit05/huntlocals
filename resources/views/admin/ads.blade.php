@extends('layouts/admin')

@section('content')
 
<div class="row"><div class="col"><h1>User Ads</h1></div><div class="col text-end"><a class="btn btn-primary" href="{{ url('/admin/addad') }}" role="button">Add Ads</a></div></div>
<div class="row">
    <div class="col-md-12">
       
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th width="col">Title</th>
                <th width="col">User</th>
                <th scope="col">Category</th>
                <th scope="col">Location</th>
                <th scope="col">Staus</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ads as $row)
                 
              <tr>
                <th>{{ $row->id }}</th>
                <th>{{ $row->title }} </th>
                <td>{{ $row->user }} </td>
                <td>{{ $row->category }}</td>
                <td>{{ $row->region }} > {{ $row->location }} </td>
                <td>{{ $row->created_at }}</td>
                <td><a href="editgallery/{{ $row->id }}">Gallery</a> | <a href="editad/{{ $row->id }}">Edit</a> | <a href="deletead/{{ $row->id }}">Delete</a></td>
              </tr>
         @endforeach
            </tbody>
          </table>
          {{ $ads->links() }}
          
           </div> 
</div>
@endsection

