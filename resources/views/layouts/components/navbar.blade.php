@php
  $categorys = App\Category::all();
@endphp

<nav class="navbar navbar-default" style="border-radius: 0px; margin-bottom: 0px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header"  style="margin-left: 50px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @if (Auth::check())
        <a class="navbar-brand" href="{{ url('user/profile') }}">ชื่อผู้ใช้งาน {{ Auth::User()->username }}</a>
      @elseif (Session::get('facebook_login') != '')
        <a class="navbar-brand" href="{{ url('user/profile') }}">ชื่อผู้ใช้งาน {{ Session::get('facebook_login') }}</a>
      @endif
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{!! url('/') !!}" style="font-size: 22px; margin-right: 50px;"><i class="fa fa-home"></i> หน้าแรก <span class="sr-only">(current)</span></a></li>

        <li class="dropdown" style="margin-right: 50px;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 22px;"><i class="fa fa-list"></i> หมวดหมู่นิยาย <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @foreach ($categorys as $category)
              <li><a href="{{ url('category/'.$category->id) }}">{{ $category->category_name }}</a></li>
            @endforeach
          </ul>
        </li>

        <li class="dropdown" style="margin-right: 50px;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 22px;"><i class="fa fa-book"></i> คู่มือการใช้งาน <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('how_to_writing') }}">วิธีลงนิยาย</a></li>
            <li><a href="{{ url('how_to_register') }}">วิธีสมัครสมาชิก</a></li>
            <li><a href="{{ url('how_to_support') }}">วิธีการสนับสนุน</a></li>
          </ul>
        </li>

        <li><a href="{!! url('contact') !!}" style="font-size: 22px; margin-right: 50px;"><i class="fa fa-phone"></i> ติดต่อเรา <span class="sr-only">(current)</span></a></li>

      </ul>

    </div><!-- /.navbar-collapse -->
</nav>
