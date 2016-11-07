<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <!-- <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ url('css/user.css') }}"> -->
    <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
    <script src="{{ url('js/jquery-3.1.1.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
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
    <div class="container">

      <nav class="navbar navbar-default" style="border-radius: 0px;">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{ url('/') }}" style="font-size: 18px;"><i class="fa fa-home"></i> หน้าแรก <span class="sr-only">(current)</span></a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;"><i class="fa fa-list"></i> หมวดหมู่นิยาย <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('category/1') }}">นิยาย รักวัยรุ่น</a></li>
                  <li><a href="{{ url('category/2') }}">นิยาย รัก,โรแมนติค</a></li>
                  <li><a href="{{ url('category/3') }}">นิยาย ตลก,คอมเมดี้</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;"><i class="fa fa-book"></i> คู่มือการใช้งาน <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">วิธีลงนิยาย</a></li>
                  <li><a href="#">วิธีสมัครสมาชิก</a></li>
                  <li><a href="#">ระบบสนับสนุนคือ?</a></li>
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="#login" id="btn-login" style="font-size: 18px;"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</a></li>

            </ul>

          </div><!-- /.navbar-collapse -->
      </nav>

      <!-- Modal -->
      <div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <span class="modal-title" id="myModalLabel" style="font-size: 22px;"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</span>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="icon-addon addon-lg">
                    <input type="text" class="form-control" placeholder="อีเมล / email">
                    <i class="fa fa-user"></i>
                </div>
                <span class="pull-right"><a href="#">สมัครสมาชิก</a></span>
              </div>
              <div class="form-group">
                <div class="icon-addon addon-lg">
                    <input type="text" class="form-control" placeholder="รหัสผ่าน / password">
                    <i class="fa fa-key"></i>
                </div>
                <span class="pull-right" style="margin-left: 10px;"><a href="#">ลืมรหัสผ่าน</a></span>

              </div>
              <div class="form-group">

              </div>
            </div>
            <div class="modal-footer">
              <div class="col-xs-6 col-sm-6 col-md-4 text-left" style="//border: 1px solid red; padding: 0px 0px 0px 0px;">
                <button type="button" class="btn btn-primary"><i class="fa fa-facebook-square fa-lg"></i> ล็อกอินด้วยเฟสบุ๊ก</button>
              </div>
              <!-- <div class="col-xs-offset-4 col-xs-2 col-sm-6 col-md-offset-4 col-md-2" style="padding: 0px 0px 0px 0px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
              </div> -->
              <div class="col-xs-6 col-sm-6 col-md-offset-6 col-md-2 text-right" style="padding: 0px 0px 0px 0px;">
                <button type="button" class="btn btn-success">เข้าสู่ระบบ</button>
              </div>


            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="http://cdn-th.tunwalai.net/files/banner-25.jpg" alt="...">
              </div>
              <div class="item">
                <img src="http://cdn-th.tunwalai.net/files/banner-story-12668.jpg" alt="...">
              </div>
              <div class="item">
                <img src="http://cdn-th.tunwalai.net/files/banner-story-33353.jpg" alt="...">
              </div>

            </div>

            <!-- Controls -->
            <a class="left slide-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <i class="fa fa-angle-left fa-1x"></i>
            </a>
            <a class="right slide-control" href="#carousel-example-generic" role="button" data-slide="next">
              <i class="fa fa-angle-right fa-1x"></i>
            </a>
          </div>
        </div>

        <div class="col-xs-12 col-sm-2 col-md-2 text-center" style="margin-top: 25px; //border: 1px solid red;">
          <span style="font-size: 22px;">ติดตามเราได้ที่</span>
        </div>

        <div class="col-xs-12 col-sm-2 col-md-2" style="margin-top: 15px; //border: 1px solid red;">
          <a href="http://facebook.com" target="_blank"><img src="{{ url('images/icons/facebook.png') }}" style="height: 50px; margin-right: 10px; //border: 1px solid red;" alt=""></a>
          <a href="http://twitter.com" target="_blank"><img src="{{ url('images/icons/twitter.png') }}" style="height: 50px; //border: 1px solid red;" alt=""></a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-8" style="margin-top: 15px;">
          <form action="#">
            <div class="form-group">
                  <div class="icon-addon addon-lg">
                      <input type="text" class="form-control" placeholder="ค้นหานิยาย / นักเขียน">
                      <i class="fa fa-search"></i>
                  </div>
              </div>
            </form>
        </div>
      </div>


      @yield('content')

    </div>

    <div class="container footer text-center" style="margin-bottom: 20px;">
      Copyright &copy; 2016 ...
    </div>

    <script>

      $(document).ready(function(){
        $('#btn-login').on('click', function(){
          $('#myModalLogin').modal();
        });
      });

    </script>

  </body>
</html>
