<html>
<head>
<link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
@include('dashboard.admin.partials._headerlink')

<script type="text/javascript" src="{{ URL::to('js/app.js') }}"></script>

</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('dashboard.admin.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      @include('dashboard.admin.partials._settings-panel')
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('dashboard.admin.partials._sidebar')
      <!-- partial -->
    <div class="container">
    <div class="col-md-12">
      @yield('content')
    </div>
    </div>
  </div>
  </div>

@include('dashboard.admin.partials._headerscript')

</body>
</html>