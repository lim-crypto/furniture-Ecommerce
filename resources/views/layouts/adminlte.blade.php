<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    @include('layouts.sidebar')
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  @include('layouts.script')
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>