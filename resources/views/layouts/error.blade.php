<!DOCTYPE html>
<html lang="en" style="height:100%;">

<head>

  <meta charset="utf-8" />
  <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
      {{ env('APP_NAME') }} | {{ $title }}
  </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin_template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<style>
  #content-wrapper {
    height: 100vh;
  }
</style>

<body id="page-top">

  <div id="wrapper">
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" class="d-flex justify-content-center align-items-center">
          <div>
            @yield('content')
          </div>
        </div>
        <footer class="sticky-footer bg-white align-items-end">
          <div class="container my-auto">
              <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Omega {{ now()->year }}</span>
              </div>
          </div>
        </footer>
      </div>
  </div>
</body>

</html>