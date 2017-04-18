@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    <div class="row" style="margin-top: 20px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <span style="font-size: 28px;">แก้ไขเนื้อหา {{ $sub_story->story_name }}</span>
            </div>
        </div>
    </div>

    <form action="{{ url('user/update/sub_story/'.$sub_story->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ลำดับตอน / ชื่อตอน</span></a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" class="form-control input-lg" name="story_name" placeholder="ลำดับตอน / ชื่อตอน ..." value="{{ $sub_story->story_name }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div id="summernote">{!! $sub_story->story_outline !!}</div>
        <input type="hidden" name="story_outline" id="story_outline" value="{{ $sub_story->story_outline }}">

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @if ($permission_sub_story->status_comment == 1)
                            <div class="form-group">
                                <input type="radio" name="status_comment" value="1" checked>
                                <span style="font-size: 16px;">เปิดรับความคิดเห็น</span>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="status_comment" value="0">
                                <span style="font-size: 16px;">ปิดรับความคิดเห็น</span>
                            </div>
                        @else
                            <div class="form-group">
                                <input type="radio" name="status_comment" value="1">
                                <span style="font-size: 16px;">เปิดรับความคิดเห็น</span>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="status_comment" value="0" checked>
                                <span style="font-size: 16px;">ปิดรับความคิดเห็น</span>
                            </div>
                        @endif

                        <hr>

                        @if ($permission_sub_story->status_public == 1)
                            <div class="form-group">
                                <input type="radio" name="status_public" value="1" checked>
                                <span style="font-size: 16px;">เผยแพร่</span>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="status_public" value="0">
                                <span style="font-size: 16px;">ปิดไว้</span>
                            </div>
                        @else
                            <div class="form-group">
                                <input type="radio" name="status_public" value="1">
                                <span style="font-size: 16px;">เผยแพร่</span>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="status_public" value="0" checked>
                                <span style="font-size: 16px;">ปิดไว้</span>
                            </div>
                        @endif

                        <hr>

                        @if ($status_show_limit == 1)
                            <div class="form-group">
                                <span style="font-size: 16px;">เปิดรับเหรียญ <span style="color: green;">(กรณีต้องการให้เข้าชมฟรี ให้เว้นว่าง)</span></span>
                            </div>

                            <div class="form-inline">
                                <div class="form-group" style="margin-right: 10px;">
                                    <label for="">
                                        <i class="fa fa-usd fa-lg"></i>
                                    </label>
                                    <select name="unlock_coin" id="" class="form-control">

                                        @if ($permission_sub_story->unlock_coin == 0)
                                            <option value="0" selected>--- เลือก ---</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        @elseif ($permission_sub_story->unlock_coin == 200)
                                            <option value="0">--- เลือก ---</option>
                                            <option value="200" selected>200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        @elseif ($permission_sub_story->unlock_coin == 300)
                                            <option value="0">--- เลือก ---</option>
                                            <option value="200">200</option>
                                            <option value="300" selected>300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        @elseif ($permission_sub_story->unlock_coin == 400)
                                            <option value="0">--- เลือก ---</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400" selected>400</option>
                                            <option value="500">500</option>
                                        @else
                                            <option value="0">--- เลือก ---</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500" selected>500</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        <i class="fa fa-diamond fa-lg"></i>
                                    </label>
                                    <select name="unlock_diamond" id="" class="form-control">
                                        @if ($permission_sub_story->unlock_diamond == 0)
                                            <option value="0" selected>--- เลือก ---</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        @elseif ($permission_sub_story->unlock_diamond == 2)
                                            <option value="0">--- เลือก ---</option>
                                            <option value="2" selected>2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        @elseif ($permission_sub_story->unlock_diamond == 3)
                                            <option value="0">--- เลือก ---</option>
                                            <option value="2">2</option>
                                            <option value="3" selected>3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        @elseif ($permission_sub_story->unlock_diamond == 4)
                                            <option value="0">--- เลือก ---</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected>4</option>
                                            <option value="5">5</option>
                                        @else
                                            <option value="0">--- เลือก ---</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected>5</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <hr>
                        @endif

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;"><i class="fa fa-upload"></i> อัพโหลด</button>
                        </div>

                        <div class="form-group text-center">
                            <button type="button" id="btn_cancle" class="btn btn-danger" style="font-size: 18px; width: 20%;"><i class="fa fa-ban"></i> ยกเลิก</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {

            $('#summernote').summernote({
                height: 600
            });

            $('#summernote').on('summernote.change', function(we, contents, $editable) {
                $('#story_outline').val(contents);
                // console.log(contents);
            });

            $('#btn_cancle').on('click', function() {
                window.history.back();
            });
        });
    </script>

@endsection
