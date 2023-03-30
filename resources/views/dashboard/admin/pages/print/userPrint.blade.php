@extends('dashboard.admin.pages.print.layouts.my')
@section('content')
<br><br>
<a href="{{ route('print') }}" class="btnprn  btn btn-outline-info btn-icon-text">
    Print 
    <i class="ti-printer btn-icon-append"></i>
</a>

<h1 style="text-align: center;">Course List </h1>
<table class="table" >
<thead>
<tr><th>Id</th><th>Name</th><th>Email</th></tr>
</thead>
<tbody>
 @foreach($users as $user)
<tr>

<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->course }}</td> 

</tr>
@endforeach
</tbody>



<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>

@endsection

