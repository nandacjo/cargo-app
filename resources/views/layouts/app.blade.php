<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.base.style')
</head>

<body>
  <div class="wrapper">
    @include('layouts.base.sidebar')

    <div class="main">
      @include('layouts.base.navbar')

      <main class="content">
        @yield('content')
      </main>

      @include('layouts.base.footer')
    </div>
  </div>

  <script src="{{ asset('adminkit/js/app.js') }}"></script>
</body>

</html>
