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
                  <td>{{ $category_name }}</td>
                </tr>
                <tr>
                  <td>ยอดวิว</td>
                  <td>{{ $visitor_count }}</td>
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
        <span style="font-size: 20px; font-weight: bold;">ไฮไลท์ / คำโปรย</span>
      </div>
      <div class="panel-body" id="story_outline">
        {!! $story->story_outline !!}
      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered bg_white">
        <thead>
          <tr class="bg-success">
            <th style="font-size: 18px;">วันที่</th>
            <th style="font-size: 18px;">ลำดับตอน / ชื่อตอน</th>
            <th style="font-size: 18px;">จำนวนการเข้าชม</th>
            <th style="font-size: 18px;">ความคิดเห็น</th>
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
    <a href="{{ url('user/write/story/sub/1') }}"><button type="button" class="btn btn-primary" style="width: 20%; font-size: 18px;">เพิ่มตอนใหม่ <i class="fa fa-plus"></i></button></a>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <span style="font-size: 22px;">ความคิดเห็น / รีวิว</span>
    </div>
    <div class="form-group">
      <form action="{{ url('user/story/comment') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <!-- <textarea name="story_detail" class="form-control" rows="8" cols="40" style="resize: none;"></textarea> -->
          <input type="hidden" name="story_id" value="{{ $story->id }}">
          <input type="hidden" name="story_name" value="{{ $story->story_name }}">
          @if (Auth::check())
            <input type="hidden" name="username" value="{{ Auth::User()->username }}">
          @else
            @if (Session::get('facebook_login') != '')
              <input type="hidden" name="username" value="{{ Session::get('facebook_login') }}">
            @endif
          @endif
          <div id="summernote"></div>
          <input type="hidden" name="comment" id="comment">
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>

</div>

{{--<div class="row">--}}
  {{--<div class="col-xs-12 col-sm-12 col-md-12">--}}
    {{--<div class="panel panel-default">--}}
      {{--<div class="panel-heading">--}}
        {{--<span style="font-size: 20px;">ความคิดเห็น / รีวิว</span>--}}
      {{--</div>--}}
      {{--<div class="panel-body">--}}
        {{--<form action="{{ url('user/story/comment') }}" method="post">--}}
          {{--{{ csrf_field() }}--}}
          {{--<div class="form-group">--}}
            {{--<!-- <textarea name="story_detail" class="form-control" rows="8" cols="40" style="resize: none;"></textarea> -->--}}
            {{--<input type="hidden" name="story_id" value="{{ $story->id }}">--}}
            {{--<input type="hidden" name="story_name" value="{{ $story->story_name }}">--}}
            {{--@if (Auth::check())--}}
              {{--<input type="hidden" name="username" value="{{ Auth::User()->username }}">--}}
            {{--@else--}}
              {{--@if (Session::get('facebook_login') != '')--}}
                {{--<input type="hidden" name="username" value="{{ Session::get('facebook_login') }}">--}}
              {{--@endif--}}
            {{--@endif--}}
            {{--<div id="summernote"></div>--}}
            {{--<input type="hidden" name="comment" id="comment">--}}
          {{--</div>--}}
          {{--<div class="form-group text-center">--}}
            {{--<button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;">บันทึก</button>--}}
          {{--</div>--}}
        {{--</form>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
{{--</div>--}}

@foreach ($story_comments as $story_comment)
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">
          <span style="font-size: 20px;">ความคิดเห็นที่ {{ $story_comment->story_id }}</span> : <span style="font-size: 18px;"> เรื่อง </span>
        </div>
        <div class="panel-body">
            <span style="font-size: 14px;">โดย {{ $story_comment->username }}</span><br><br>
            <span style="font-size: 16px;">{!! $story_comment->comment_detail !!}</span><br><br>

            <span style="font-size: 14px;">โพสต์เมื่อ {{ $story_comment->created_at }}</span>
        </div>
        <div class="panel-footer text-right">
          <button type="button" class="btn btn-info" disabled>ตอบกลับ</button>
        </div>
      </div>
    </div>
  </div>
@endforeach

<!-- <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 20px;">ความคิดเห็นที่ 3</span> : <span style="font-size: 18px;"> จากตอน บทนำ</span>
      </div>
      <div class="panel-body">
          <span style="font-size: 14px;">โดย Anny</span><br><br>
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
</div> -->

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
