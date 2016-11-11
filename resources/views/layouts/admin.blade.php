<!DOCTYPE html>
<html>
  @include('layouts.components.head')
  <body>
    <div class="container">

      @include('layouts.components.navbar_admin')

      @yield('content')

    </div>

    <div class="container footer text-center" style="margin-bottom: 20px;">
      Copyright &copy; 2016 ...
    </div>

  </body>
</html>
