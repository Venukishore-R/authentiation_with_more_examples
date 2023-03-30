<html>
<head>
<link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
@include('dashboard.admin.partials._headerlink')

<script type="text/javascript" src="{{ URL::to('js/app.js') }}"></script>

</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <center>
                <h1>User Information List </h1>
                    <table class="table">
                        <tr><th>Id</th><th>Name</th><th>Email</th></tr>
                        @foreach($users as $user)
                        <tr><td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
            </center>
        </div>
    </div>
@include('dashboard.admin.partials._headerscript')
</body>
</html>