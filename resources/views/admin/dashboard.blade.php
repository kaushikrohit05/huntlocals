@extends('layouts/admin')

@section('content')
<h1>Dashboard</h1>
Welcome {{ $LoggedUserInfo['adminemail'] }}
@endsection

