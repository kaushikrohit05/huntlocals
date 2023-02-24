@extends('layouts/admin')

@section('content')
<div class="row"><div class="col"><h1>Categories</h1></div><div class="col text-end"><a class="btn btn-primary" href="{{ url('/admin/addcategory') }}" role="button"><i class="fas fa-plus"></i> Add</a></div></div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th width="100">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Slug</th>                
                <th width="100">Sort</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                
                <th width="150"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $row)            
              <tr>
                <th>{{ $row['id'] }}</th>
                <th><img src="{{ asset('uploads/'.$row['category_image'] ) }}" class="img-fluid"></th>
                <td>{{ $row['category'] }} </td>
                <td>{{ $row['category_slug'] }}</td>
                <td><input class="form-control form-control-sm category_sort" type="number" min="0" name="sort_id" id="" category_id='{{ $row['id'] }}' value="{{ $row['sort_id'] }}"></td>
                <td>{{ $row['created_at'] }}</td>
                <td> @if ($row['isActive']==1)
                  <i class="fas fa-check-circle"></i>            
                @endif</td>
                
                <td><a href="editcategory/{{ $row['id'] }}"><i class="fas fa-edit"></i> Edit</a> | <a href="deletecategory/{{ $row['id'] }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $categories->links() }}
          
           </div> 
</div>
@endsection

