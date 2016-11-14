<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Story</title>
  <link rel="stylesheet" href="{{ url('css/all.css') }}">
  <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
  <script src="{{ url('js/all.js') }}"></script>
  <script src="{{ url('tinymce/tinymce.min.js') }}"></script>
  <script>tinymce.init({ selector:'textarea', menubar: false, toolbar: false });</script>
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
