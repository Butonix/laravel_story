<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Story</title>
  <link rel="stylesheet" href="{{ url('css/all.css') }}">
  <link rel="stylesheet" href="{{ url('font-awesome-4.7.0/css/font-awesome.css') }}">
  <script src="{{ url('js/jquery-3.1.1.js') }}" charset="utf-8"></script>
  <script src="{{ url('js/bootstrap.min.js') }}" charset="utf-8"></script>
  <script src="{{ url('js/sweetalert.min.js') }}" charset="utf-8"></script>

  <!-- include summernote css/js-->
  <link href="{{ url('summernote/summernote.css') }}" rel="stylesheet">
  <script src="{{ url('summernote/summernote.min.js') }}"></script>

  <script>
    function fb(url) {
      var link = 'https://www.facebook.com/sharer/sharer.php?app_id=1712358199084388&sdk=joey&u=' + url + '&display=popup&ref=plugin&src=share_button';
      window.open(link, 'trueplookpanya', 'left=10,top=10,width=500,height=500,toolbar=1,resizable=0');
    }
  </script>

  <!-- <script src="{{ elixir('js/app.js') }}"></script> -->
  <style media="screen">
    @font-face {
      font-family: 'Kanit';
      font-style: normal;
      font-weight: 400;
      src: local('Kanit'), local('Kanit-Regular'), url("{{ url('fonts/Kanit.woff2') }}") format('woff2');
      unicode-range: U+0E01-0E5B, U+200B-200D, U+25CC;
    }
    html {
      /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f2f9fe+0,d6f0fd+100;White+3D+%232 */
      background: rgb(242,249,254); /* Old browsers */
      background: -moz-linear-gradient(top,  rgba(242,249,254,1) 0%, rgba(214,240,253,1) 100%); /* FF3.6-15 */
      background: -webkit-linear-gradient(top,  rgba(242,249,254,1) 0%,rgba(214,240,253,1) 100%); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(to bottom,  rgba(242,249,254,1) 0%,rgba(214,240,253,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f9fe', endColorstr='#d6f0fd',GradientType=0 ); /* IE6-9 */
    }
    body {
      font-family: 'Kanit', sans-serif;
      background: transparent url("{{ url('images/background/bg.png') }}");
    }
    .bg_white, tr, td {
      background-color: #ffffff;
    }
    a {
      text-decoration: none !important;
    }
  </style>
</head>
