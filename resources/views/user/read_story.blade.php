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
                function () {
                    window.location = "{{ url('/') }}";
                })
        </script>
    @endif

    @if ($status_alert == 1)
        <script type="text/javascript">
            swal({
                    title: "",
                    text: "ภาพหรือเนื้อหาต่อไปนี้ อาจไม่เหมาะสมแก่ผู้ที่มีอายุต่ำกว่า 18 ปี โปรดใช้วิจารณญาณในการอ่าน",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ยกเลิก",
//                cancelButtonColor: "#66cc00",
                    cancelButtonText: "ตกลง",
                    closeOnConfirm: false
                },
                function () {
                    window.location = "{{ url('/') }}";
                });
        </script>
    @endif

    @php
        $tag = \App\Tag::find($story->id);
    @endphp

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12 text-center">
                        <span style="font-size: 40px;">{{ $story->story_name }}</span><br>
                        <div class="form-group">
                            <span style="font-size: 18px; color: #a6a6a6;">Tag :
                                @if ($tag->tag1 != NULL){{ $tag->tag1 }}, @endif
                                @if ($tag->tag2 != NULL){{ $tag->tag2 }}, @endif
                                @if ($tag->tag3 != NULL){{ $tag->tag3 }}, @endif
                                @if ($tag->tag4 != NULL){{ $tag->tag4 }}, @endif
                                @if ($tag->tag5 != NULL){{ $tag->tag5 }} @endif
                            </span><br>
                        </div>
                        <div class="form-group">
                            <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" class=""
                                 style="width: 250px; height: 350px;" alt="">
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
                                    <td>
                                        <a href="{{ url('user/profile/'.$story->story_author) }}">{{ $story->story_author }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>หมวดนิยาย</td>
                                    <td><a href="{{ url('category/'.$story->category_id) }}">{{ $category_name }}</a></td>
                                </tr>
                                <tr>
                                    <td>ยอดวิว</td>
                                    <td>{{ $storyStatistic->count_visitor }}</td>
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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sub_storys as $sub_story)
                        @php
                            $created_at = \Carbon\Carbon::parse($sub_story->created_at)->addYears(543)->format("d / m / Y");
                            $visitor = App\SubStoryStatistic::where('sub_story_id', $sub_story->id)->first();
                            $comment = App\SubStoryComment::where('sub_story_id', $sub_story->id)->first();
                        @endphp
                        <tr>
                            <td>{{ $created_at }}</td>
                            <td><a href="{{ url('user/read/story/detail/'.$sub_story->id) }}"
                                   target="_blank">{{ $sub_story->story_name }}</a></td>
                            <td>{{ $visitor->count_visitor }}</td>
                            <td>{{ count($comment) }}</td>
                            <td><a href="{{ url('user/update/sub_story/'.$sub_story->id) }}"><i
                                            class="fa fa-pencil"></i> แก้ไขเนื้อหา</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group text-center">
            <a href="{{ url('user/write/story/sub/'.$id) }}">
                <button type="button" class="btn btn-primary" style="width: 20%; font-size: 18px;">เพิ่มตอนใหม่ <i
                            class="fa fa-plus"></i></button>
            </a>
        </div>

        @if ($permission_story->status_comment == 1)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <span style="font-size: 22px;">ความคิดเห็น / รีวิว</span>
                </div>
                <div class="form-group">
                    <form action="{{ url('user/comment/story/'.$story->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="story_id" value="{{ $story->id }}">
                            <input type="hidden" name="story_name" value="{{ $story->story_name }}">
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
                            <button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;">บันทึก
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

    </div>

    @foreach ($story_comments as $story_comment)
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                {{-- Comment --}}
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <span style="font-size: 20px;">ความคิดเห็นที่ {{ $story_comment->id }}</span>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <span style="font-size: 14px;">โดย {{ $story_comment->username }}</span>
                        </div>

                        <div class="form-group">
                            <span style="font-size: 16px;">{!! $story_comment->comment_detail !!}</span>
                        </div>

                        <div class="form-group">
              <span style="font-size: 14px;">โพสต์เมื่อ
                  @php
                      $created_at = \Carbon\Carbon::parse($story_comment->created_at)->addYears(543)->format("d / m / Y");
                      echo $created_at;
                  @endphp
              </span>
                        </div>

                    </div>
                    <div class="panel-footer text-right">
                        <button type="button" class="btn btn-info" id="reply_show_{{ $loop->iteration }}">ตอบกลับ
                        </button>
                    </div>
                </div>
                {{-- End Comment --}}

                {{-- Show Reply --}}
                @php
                    $reply_comments = \App\ReplyCommentStory::where('reply_comment_id', $story_comment->id)->get();
                @endphp

                @foreach ($reply_comments as $reply_comment)
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <span style="font-size: 18px;">ตอบกลับ ความคิดเห็นที่ {{ $story_comment->id }}</span>
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
                <form action="{{ url('user/reply/comment/story/'.$story_comment->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="panel panel-default" id="reply{{ $loop->iteration }}">
                        <div class="panel-heading">
                            <span style="font-size: 18px;">ตอบกลับ ความคิดเห็น {{ $story_comment->id }}</span>
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
                            <button type="submit" class="btn btn-success" id="btn_reply_{{ $loop->iteration }}">บันทึก
                            </button>
                            <button type="button" class="btn btn-warning" id="btn_cancle_{{ $loop->iteration }}">
                                ยกเลิก
                            </button>
                        </div>
                    </div>
                </form>
                {{-- End Reply Comment--}}

            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#reply{{ $loop->iteration }}').hide();
                $('#summernote{{ $loop->iteration }}').on('summernote.change', function (we, contents, $editable) {
                    $('#reply_comment_{{ $loop->iteration }}').val(contents);
                    console.log(contents);
                });
                $('#reply_show_{{ $loop->iteration }}').on('click', function () {
                    $('#reply{{ $loop->iteration }}').show();
                });
                $('#btn_cancle_{{ $loop->iteration }}').on('click', function () {
                    $('#reply{{ $loop->iteration }}').hide();
                });
            });
        </script>
    @endforeach

    <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']]
                ]
            });

            $('#summernote').on('summernote.change', function (we, contents, $editable) {
                $('#comment_detail').val(contents);
                console.log(contents);
            });

        });
    </script>

@endsection
