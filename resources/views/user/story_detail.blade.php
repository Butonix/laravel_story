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
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <span style="font-size: 28px;">บทนำ</span>
      </div>
      <div class="panel-body">
        <span style="font-size: 16px;">เนื้อเรื่อง ...</span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group text-center">
      <button type="button" class="btn btn-danger" style="font-size: 18px;">
        ชอบ <i class="fa fa-exclamation fa-lg"></i>
        มอบ <i class="fa fa-heart fa-lg"></i> ให้เลย
     </button>
    </div>
  </div>
</div>

@include('user.components.comment')

@endsection
