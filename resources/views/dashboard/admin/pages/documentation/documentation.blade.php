
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin Dashboard</title>
  <!-- plugins:css -->
  @include('dashboard.admin.partials._headerlink')
</head>

<body>
    <div class=" container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="main-panel w-100  documentation">
            <div class="content-wrapper">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 pt-5">
                    <a class="btn btn-primary" href="{{ route('admin_home') }}"><i class="ti-home mr-2"></i>Back to home</a>
                  </div>
                </div>
                <div class="row pt-5 mt-5">
                  <div class="col-12 pt-5 text-center">
                    <i class="text-primary mdi mdi-file-document-box-multiple-outline display-1"></i>
                    <h3 class="text-primary font-weight-light mt-5">
                      The detailed documentation of Skydash Admin Template is provided at 
                      <a href="http://bootstrapdash.com/demo/skydash/docs/documentation.html" target="_blank" class="text-danger d-block text-truncate">
                        http://bootstrapdash.com/demo/skydash/docs/documentation.html
                      </a>
                    </h3>
                    <h4 class="mt-4 font-weight-light text-primary">
                      In case you want to refer the documentation file, it is available at 
                      <span class="text-danger">/docs/documentation.html</span> 
                      in the downloaded folder
                    </h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
            @include('dashboard.admin.partials._footer')
            <!-- partial -->
          </div>
        </div>
      </div>
<!-- plugins:js -->
  @include('dashboard.admin.partials._headerscript')
<!-- End custom js for this page-->
</body>

</html>