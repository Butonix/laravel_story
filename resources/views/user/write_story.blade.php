@extends('layouts.user')

@section('content')

@include('layouts.components.banner')
@include('layouts.components.navbar')
@include('layouts.components.modal_login')
@include('layouts.components.modal_register')

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ชื่อเรื่อง</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="text" class="form-control input-lg" placeholder="ชื่อเรื่อง ...">
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">นามปากกา</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="text" class="form-control input-lg" placeholder="นามปากกา ...">
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">หมวดนิยาย</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">

        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1" checked>
          <span style="font-size: 16px;">นิยายรักโรแมนติก</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยายอีโรติก 18+</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยายโรมานซ์ 18+</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยาย y</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยายแฟนฟิค</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยายสืบสวน สอบสวน</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยายสยองขวัญ</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยายดราม่า, สะเทือนอารมณ์</span>
        </div>
        <div class="form-group">
          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option1">
          <span style="font-size: 16px;">นิยายทั่วไป, ไม่มีหมวดหมู่</span>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="user/profile" method="get">
          {{ csrf_field() }}
          <div class="form-group">
            <!-- <textarea name="story_detail" id="summernote" class="form-control" rows="8" cols="40" style="resize: none;"></textarea> -->
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

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">รูปภาพหน้าปก</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="file">
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">Tag</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-offset-1 col-md-2">
          <input type="text" class="form-control">
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control">
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control">
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control">
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control">
        </div>
      </div>
    </div>
  </div>
</div>

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

        <div class="form-group text-center">
          <button type="button" class="btn btn-success" style="font-size: 18px; width: 20%;"><i class="fa fa-upload"></i> อัพโหลด</button>
        </div>

        <div class="form-group text-center">
          <button type="button" class="btn btn-danger" style="font-size: 18px; width: 20%;"><i class="fa fa-ban"></i> ยกเลิก</button>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300
    });
  });
</script>

@endsection
