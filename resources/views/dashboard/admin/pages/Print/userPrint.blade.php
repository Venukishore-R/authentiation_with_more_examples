@extends('dashboard.user.layouts.my')
@section('content')
<center>
<br><br>
<a href="{{ route('print') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
<h1>Course List </h1>
<table class="table" >
<tr><th>Id</th><th>Name</th><th>Email</th></tr>
 @foreach($users as $user)
<tr><td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->course }}</td> </tr>
@endforeach
</center>
@endsection