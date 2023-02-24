@extends('layouts/admin')

@section('content')
<div class="row"><div class="col"><h1>Pages</h1></div><div class="col text-end"><a class="btn btn-primary" href="{{ url('/admin/addpage') }}" role="button"><i class="fas fa-plus"></i> Add</a></div></div>
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
                @foreach ($pages as $row)
                    
                 
              <tr>
                <th>{{ $row['id'] }}</th>                 
                <td>{{ $row['page_name'] }} </td>
                <td>{{ $row['page_slug'] }}</td>
                <td>@if ($row['isActive']==1)
                  <i class="fas fa-check-circle"></i>            
                @endif</td>
                <td>{{ $row['created_at'] }}</td>
                <td><a href="editpage/{{ $row['id'] }}"><i class="fas fa-edit"></i> Edit</a> | <a href="deletepage/{{ $row['id'] }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
              </tr>
         @endforeach
            </tbody>
          </table>
          {{ $pages->links() }}
          
           </div> 
</div>
@endsection

