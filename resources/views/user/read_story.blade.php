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
          <span style="font-size: 40px;">ไฟรัก แรงแค้น</span><br><br>
          <div class="form-group">
            <img src="{{ url('images/story/example.jpg') }}" class=""  style="width: 250px; height: 350px;" alt="">
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
                  <td>Anny</td>
                </tr>
                <tr>
                  <td>หมวดนิยาย</td>
                  <td>รักโรแมนติก</td>
                </tr>
                <tr>
                  <td>ยอดวิว</td>
                  <td>1.5 m</td>
                </tr>
                <tr>
                  <td>ความคิดเห็น</td>
                  <td>1.4 k</td>
                </tr>
                <tr>
                  <td>อัพเดทล่าสุด</td>
                  <td>01/01/59 12.30</td>
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
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-offset-4 col-md-4">
          <div class="table-responsive remove-border">
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
          <div class="text-center">
            <button type="button" class="btn btn-danger">
              ชอบ <i class="fa fa-exclamation fa-lg"></i>
              มอบ <i class="fa fa-heart fa-lg"></i> ให้เลย
           </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
      <div class="panel-body">
        ...<br>
        ...<br>
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
                  <td>บทนำ</td>
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
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <span style="font-size: 20px;">Comment / Review</span>
      </div>
      <div class="panel-body">
        <form action="user/profile" method="get">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="story_detail" class="form-control" rows="8" cols="40" style="resize: none;"></textarea>
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

@endsection
