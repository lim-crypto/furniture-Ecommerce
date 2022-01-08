<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') {{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- icon -->
    <link rel="icon" href="{{ asset('furnilogo.png') }}">
    <!-- <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> -->
    <!-- Adminlte 3 -->
    <!-- font awesome -->
    <link href="{{ asset('AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/plugins/toastr/toastr.min.css') }}">
    <!-- Theme Styles -->
    <link href="{{ asset('AdminLTE-3.1.0/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <!-- plugins -->
    @yield('pluginscss')
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>