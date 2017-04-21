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

      <script>

          $(document).ready(function() {

              $('body').on("contextmenu",function(e){
                  return false;
              });

              $('body').bind('cut copy paste', function (e) {
                  e.preventDefault();
              });

              window.normal_register = function() {
                  $('#myModalLogin').modal('toggle');
                  $('#myModalRegister').modal();
              }

              $('#btn_close_modal').on('click', function() {
                  $('#myModalRegister').modal('toggle');
              });

              $('#btn-login').on('click', function() {
                  $('#myModalLogin').modal();
              });

          });

      </script>

    </div>

    <div class="container footer text-center" style="margin-bottom: 20px;">
      Copyright &copy; 2017
    </div>

  </body>
</html>
