@extends('layouts/admin')

@section('content')
<div class="row"><div class="col"><h1>Blogs</h1></div><div class="col text-end"><a class="btn btn-primary" href="{{ url('/admin/addpost') }}" role="button"><i class="fas fa-plus"></i> Add</a></div></div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th width="100">Page</th>
                <th scope="col">Slug</th>                 
                <th scope="col">Date</th>
                <th scope="col">Staus</th>                
                <th width="150"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $row)
                    
                 
              <tr>
                <th>{{ $row['id'] }}</th>                 
                <td>{{ $row['post_name'] }} </td>
                <td>{{ $row['post_slug'] }}</td>               
                <td>{{ $row['created_at'] }}</td>
                <td>@if ($row['isActive']==1)
                  <i class="fas fa-check-circle"></i>            
                @endif</td>
                <td><a href="editpost/{{ $row['id'] }}"><i class="fas fa-edit"></i> Edit</a> | <a href="deletepost/{{ $row['id'] }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
              </tr>
         @endforeach
            </tbody>
          </table>
          {{ $posts->links() }}
          
           </div> 
</div>
@endsection

