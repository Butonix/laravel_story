@extends('layouts.user')

@section('content')
<div class="row">

  @if (session('status_all'))
    <script type="text/javascript">
      swal("", "ชื่อผู้ใช้งานและอีเมลนี้มีผู้อื่นใช้แล้ว", "error")

      $(document).ready(function() {
        $('#myModalRegister').modal();
      });
    </script>
  @endif

  @if (session('status_username'))
    <script type="text/javascript">
      swal("", "ชื่อผู้ใช้งานนี้มีผู้อื่นใช้แล้ว", "error")

      $(document).ready(function() {
        $('#myModalRegister').modal();
      });
    </script>
  @endif

  @if (session('status_email'))
    <script type="text/javascript">
      swal("", "อีเมลนี้มีผู้อื่นใช้แล้ว", "error")

      $(document).ready(function() {
        $('#myModalRegister').modal();
      });
    </script>
  @endif

  @if (session('status_success'))
    <script type="text/javascript">
      swal("", "สมัครสมาชิกสำเร็จ", "success")
    </script>
  @endif

  @if (session('status_login'))
    <script type="text/javascript">
      swal("", "กรุณาตรวจสอบอีเมลและรหัสผ่านอีกครั้ง", "error")

      $(document).ready(function() {
        $('#myModalLogin').modal();
      });
    </script>
  @endif

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading text-center">
        <span style="font-size: 22px;"><!-- <i class="fa fa-newspaper-o fa-2x"></i> --> นิยายอัพเดตล่าสุด</span>
      </div>
      <div class="body" style="background-color: #ffffe6;">
        <div class="media">

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125095/636136094357206955-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125587/636137722619944097-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125761/636138682021141824-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>

          <a href="#" class="pull-right" style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>

        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading text-left">
        <span style="font-size: 22px;">จัดอันดับผู้อ่าน เรียงลำดับ มาก <i class="fa fa-angle-right"></i> น้อย</span>
      </div>
      <div class="body" style="background-color: #ffffe6;">
        <div class="media">

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>

          <a href="#" class="pull-right" style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>

        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading text-left">
        <span style="font-size: 22px;">จัดอันดับสนับสนุน เรียงลำดับ มาก <i class="fa fa-angle-right"></i> น้อย</span>
      </div>
      <div class="body" style="background-color: #ffffe6;">
        <div class="media">

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>

          <a href="#" class="pull-right" style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>

        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading text-left">
        <span style="font-size: 22px;">จัดอันดับหัวใจ เรียงลำดับ มาก <i class="fa fa-angle-right"></i> น้อย</span>
      </div>
      <div class="body" style="background-color: #ffffe6;">
        <div class="media">

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>

          <a href="#" class="pull-right" style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>

        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading text-left">
        <span style="font-size: 22px;">อันดับนักเขียน (ได้รับยอดสูงสุด) มาก <i class="fa fa-angle-right"></i> น้อย</span>
      </div>
      <div class="body" style="background-color: #ffffe6;">
        <div class="media">

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">อันดับ 1</h4>
                  <!-- <span>ตอน...</span><br> -->
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">อันดับ 2</h4>
                  <!-- <span>ตอน...</span><br> -->
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">อันดับ 3</h4>
                  <!-- <span>ตอน...</span><br> -->
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">อันดับ 4</h4>
                  <!-- <span>ตอน...</span><br> -->
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">อันดับ 5</h4>
                  <!-- <span>ตอน...</span><br> -->
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">อันดับ 6</h4>
                  <!-- <span>ตอน...</span><br> -->
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>

          <a href="#" class="pull-right" style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>

        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">

          <span style="font-size: 25px;" class="pull-left"><i class="fa fa-comments-o fa-lg"></i> เว็บบอร์ด / กิจกรรม</span>
          <a href="#" class="pull-right" style="margin-bottom: 10px;"><span style="font-size: 25px;">สร้างกระทู้</span></a>

        <div class="list-group" style="margin-top: 10px;">
          <button type="button" class="list-group-item"><span class="pull-left">1 <a href="#">Cras justo odio</a> โดย admin</span> <span class="pull-right">01/11/59 10.00 น.</span></button>
          <button type="button" class="list-group-item"><span class="pull-left">2 <a href="#">Dapibus ac facilisis in</a> โดย admin</span> <span class="pull-right">01/11/59 10.00 น.</span></button>
          <button type="button" class="list-group-item"><span class="pull-left">3 <a href="#">Morbi leo risus</a> โดย admin</span> <span class="pull-right">01/11/59 10.00 น.</span></button>
          <button type="button" class="list-group-item"><span class="pull-left">4 <a href="#">Porta ac consectetur ac</a> โดย admin</span> <span class="pull-right">01/11/59 10.00 น.</span></button>
          <button type="button" class="list-group-item"><span class="pull-left">5 <a href="#">Vestibulum at eros</a> โดย admin</span> <span class="pull-right">01/11/59 10.00 น.</span></button>
        </div>
      </div>
    </div>
  </div>

</div> <!-- end row -->

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
@endsection