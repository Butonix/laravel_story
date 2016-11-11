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

  <div class="col-xs-12 col-sm-2 col-md-2" style="//border: 1px solid red; margin-top: 25px; text-align: center;">
    <!-- <ul class="nav navbar-nav" style="margin-top: 15px;"> -->
      <!-- <li class="dropdown" style="margin-right: 50px;"> -->
        <a href="#" class="dropdown dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 22px; text-decoration: none;">เมนูสมาชิก <span class="caret"></span></a>

        <ul class="dropdown-menu">

          @if (Auth::check() || Session::get('fb_user_access_token') != null)
            <li><a href="#" style="font-size: 18px;">หน้าส่วนตัว</a></li>
            <li><a href="#" style="font-size: 18px;">เหรียญของฉัน</a></li>
            <li><a href="#" style="font-size: 18px;">เขียนนิยาย</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('user/logout') }}" style="font-size: 18px;"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
          @else
            <li><a href="#login" id="btn-login" style="font-size: 18px;"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</a></li>
          @endif

        </ul>
      <!-- </li> -->

    <!-- </ul> -->
  </div>

  <div class="col-xs-12 col-sm-2 col-md-2 text-left" style="margin-top: 25px; //border: 1px solid red;">
    <span style="font-size: 20px;">ติดตามเราได้ที่</span>
  </div>

  <div class="col-xs-12 col-sm-2 col-md-2" style="margin-top: 15px; //border: 1px solid red;">
    <a href="http://facebook.com" target="_blank"><img src="{{ url('images/icons/facebook.png') }}" style="height: 50px; margin-right: 10px; //border: 1px solid red;" alt=""></a>
    <a href="http://twitter.com" target="_blank"><img src="{{ url('images/icons/twitter.png') }}" style="height: 50px; //border: 1px solid red;" alt=""></a>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top: 15px;">
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
