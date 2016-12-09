<nav class="navbar navbar-default" style="border-radius: 0px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('admin/main') }}">JanJaow</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">จัดการสมาชิก <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li> -->

        @if (Session::get('active_menu') == 'member')
          <li class="dropdown active font-size-normal">
        @else
          <li class="dropdown font-size-normal">
        @endif

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">จัดการสมาชิก <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('admin/member/all') }}">สมาชิกทั้งหมด</a></li>
            <li><a href="{{ url('admin/member/facebook') }}">สมาชิกเฟสบุ๊ค</a></li>
          </ul>
        </li>

        @if (Session::get('active_menu') == 'category')
          <li class="dropdown active font-size-normal">
        @else
          <li class="dropdown font-size-normal">
        @endif
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">จัดการเนื้อหา <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('admin/category/all') }}">หมวดหมู่นิยาย</a></li>
            <!-- <li role="separator" class="divider"></li> -->
          </ul>
        </li>

        @if (Session::get('active_menu') == 'front-end')
          <li class="dropdown active font-size-normal">
        @else
          <li class="dropdown font-size-normal">
        @endif
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">แก้ไขหน้าเว็บ <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('admin/editor/contact') }}">แก้ไข หน้าติดต่อ</a></li>
            <!-- <li role="separator" class="divider"></li> -->
          </ul>
        </li>

        @if (Session::get('active_menu') == 'report')
          <li class="dropdown active font-size-normal">
        @else
          <li class="dropdown font-size-normal">
        @endif
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">รายงาน <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('admin/report/visit') }}">นิยาย (ยอดวิวสูงสุด)</a></li>
            <li><a href="{{ url('admin/report/topup') }}">รายได้ (ยอดเติมเหรียญ)</a></li>
            <li><a href="{{ url('admin/report/people') }}">ยอดผู้เข้าชมเว็บไซต์</a></li>
            <!-- <li role="separator" class="divider"></li> -->
          </ul>
        </li>

      </ul>

      <ul class="nav navbar-nav navbar-right">

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
