<template>
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
          <li class="active"><a href="{!! url('/') !!}" style="font-size: 18px;"><i class="fa fa-home"></i> หน้าแรก <span class="sr-only">(current)</span></a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;"><i class="fa fa-list"></i> หมวดหมู่นิยาย <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{!! url('category/1') !!}">นิยาย รักวัยรุ่น</a></li>
              <li><a href="{!! url('category/2') !!}">นิยาย รัก,โรแมนติค</a></li>
              <li><a href="{!! url('category/3') !!}">นิยาย ตลก,คอมเมดี้</a></li>
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
</template>

<script>
    export default {
        mounted() {
            console.log('Component navbar ready.')
        }
    }
</script>
