<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
    <script src="{{ elixir('js/all.js') }}"></script>
    <!-- <script src="{{ elixir('js/app.js') }}"></script> -->
    <style media="screen">
      @font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        src: local('Kanit'), local('Kanit-Regular'), url("{{ url('fonts/Kanit.woff2') }}") format('woff2');
        unicode-range: U+0E01-0E5B, U+200B-200D, U+25CC;
      }
      body {
        font-family: 'Kanit', sans-serif;
        background-image: url("{{ url('images/background/school.png') }}");
      }

    </style>
  </head>
  <body>
    <div id="app" class="container">

      @include('layouts.components.banner')
      @include('layouts.components.navbar')
      @include('layouts.components.modal_login')
      @include('layouts.components.modal_register')
      @include('layouts.components.carousel')

      @yield('content')

    </div>

    <div class="container footer text-center" style="margin-bottom: 20px;">
      Copyright &copy; 2016 ...
    </div>

    <script>

      $(document).ready(function() {

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

  </body>
</html>
