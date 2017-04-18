<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Story</title>
  <link rel="stylesheet" href="{{ url('css/all.css') }}">
  <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
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
    body {
      font-family: 'Kanit', sans-serif;
    }

    .table-none-border tr th {
      border: 0px !important;
    }

    .table-none-border tr td {
      border: 0px !important;
    }

    tr td {
      vertical-align: middle !important;
    }
  </style>
</head>
