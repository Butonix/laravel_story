@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')
    @include('layouts.components.carousel')

    <div class="row">

        @if (session('coming_soon'))
            <script type="text/javascript">
                swal({
                    title: "",
                    text: "กำลังอยู่ในช่วงพัฒนาระบบ ...",
                    html: true
                })
            </script>
        @endif

        @if (session('status'))
            <script type="text/javascript">
                swal({
                    title: "",
                    text: "{{ session('status') }}",
                    html: true
                });
            </script>
        @endif

        @if (session('status_all'))
            <script type="text/javascript">
                swal("", "ชื่อผู้ใช้งานและอีเมลนี้มีผู้อื่นใช้แล้ว", "error")

                $(document).ready(function () {
                    $('#myModalRegister').modal();
                });
            </script>
        @endif

        @if (session('status_username'))
            <script type="text/javascript">
                swal("", "ชื่อผู้ใช้งานนี้มีผู้อื่นใช้แล้ว", "error")

                $(document).ready(function () {
                    $('#myModalRegister').modal();
                });
            </script>
        @endif

        @if (session('status_email'))
            <script type="text/javascript">
                swal("", "อีเมลนี้มีผู้อื่นใช้แล้ว", "error")

                $(document).ready(function () {
                    $('#myModalRegister').modal();
                });
            </script>
        @endif

        @if (session('status_success'))
            <script type="text/javascript">
                // swal("", "สมัครสมาชิกสำเร็จ", "success")
                swal({
                    title: "",
                    text: "สมัครสมาชิกสำเร็จ",
                    html: true
                })
            </script>
        @endif

        @if (session('status_login'))
            <script type="text/javascript">
                swal("", "กรุณาตรวจสอบอีเมลและรหัสผ่านอีกครั้ง", "error")

                $(document).ready(function () {
                    $('#myModalLogin').modal();
                });
            </script>
        @endif

        @if (session('status_search'))
            <script type="text/javascript">
                swal("", "ไม่พบข้อมูลการค้นหา", "error")
            </script>
        @endif

        @if (session('status_permission'))
            <script type="text/javascript">
                swal("", "กรุณาเข้าสู่ระบบ", "error")
            </script>
        @endif

        @if (session('status') == 'device limit')
            <script type="text/javascript">
                swal({
                    title: "",
                    text: "<span style='font-size: 18px;'>กรุณาออกจากระบบ<br>บนอุปกรณ์ชนิดอื่นก่อน</span>",
                    html: true
                })
            </script>
        @endif

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <span style="font-size: 22px;"><!-- <i class="fa fa-newspaper-o fa-2x"></i> --> นิยายอัพเดตล่าสุด</span>
                </div>
                <div class="body" style="//background-color: #ffffe6;">
                    <div class="media">

                        @foreach ($storys as $story)
                            @if ($story->status_public == 1)
                                <div class="col-xs-12 col-sm-12 col-md-4" style="margin-top: 20px;">
                                    <div class="col-xs-12 col-sm-12 col-md-5 text-center">
                                        <div class="form-group">
                                            <a href="{{ url('user/read/story/'.$story->id) }}">
                                                {{--<img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" style="width: 250px; height: 350px; border-radius: 4px;">--}}
                                                <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}"
                                                     style="width: 120px; height: 120px; border-radius: 4px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7 text-left">
                                        <div class="form-group">
                                            <h4>ชื่อเรื่อง <span>{{ $story->story_name }}</span>
                                            </h4>
                                            <span style="font-size: 16px;"><i
                                                        class="fa fa-user"></i> {{ $story->story_author }}</span><br>
                                            <span style="font-size: 16px;">ยอดวิว {{ $story->count_visitor }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a href="#" class="pull-right"
                               style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-left">
                    <span style="font-size: 22px;">จัดอันดับผู้อ่าน</span>
                </div>
                <div class="body" style="//background-color: #ffffe6;">
                    <div class="media">

                        @foreach ($top_visitors as $top_visitor)
                            @php
                                $story = App\Story::find($top_visitor->id);
                            @endphp

                            @if ($story->status_public == 1)
                                <div class="col-xs-12 col-sm-12 col-md-4" style="margin-top: 20px;">
                                    <div class="col-xs-12 col-sm-12 col-md-5 text-center">
                                        <div class="form-group">
                                            <a href="{{ url('user/read/story/'.$story->id) }}">
                                                {{--<img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" style="width: 250px; height: 350px; border-radius: 4px;">--}}
                                                <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}"
                                                     style="width: 120px; height: 120px; border-radius: 4px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7 text-left">
                                        <div class="form-group">
                                            <h4>ชื่อเรื่อง <span>{{ $story->story_name }}</span>
                                            </h4>
                                            <span style="font-size: 16px;"><i
                                                        class="fa fa-user"></i> {{ $story->story_author }}</span><br>
                                            <span style="font-size: 16px;">ยอดวิว {{ $story->count_visitor }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @endforeach

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a href="#" class="pull-right"
                               style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--<div class="col-xs-12 col-sm-12 col-md-12">--}}
            {{--<div class="panel panel-success">--}}
                {{--<div class="panel-heading text-left">--}}
                    {{--<span style="font-size: 22px;">จัดอันดับสนับสนุน</span>--}}
                {{--</div>--}}
                {{--<div class="body" style="//background-color: #ffffe6;">--}}
                    {{--<div class="media">--}}

                        {{--<a href="#" class="pull-right"--}}
                           {{--style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-left">
                    <span style="font-size: 22px;">จัดอันดับหัวใจ</span>
                </div>
                <div class="body" style="//background-color: #ffffe6;">
                    <div class="media">

                        @foreach ($storys as $story)
                            <div class="col-xs-12 col-sm-12 col-md-4" style="margin-top: 20px;">
                                <div class="col-xs-12 col-sm-12 col-md-5 text-center">
                                    <div class="form-group">
                                        <a href="{{ url('user/read/story/'.$story->id) }}">
                                            {{--<img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" style="width: 250px; height: 350px; border-radius: 4px;">--}}
                                            <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}"
                                                 style="width: 120px; height: 120px; border-radius: 4px;">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7 text-left">
                                    <div class="form-group">
                                        <h4>ชื่อเรื่อง <span>{{ $story->story_name }}</span>
                                        </h4>
                                        <span style="font-size: 16px;"><i
                                                    class="fa fa-user"></i> {{ $story->story_author }}</span><br>
                                        <span style="font-size: 16px;">ยอดวิว {{ $story->count_visitor }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a href="#" class="pull-right"
                               style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-left">
                    <span style="font-size: 22px;">อันดับนักเขียน</span>
                </div>
                <div class="body" style="//background-color: #ffffe6; //padding-top: 20px;">

                    <div class="list-group" style="//margin-top: 10px;">
                        @foreach ($sortDescByStory as $story)
                            @php
                                $member = \App\Member::find($story->member_id);
                            @endphp
                            <button type="button" class="list-group-item"><span class="pull-left"><i class="fa fa-star" style="color: orange;"></i> อันดับ {{ $loop->iteration }}
                                    <a href="{{ url('user/profile/'.$member->username) }}">{{ $member->username }}</a></span>
                            </button>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <span style="font-size: 25px;" class="pull-left"><i class="fa fa-comments-o fa-lg"></i> เว็บบอร์ด / กิจกรรม</span>
                    <a href="{{ url('user/announce/create') }}" class="pull-right" style="margin-bottom: 10px;"><span
                                style="font-size: 20px;">สร้างกระทู้</span></a>

                    <div class="list-group" style="margin-top: 10px;">

                        @foreach ($announces as $announce)
                            @php
                                $member = \App\Member::find($announce->member_id);
                            @endphp
                            <button type="button" class="list-group-item"><span class="pull-left">{{ $loop->iteration }}
                                    . <a href="{{ url('user/announce/read/'.$announce->id) }}">{{ $announce->announce_title }}</a> โดย {{ $member->username }}</span>
                                <span class="pull-right">{{ $announce->created_at }}</span></button>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end row -->

@endsection
