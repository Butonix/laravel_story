@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    <form action="{{ url('user/write/story/sub/'.$id) }}" method="post">
        {{ csrf_field() }}
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">ลำดับตอน / ชื่อตอน</span></a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" class="form-control input-lg" name="story_name"
                               placeholder="ลำดับตอน / ชื่อตอน ..." required>
                    </div>
                </div>
            </div>
        </div>

        <div id="summernote"></div>
        <input type="hidden" name="story_outline" id="story_outline">

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="form-group">
                            <input type="radio" name="status_comment" value="1" checked>
                            <span style="font-size: 16px;">เปิดรับความคิดเห็น</span>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status_comment" value="0">
                            <span style="font-size: 16px;">ปิดรับความคิดเห็น</span>
                        </div>
                        <hr>

                        <div class="form-group">
                            <input type="radio" name="status_public" value="1" checked>
                            <span style="font-size: 16px;">เผยแพร่</span>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status_public" value="0">
                            <span style="font-size: 16px;">ปิดไว้</span>
                        </div>
                        <hr>

                        @if ($count_sub_story >= 4)
                            <div class="form-group">
                                <span style="font-size: 16px;">เปิดรับเหรียญ <span style="color: green;">(กรณีต้องการให้เข้าชมฟรี ให้เว้นว่าง)</span></span>
                            </div>

                            <div class="form-inline">
                                <div class="form-group" style="margin-right: 10px;">
                                    <label for="">
                                        <i class="fa fa-usd fa-lg"></i>
                                    </label>
                                    <select name="unlock_coin" id="" class="form-control">
                                        <option value="0">--- เลือก ---</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                        <option value="500">500</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        <i class="fa fa-diamond fa-lg"></i>
                                    </label>
                                    <select name="unlock_diamond" id="" class="form-control">
                                        <option value="0">--- เลือก ---</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        @endif

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;"><i
                                        class="fa fa-upload"></i> อัพโหลด
                            </button>
                        </div>

                        <div class="form-group text-center">
                            <button type="button" id="btn_cancle" class="btn btn-danger"
                                    style="font-size: 18px; width: 20%;"><i class="fa fa-ban"></i> ยกเลิก
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {

            $('#summernote').summernote({
                height: 600
            });

            $('#summernote').on('summernote.change', function (we, contents, $editable) {
                $('#story_outline').val(contents);
                // console.log(contents);
            });

            $('#btn_cancle').on('click', function () {
                window.history.back();
            });
        });
    </script>

@endsection
