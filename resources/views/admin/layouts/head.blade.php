<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title', 'Anasayfa')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
      <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- Swetalert layout-->
    <link rel="stylesheet" href="{{ asset('admin/assets/dist/sweetalert2.css') }}">

    <!-- Swetalert layout-->
@yield('css')
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
</head>
