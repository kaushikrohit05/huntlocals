@extends('layouts/admin')

@section('content')
<div class="row"><div class="col"><h1>Users</h1></div><div class="col text-end"><a class="btn btn-primary" href="{{ url('/admin/adduser') }}" role="button"><i class="fas fa-plus"></i> Add</a></div></div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>               
              <th scope="col">Email Address</th>
              <th scope="col">Creation Data</th>
              <th scope="col">Status</th>
              <th  width="150"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $row)
            <tr>
              <th scope="row">{{ $row['id'] }}</th>
              <td>{{ $row['email_address'] }}</td>
              <td>{{ $row['created_at'] }}</td>               
              <td>@if ($row['isActive']==1)
                <i class="fas fa-check-circle"></i>
          
              @endif </td>               
              <td><a href="edituser/{{ $row['id'] }}"><i class="fas fa-edit"></i> Edit</a> | <a href="deleteuser/{{ $row['id'] }}"><i class="fas fa-trash-alt"></i> Delete</a></td></td>
            </tr>
            @endforeach
          </tbody>
          </table>
          {{ $users->links() }}
          
           </div> 
</div>
@endsection

