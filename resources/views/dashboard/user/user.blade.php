@extends('dashboard.user.layouts.my')
@section('content')
<center>
<h1>User Information List </h1>
<table class="table" >
<tr><th>Id</th><th>Name</th><th>Email</th></tr>
@foreach($users as $user)
<tr><td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
</tr>
@endforeach
</center>
@endsection