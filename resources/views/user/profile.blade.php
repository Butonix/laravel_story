@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    <style>
        .table th, .table td {
            border-top: none !important;
            border-left: none !important;
            border-bottom: none !important;
        }

        .remove-border {
            border: 0px;
        }
    </style>

    <div class="row" style="margin-top: 20px;">

        @if (session('status_truemoney') == 'success')
            <script type="text/javascript">
                swal({
                    title: "",
                    text: "เติมเงินเข้าสู่ระบบสำเร็จ",
                    html: true
                });
            </script>
        @endif

        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><span
                                style="font-size: 20px;">ข้อมูลส่วนตัว</span></a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12 text-right">
                        <a href="{{ url('user/update/profile') }}" style="font-size: 18px"><i class="fa fa-pencil"></i>
                            แก้ไขข้อมูล</a>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        @if (file_exists(public_path('uploads/profile_images/'.Auth::user()->id)))
                            <img src="{{ url('uploads/profile_images/'.Auth::user()->id) }}" alt="" class="img-circle">
                        @else
                            <i class="fa fa-user-circle fa-5x"></i>
                        @endif
                    </div>
                    <div class="col-md-offset-4 col-md-4">
                        <div class="table-responsive">
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
                                    <td></td>
                                    <td>ชื่อ</td>
                                    <td>
                                        @if (Auth::check())
                                            {{ Auth::User()->username }}
                                        @else
                                            @if (Session::get('facebook_login') != '')
                                                {{ Session::get('facebook_login') }}
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>รายได้</td>
                                    <td>0.00 บาท</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-usd fa-lg"></i></td>
                                    <td>ยอดเหรียญ</td>
                                    <td>{{ number_format($real_amount) }}</td>
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
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <span style="font-size: 22px;">เรื่องทั้งหมด</span>
                    <a href="{{ url('user/write/story') }}" class="pull-right"><span
                                style="font-size: 20px;">เขียนนิยาย</span> <i class="fa fa-plus"></i></a>
                </div>
                <div class="panel-body">

                    @if ($storys)
                        @foreach ($storys as $story)
                            @php
                                $story_visitor = \App\StoryStatistic::find($story->id);
                            @endphp
                            <div class="col-xs-12 col-sm-12 col-md-4" style="margin-top: 20px;">
                                <div class="col-xs-12 col-sm-12 col-md-5 text-center">
                                    <div class="form-group">
                                        <a href="{{ url('user/read/story/'.$story->id) }}">
                                            {{--<img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" style="width: 250px; height: 350px; border-radius: 4px;">--}}
                                            <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" style="width: 120px; height: 120px; border-radius: 4px;">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7 text-left">
                                    <div class="form-group">
                                        <h4>ชื่อเรื่อง <span>{{ $story->story_name }}</span>
                                        </h4>
                                        <span style="font-size: 16px;"><i class="fa fa-user"></i> {{ $story->story_author }}</span><br>
                                        <span style="font-size: 16px;">ยอดวิว {{ $story_visitor->count_visitor }}</span><br>
                                        @if ($story->member_id == Auth::User()->id)
                                            <a href="{{ url('user/update/story/'.$story->id) }}"><i
                                            class="fa fa-pencil"></i> แก้ไขเนื้อหา</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span style="font-size: 20px;">ความคิดเห็นที่ 1</span>
                </div>
                <div class="panel-body">
                    <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 1</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
                    <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
                    <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>
                    <span style="font-size: 14px;">โดย Anny</span><br>
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
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span style="font-size: 20px;">ความคิดเห็นที่ 2</span>
                </div>
                <div class="panel-body">
                    <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 2</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
                    <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
                    <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>
                    <span style="font-size: 14px;">โดย Anny</span><br>
                    <span style="font-size: 14px;">01/01/2559 10:00</span>
                </div>
                <div class="panel-footer text-right">
                    <button type="button" class="btn btn-info">ตอบกลับ</button>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <span style="font-size: 18px;">โดย Tester 2</span><br><br>
                    <span style="font-size: 16px;">เห็นด้วยกับคอมเม้นบน.</span><br><br>
                    <span style="font-size: 14px;">01/01/2559 10:00</span>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span style="font-size: 20px;">ความคิดเห็นที่ 1</span>
                </div>
                <div class="panel-body">
                    <!-- <span style="font-size: 20px;">ความคิดเห็นที่ 3</span><hr style="margin-top: 10px; margin-bottom: 10px;"> -->
                    <!-- <span style="font-size: 16px;">โดย Anny</span><br> -->
                    <span style="font-size: 16px;">ติดตามมานานแล้ว...</span><br><br>
                    <span style="font-size: 14px;">โดย Anny</span><br>
                    <span style="font-size: 14px;">01/01/2559 10:00</span>
                </div>
                <div class="panel-footer text-right">
                    <button type="button" class="btn btn-info">ตอบกลับ</button>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <span style="font-size: 18px;">โดย Tester 1</span><br><br>
                    <span style="font-size: 16px;">เห็นด้วยกับคอมเม้นบน.</span><br><br>
                    <span style="font-size: 14px;">01/01/2559 10:00</span>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']]
                ]
            });
            $('#summernote').on('summernote.change', function (we, contents, $editable) {
                $('#comment').val(contents);
                // console.log(contents);
            });


        });
    </script>

@endsection
