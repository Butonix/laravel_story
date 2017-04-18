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
          <a href="{{ url('banner/1') }}"><img src="{{ url('images/banner/Banner1.jpg') }}" alt="..."></a>
        </div>
        <div class="item">
          <a href="{{ url('banner/2') }}"><img src="{{ url('images/banner/Banner2.jpg') }}" alt="..."></a>
        </div>
        <div class="item">
          <a href="{{ url('banner/3') }}"><img src="{{ url('images/banner/Banner3.jpg') }}" alt="..."></a>
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

{{--<div class="col-xs-12 col-sm-2 col-md-2" style="//border: 1px solid red; margin-top: 25px; text-align: center;">--}}
<!-- <ul class="nav navbar-nav" style="margin-top: 15px;"> -->
  <!-- <li class="dropdown" style="margin-right: 50px;"> -->
{{--<a href="#" class="dropdown dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 22px; text-decoration: none;">เมนูสมาชิก <span class="caret"></span></a>--}}

{{--<ul class="dropdown-menu">--}}

{{--@if (Auth::check() || Session::get('fb_user_access_token') != null)--}}
{{--<li><a href="{{ url('user/profile') }}" style="font-size: 18px;">หน้าส่วนตัว</a></li>--}}
{{--<li><a href="{{ url('user/write/story') }}" style="font-size: 18px;">เขียนนิยาย</a></li>--}}
{{--<li><a href="{{ url('user/topup') }}" style="font-size: 18px;">เติมเหรียญ</a></li>--}}
{{--<li><a href="#" style="font-size: 18px;">ประวัติการเติมเหรียญ</a></li>--}}
{{--<li><a href="#" style="font-size: 18px;">ประวัติการปลดล็อก</a></li>--}}
{{--<li><a href="#" style="font-size: 18px;">ลงทะเบียนนักเขียนระบบ Point</a></li>--}}
{{--<li><a href="#" style="font-size: 18px;">แสดงรายได้</a></li>--}}
{{--<li role="separator" class="divider"></li>--}}
{{--<li><a href="{{ url('user/auth/logout') }}" style="font-size: 18px;"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>--}}
{{--@else--}}
{{--<li><a href="#login" id="btn-login" style="font-size: 18px;"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</a></li>--}}
{{--@endif--}}

{{--</ul>--}}
<!-- </li> -->

  <!-- </ul> -->
  {{--</div>--}}

  {{--<div class="col-xs-12 col-sm-2 col-md-2 text-left" style="margin-top: 25px; //border: 1px solid red;">--}}
  <div class="col-xs-12 col-sm-3 col-md-2 text-center" style="margin-top: 25px; //border: 1px solid red;">
    <span style="font-size: 20px;">ติดตามเราได้ที่</span>
  </div>

  <div class="col-xs-12 col-sm-2 col-md-1" style="margin-top: 15px; //border: 1px solid red;">
    <a href="http://facebook.com" target="_blank"><img src="{{ url('images/icons/facebook.png') }}" style="height: 50px; margin-right: 10px; //border: 1px solid red;" alt=""></a>
  <!-- <a href="http://twitter.com" target="_blank"><img src="{{ url('images/icons/twitter.png') }}" style="height: 50px; //border: 1px solid red;" alt=""></a> -->
  </div>

  <form action="{{ url('user/search') }}" method="post">
    {{ csrf_field() }}

    <div class="col-xs-12 col-sm-5 col-md-7" style="margin-top: 15px;">

      <div class="form-group">
        <div class="icon-addon addon-lg">
          <input type="text" class="form-control" name="txt_search" id="txt_search" placeholder="ค้นหานิยาย / นักเขียน / แท็ก">
          <i class="fa fa-search"></i>
        </div>
      </div>

    </div>

    <div class="col-xs-12 col-sm-2 col-md-2" style="margin-top: 18px;">
      <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100%; font-size: 18px;">ค้นหา</button>
      </div>
    </div>

  </form>

</div>
