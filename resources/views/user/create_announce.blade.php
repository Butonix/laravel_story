@extends('layouts.user') @section('content') @include('layouts.components.banner') @include('layouts.components.navbar') @include('layouts.components.modal_login') @include('layouts.components.modal_register') @php $categorys = App\Category::all(); @endphp

<div class="row" style="margin-top: 20px;">
  <form action="{{ url('user/announce/create') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="col-xs-12 col-sm-12 col-md-12">
          <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ชื่อเรื่อง</span></a></li>
          </ul>
          <div class="panel panel-default">
              <div class="panel-body">
                  <input type="text" name="announce_title" class="form-control input-lg" placeholder="ชื่อเรื่อง ..." required>
              </div>
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="form-group">
                      <!-- <textarea name="story_detail" id="summernote" class="form-control" rows="8" cols="40" style="resize: none;"></textarea> -->
                      <div id="summernote"></div>
                      <input type="hidden" name="announce_detail" id="announce_detail">
                  </div>
              </div>
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="panel panel-default">
              <div class="panel-body">

                  <div class="form-group">
                      <input type="radio" name="state_comment" value="1" checked>
                      <span style="font-size: 16px;">เปิดรับความคิดเห็น</span>
                  </div>
                  <div class="form-group">
                      <input type="radio" name="state_comment" value="0">
                      <span style="font-size: 16px;">ปิดรับความคิดเห็น</span>
                  </div>

                  <hr>

                  <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px;">
                      <div class="form-group text-center">
                          <button type="submit" id="btn_submit" class="btn btn-success" style="font-size: 18px; width: 100%;"><i class="fa fa-upload"></i> อัพโหลด</button>
                      </div>
                  </div>

                  <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px;">
                      <div class="form-group text-center">
                          <button type="reset" class="btn btn-danger" style="font-size: 18px; width: 100%;"><i class="fa fa-ban"></i> ยกเลิก</button>
                      </div>
                  </div>

              </div>
          </div>
      </div>
      <!-- </div> -->
  </form>
</div>

<script>
    $(document).ready(function() {

        $('#summernote').summernote({
            height: 300,
            toolbar: [
              ['style', ['bold', 'italic', 'underline']]
            ]
        });
        $('#summernote').on('summernote.change', function(we, contents, $editable) {
            $('#announce_detail').val(contents);
        });

    });
</script>

@endsection
