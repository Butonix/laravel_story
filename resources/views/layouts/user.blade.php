<!DOCTYPE html>
<html>
  @include('layouts.components.head')
  <body>
    <div class="container">

      {{-- @include('layouts.components.banner')
      @include('layouts.components.navbar')
      @include('layouts.components.modal_login')
      @include('layouts.components.modal_register')
      @include('layouts.components.carousel') --}}

      @yield('content')

    </div>

    <div class="container footer text-center" style="margin-bottom: 20px;">
      Copyright &copy; 2016 ...
    </div>

  </body>
</html>
