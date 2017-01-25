@extends('layouts.user')

@section('content')

@include('layouts.components.banner')
@include('layouts.components.navbar')
@include('layouts.components.modal_login')
@include('layouts.components.modal_register')

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300
    });
  });
</script>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ลำดับตอน / ชื่อตอน</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="text" class="form-control input-lg" placeholder="ลำดับตอน / ชื่อตอน ...">
      </div>
    </div>
  </div>
</div>

<div id="summernote"></div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">

        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
          <span style="font-size: 16px;">เปิดรับความคิดเห็น</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
          <span style="font-size: 16px;">ปิดรับความคิดเห็น</span>
        </div>
        <hr>

        <div class="form-group">
          <input type="radio" name="optionsRadios1" id="optionsRadios2" value="option1">
          <span style="font-size: 16px;">เผยแพร่</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios1" id="optionsRadios2" value="option1">
          <span style="font-size: 16px;">ปิดไว้</span>
        </div>
        <hr>

        <div class="form-group">
          <input type="checkbox" name="optionsRadios3" id="optionsRadios3" value="option1">
          <span style="font-size: 16px;">เปิดรับเหรียญ</span>
        </div>

        <div class="form-inline">
          <div class="form-group" style="margin-right: 10px;">
            <label for="">
              <i class="fa fa-usd fa-lg"></i>
            </label>
            <select name="" id="" class="form-control">
              <option value="เลือก">--- เลือก ---</option>
              <option value="">1,000</option>
              <option value="">2,000</option>
              <option value="">3,000</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">
              <i class="fa fa-diamond fa-lg"></i>
            </label>
            <select name="" id="" class="form-control">
              <option value="เลือก">--- เลือก ---</option>
              <option value="">1,000</option>
              <option value="">2,000</option>
              <option value="">3,000</option>
            </select>
          </div>
        </div>
        <hr>

        <div class="form-group text-center">
          <button type="button" class="btn btn-success" style="font-size: 18px; width: 20%;"><i class="fa fa-upload"></i> อัพโหลด</button>
        </div>

        <div class="form-group text-center">
          <button type="button" id="btn_cancle" class="btn btn-danger" style="font-size: 18px; width: 20%;"><i class="fa fa-ban"></i> ยกเลิก</button>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
     $('#btn_cancle').on('click', function() {
       window.history.back();
     });
  });
</script>

@endsection
