@extends('layouts/admin')

@section('content')
 
<div class="row"><div class="col"><h1>Locations</h1></div><div class="col text-end"><a class="btn btn-primary" href="{{ url('/admin/addlocation') }}" role="button"><i class="fas fa-plus"></i> Add</a></div></div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Parent</th>
                <th scope="col">Location</th>
                <th scope="col">Slug</th>
                <th  width="100">Sort</th>
                <th  width="100">Featured</th>
                <th scope="col">Status</th>
                <th width="150"></th>
              </tr>
            </thead>
            <tbody>
             @foreach ($location as $row )             
              <tr>
                <th scope="row">{{ $row['id'] }}</th>
                <td>{{ $row['parent'] }}</td>
                <td>{{ $row['location'] }}</td>
                <td>{{ $row['location_slug'] }}</td>
                <td><input class="form-control form-control-sm location_sort" type="number" min="0" name="sort_id" id="" location_id='{{ $row['id'] }}' value="{{ $row['sort_id'] }}"></td>
                <td><input class="form-check-input location_featured" type="checkbox" name=""  location_id='{{ $row['id'] }}'  value="{{ $row['featured'] }}" 
                  @if ($row['featured']==1)
                  checked
                @endif 
                ></td>
                <td>@if ($row['published']==1)
                  <i class="fas fa-check-circle"></i>            
                @endif</td>
                <td><a href="editlocation/{{ $row['id'] }}"><i class="fas fa-edit"></i> Edit</a> | <a href="deletelocation/{{ $row['id'] }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
              </tr>
              @foreach ($row->children as $child )
              <tr>
                <th scope="row">{{ $child['id'] }}</th>
                <td>{{ $child['parent'] }}</td>
                <td> -> {{ $child['location'] }}</td>
                <td>{{ $child['location_slug'] }}</td>
                <td><input class="form-control form-control-sm location_sort" type="number" min="0" name="sort_id" id="" location_id='{{ $child['id'] }}' value="{{ $child['sort_id'] }}"></td>
                <td><input class="form-check-input location_featured" type="checkbox" name=""  location_id='{{ $child['id'] }}' value="{{ $child['featured'] }}"
                  @if ($child['featured']==1)
                    checked
                  @endif
                  
                  ></td>
                <td>{{ $child['published'] }}</td>
                <td><a href="editlocation/{{ $child['id'] }}"><i class="fas fa-edit"></i> Edit</a> | <a href="deletelocation/{{ $child['id'] }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
              </tr>
              @endforeach 

              @endforeach   
            </tbody>
          </table> 
         
           </div> 
</div>
@endsection

