@extends('layouts.user')

@section('content')

@include('layouts.components.banner')
@include('layouts.components.navbar')
@include('layouts.components.modal_login')
@include('layouts.components.modal_register')

<style>
  /*.table th, .table td {
    border-top: none !important;
    border-left: none !important;
    border-bottom: none !important;
  }*/
  .remove-border th, .remove-border td {
    border: 0px !important;
    border-top: none !important;
    border-left: none !important;
    border-bottom: none !important;
  }
</style>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12 text-center">
          <span style="font-size: 40px;">{{ $story->story_name }}</span><br><br>
          <div class="form-group">
            <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" class=""  style="width: 250px; height: 350px;" alt="">
          </div>
        </div>
        <div class="col-md-offset-4 col-md-4">
          <div class="table-responsive">
            <table class="table remove-border">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>นักเขียน</td>
                  <td>{{ $story->story_author }}</td>
                </tr>
                <tr>
                  <td>หมวดนิยาย</td>
                  <td>{{ $story->category_name }}</td>
                </tr>
                <tr>
                  <td>ยอดวิว</td>
                  <td>{{ $story->visit }}</td>
                </tr>
                <tr>
                  <td>ความคิดเห็น</td>
                  <td>none</td>
                </tr>
                <tr>
                  <td>อัพเดทล่าสุด</td>
                  <td>{{ date_format($story->created_at, 'Y/m/d') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('user.components.award')

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <img src="" style="background-color: #ffe6ff; width: 100%; height: 150px;" alt="">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <span style="font-size: 24px;">ไฮไลท์ / คำโปรย</span>
      </div>
      <div class="panel-body" id="story_outline">
        {!! $story->story_outline !!}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12" style="margin-top: 15px;">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>วันที่</th>
                  <th>ลำดับตอน / ชื่อตอน</th>
                  <th>Read</th>
                  <th>Comment</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01/11/59</td>
                  <td><a href="{{ url('user/read/story/detail/1') }}">บทนำ</a></td>
                  <td>1 k</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>02/11/59</td>
                  <td>...</td>
                  <td>2 k</td>
                  <td>20</td>
                </tr>
                <tr>
                  <td>03/11/59</td>
                  <td>...</td>
                  <td>3 k</td>
                  <td>30</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group text-center">
          <a href="{{ url('user/write/story/sub/1') }}">เพิ่มตอนใหม่ <i class="fa fa-plus fa-lg"></i></a>
        </div>

      </div>
    </div>
  </div>
</div>

@include('user.components.comment')

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 20px;">ความคิดเห็นที่ 3</span> : <span style="font-size: 18px;"> จากตอน บทนำ</span>
      </div>
      <div class="panel-body">
          <span style="font-size: 14px;">โดย Anny</span><br><br>
          <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 1</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
          <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
          <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>

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
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 20px;">ความคิดเห็นที่ 2</span> : <span style="font-size: 18px;"> จากตอน บทนำ</span>
      </div>
      <div class="panel-body">
          <span style="font-size: 14px;">โดย Anny</span><br><br>
          <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 1</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
          <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
          <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>

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
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 20px;">ความคิดเห็นที่ 1</span> : <span style="font-size: 18px;"> จากตอน บทนำ</span>
      </div>
      <div class="panel-body">
          <span style="font-size: 14px;">โดย Anny</span><br><br>
          <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 1</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
          <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
          <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>

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

<script>
    $(document).ready(function() {

        $('#summernote').summernote({
            height: 300,
            toolbar: [
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['fontsize', ['fontsize']],
              ['color', ['color']]
            ]
        });
        $('#summernote').on('summernote.change', function(we, contents, $editable) {
            $('#comment').val(contents);
            // console.log(contents);
        });


    });
</script>

@endsection
