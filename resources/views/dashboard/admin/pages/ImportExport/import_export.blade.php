<!DOCTYPE html>
<html>

<head>
  <title>Design Thinking</title>
  <link rel="stylesheet"
    href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  @include('dashboard.admin.partials._headerlink')

</head>

<body>
  <!-- partial:../../partials/_navbar.html -->
    @include('dashboard.admin.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      @include('dashboard.admin.partials._settings-panel')
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('dashboard.admin.partials._sidebar')
  <div class="container">
    <div class="card bg-light mt-3">
      <div class="card-header">
        Design Thinking importing datas.
      </div>
      <div class="card-body">
        <form action="/import"
          method="POST"
          enctype="multipart/form-data">
          @csrf
          <input type="file" name="file"
            class="form-control">
          <br>
          <button class="btn btn-success" style="background-color: red;">
            Import User Data
          </button>
        </form>
      </div>
    </div>
  </div>
  @include('dashboard.admin.partials._headerscript')

</body>

</html>
