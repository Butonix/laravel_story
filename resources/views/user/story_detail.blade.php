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

@php

  if (Auth::check()) {
    $username = Auth::User()->username;
  } else {
    if (Session::get('facebook_login') != '') {
      $username = Session::get('facebook_login');
    }
  }

@endphp

@if ($status_ban == 1)
  <script type="text/javascript">
      swal({
          title: "",
          text: "<h1>เนื้อหาถูกบล็อก !</h1><br>" +
          "<h4>เนื่องจากมีข้อความและรูปภาพที่คุณใช้ไม่เหมาะสม</h4><br>" +
          "<a href='{{ url('contact') }}'><i class='fa fa-phone fa-lg'></i> <span style='font-size: 20px;'>ติดต่อเรา</span></a>",
          html: true,
          closeOnConfirm: false
      },
      function(){
          window.location = "{{ url('/') }}";
      })
  </script>
@endif

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12 text-center">
          <span style="font-size: 40px;">{{ $sub_story->story_name }}</span><br><br>
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
                  <td>{{ $author }}</td>
                </tr>
                <tr>
                  <td>หมวดนิยาย</td>
                  <td>{{ $category }}</td>
                </tr>
                <tr>
                  <td>ยอดวิว</td>
                  <td>{{ $visitor->count }}</td>
                </tr>
                <tr>
                  <td>ความคิดเห็น</td>
                  <td>{{ $comment }}</td>
                </tr>
                <tr>
                  <td>อัพเดทล่าสุด</td>
                  <td>{{ $updated_at }}</td>
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
        <span style="font-size: 28px;">{{ $sub_story->story_name }}</span>
      </div>
      <div class="panel-body">
        <span style="font-size: 16px;">{!! $sub_story->story_outline !!}</span>
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

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <span style="font-size: 22px;">ความคิดเห็น / รีวิว</span>
    </div>
    <div class="form-group">
      <form action="{{ url('user/comment/sub_story/'.$sub_story_id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="hidden" name="sub_story_id" value="{{ $sub_story_id }}">
          @if (Auth::check())
            <input type="hidden" name="username" value="{{ Auth::User()->username }}">
          @else
            @if (Session::get('facebook_login') != '')
              <input type="hidden" name="username" value="{{ Session::get('facebook_login') }}">
            @endif
          @endif
          <div class="summernote" id="summernote"></div>
          <input type="hidden" name="comment_detail" id="comment_detail">
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach ($sub_story_comments as $sub_story_comment)
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">

      {{-- Comment --}}
      <div class="panel panel-success">
        <div class="panel-heading">
          <span style="font-size: 20px;">ความคิดเห็นที่ {{ $sub_story_comment->id }}</span>
        </div>
        <div class="panel-body">

          <div class="form-group">
            <span style="font-size: 14px;">โดย {{ $sub_story_comment->username }}</span>
          </div>

          <div class="form-group">
            <span style="font-size: 16px;">{!! $sub_story_comment->comment_detail !!}</span>
          </div>

          <div class="form-group">
              <span style="font-size: 14px;">โพสต์เมื่อ
                @php
                  $created_at = \Carbon\Carbon::parse($sub_story_comment->created_at)->addYears(543)->format("d / m / Y");
                  echo $created_at;
                @endphp
              </span>
          </div>

        </div>
        <div class="panel-footer text-right">
          <button type="button" class="btn btn-info" id="reply_show_{{ $loop->iteration }}">ตอบกลับ</button>
        </div>
      </div>
      {{-- End Comment --}}

      {{-- Show Reply --}}
      @php
        $reply_comments = \App\ReplyCommentSubStory::where('reply_comment_id', $sub_story_comment->id)->get();
      @endphp

      @foreach ($reply_comments as $reply_comment)
        <div class="panel panel-warning">
          <div class="panel-heading">
            <span style="font-size: 18px;">ตอบกลับ ความคิดเห็นที่ {{ $sub_story_comment->id }}</span>
          </div>
          <div class="panel-body">

            <div class="form-group">
              <span style="font-size: 14px;">โดย {{ $reply_comment->username }}</span>
            </div>

            <div class="form-group">
              <span style="font-size: 16px;">{!! $reply_comment->comment_detail !!}</span>
            </div>

            <div class="form-group">
                <span style="font-size: 14px;">โพสต์เมื่อ
                  @php
                    $created_at = \Carbon\Carbon::parse($reply_comment->created_at)->addYears(543)->format("d / m / Y");
                    echo $created_at;
                  @endphp
                </span>
            </div>

          </div>
        </div>
      @endforeach

      {{-- End Show Reply --}}

      {{-- Reply Comment --}}
      <form action="{{ url('user/reply/comment/sub_story/'.$sub_story_comment->id) }}" method="post">
        {{ csrf_field() }}
        <div class="panel panel-default" id="reply{{ $loop->iteration }}">
          <div class="panel-heading">
            <span style="font-size: 18px;">ตอบกลับ ความคิดเห็น {{ $sub_story_comment->id }}</span>
          </div>
          <div class="panel-body">

            <div class="form-group">
              <span style="font-size: 16px;">โดย {{ $username }}</span>
              <input type="hidden" name="username" value="{{ $username }}">
            </div>

            <div class="form-group">
              <div class="summernote" id="summernote{{ $loop->iteration }}"></div>
              <input type="hidden" name="comment_detail" id="reply_comment_{{ $loop->iteration }}">
            </div>

          </div>
          <div class="panel-footer text-right">
            <button type="submit" class="btn btn-success" id="btn_reply_{{ $loop->iteration }}">บันทึก</button>
            <button type="button" class="btn btn-warning" id="btn_cancle_{{ $loop->iteration }}">ยกเลิก</button>
          </div>
        </div>
      </form>
      {{-- End Reply Comment--}}

    </div>
  </div>

  <script>
      $(document).ready(function() {
          $('#reply{{ $loop->iteration }}').hide();
          $('#summernote{{ $loop->iteration }}').on('summernote.change', function(we, contents, $editable) {
              $('#reply_comment_{{ $loop->iteration }}').val(contents);
              console.log(contents);
          });
          $('#reply_show_{{ $loop->iteration }}').on('click', function() {
              $('#reply{{ $loop->iteration }}').show();
          });
          $('#btn_cancle_{{ $loop->iteration }}').on('click', function() {
              $('#reply{{ $loop->iteration }}').hide();
          });
      });
  </script>
@endforeach

<script>
    $(document).ready(function() {

        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']]
            ]
        });

        $('#summernote').on('summernote.change', function(we, contents, $editable) {
            $('#comment_detail').val(contents);
            console.log(contents);
        });

    });
</script>

@endsection
