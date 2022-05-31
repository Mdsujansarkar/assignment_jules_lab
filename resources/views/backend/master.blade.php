@include('backend.common.header')
      <div id="layoutSidenav">
        @include('backend.common.sidebar')
          <div id="layoutSidenav_content">
        @yield('home')
@include('backend.common.footer')
