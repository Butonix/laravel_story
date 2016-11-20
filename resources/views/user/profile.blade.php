@extends('layouts.user')

@section('content')

@include('layouts.components.banner')
@include('layouts.components.navbar')
@include('layouts.components.modal_login')
@include('layouts.components.modal_register')

<style>
  .table th, .table td {
    border-top: none !important;
    border-left: none !important;
    border-bottom: none !important;
  }
  .remove-border {
    border:0px;
  }
</style>

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 150,
      toolbar: false
    });
  });
</script>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">แก้ไขข้อมูล</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12" style="text-align: center;">
          <i class="fa fa-user-circle fa-5x"></i>
        </div>
        <div class="col-md-offset-4 col-md-4">
          <div class="table-responsive">
            <table class="table remove-border">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td>ชื่อ</td>
                  <td>...</td>
                </tr>
                <tr>
                  <td></td>
                  <td>รายได้</td>
                  <td>0.00 บาท</td>
                </tr>
                <tr>
                  <td><i class="fa fa-usd fa-lg"></i></td>
                  <td>ยอดเหรียญ</td>
                  <td>1,200,000</td>
                </tr>
                <tr>
                  <td><i class="fa fa-heart fa-lg"></i></td>
                  <td>ยอดหัวใจ</td>
                  <td>50,000</td>
                </tr>
                <tr>
                  <td><i class="fa fa-diamond fa-lg"></i></td>
                  <td>ยอดเพชร</td>
                  <td>20,000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading text-center">
        <span style="font-size: 20px;">เรื่องทั้งหมด</span>
        <a href="{{ url('user/write/story') }}" class="pull-right"><span style="font-size: 20px;">เขียนนิยาย</span> <i class="fa fa-plus fa-lg"></i></a>
      </div>
      <div class="panel-body">

        @foreach ($storys as $story)
          <div class="col-md-12">
            <div class="form-group">
              <div class="media-left media-middle">
                <a href="#">
                  <img class="media-object" src="{{ url('uploads/images/storys/'.$story->story_picture) }}" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">ชื่อเรื่อง <span>{{ $story->story_name }}</span></h4>
                <span style="font-size: 16px;"><i class="fa fa-user"></i> {{ $story->story_author }}</span><br>
                <!-- <span style="font-size: 16px;">ยอดวิว 10 k</span> -->
              </div>
            </div>
          </div>
        @endforeach

        <!-- <div class="col-md-12">
          <div class="form-group">
            <div class="media-left media-middle">
              <a href="#">
                <img class="media-object" src="{{ url('images/icons/default_book.png') }}" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">ชื่อเรื่อง...</h4>
              <span style="font-size: 16px;">ตอน...</span><br>
              <span style="font-size: 16px;"><i class="fa fa-user"></i> admin</span><br>
              <span style="font-size: 16px;">ยอดวิว 10 k</span>
            </div>
          </div>
        </div> -->

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <span style="font-size: 20px;">Comment / Review</span>
      </div>
      <div class="panel-body">
        <form action="user/profile" method="get">
          {{ csrf_field() }}
          <div class="form-group">
            <!-- <textarea name="story_detail" class="form-control" rows="8" cols="40" style="resize: none;"></textarea> -->
            <div id="summernote"></div>
          </div>
          <div class="form-group text-center">
            <button type="button" class="btn btn-success" style="font-size: 18px; width: 20%;">Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 20px;">ความคิดเห็นที่ 1</span>
      </div>
      <div class="panel-body">
          <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 1</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
          <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
          <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>
          <span style="font-size: 14px;">โดย Anny</span><br>
          <span style="font-size: 14px;">01/01/2559 10:00</span>
      </div>
      <div class="panel-footer text-right">
        <button type="button" class="btn btn-info">ตอบกลับ</button>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
        <span style="font-size: 18px;">โดย Tester 3</span><br><br>
        <span style="font-size: 16px;">เห็นด้วยกับคอมเม้นบน.</span><br><br>
        <span style="font-size: 14px;">01/01/2559 10:00</span>
      </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 20px;">ความคิดเห็นที่ 2</span>
      </div>
      <div class="panel-body">
          <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 2</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
          <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
          <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>
          <span style="font-size: 14px;">โดย Anny</span><br>
          <span style="font-size: 14px;">01/01/2559 10:00</span>
      </div>
      <div class="panel-footer text-right">
        <button type="button" class="btn btn-info">ตอบกลับ</button>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
        <span style="font-size: 18px;">โดย Tester 2</span><br><br>
        <span style="font-size: 16px;">เห็นด้วยกับคอมเม้นบน.</span><br><br>
        <span style="font-size: 14px;">01/01/2559 10:00</span>
      </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 20px;">ความคิดเห็นที่ 1</span>
      </div>
      <div class="panel-body">
          <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 3</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
          <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
          <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>
          <span style="font-size: 14px;">โดย Anny</span><br>
          <span style="font-size: 14px;">01/01/2559 10:00</span>
      </div>
      <div class="panel-footer text-right">
        <button type="button" class="btn btn-info">ตอบกลับ</button>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
        <span style="font-size: 18px;">โดย Tester 1</span><br><br>
        <span style="font-size: 16px;">เห็นด้วยกับคอมเม้นบน.</span><br><br>
        <span style="font-size: 14px;">01/01/2559 10:00</span>
      </div>
    </div>

  </div>
</div>

@endsection
