@extends('layouts.user') @section('content') @include('layouts.components.banner') @include('layouts.components.navbar') @include('layouts.components.modal_login') @include('layouts.components.modal_register') @php $categorys = App\Category::all(); @endphp

<div class="row" style="margin-top: 20px;">

    @if (session('status') == 'Story name not available.')
        <script type="text/javascript">
            swal({
                title: "",
                text: "<span style='font-size: 18px;'>ชื่อนิยายนี้มีผู้อื่นใช้แล้ว<br>กรุณาเปลื่ยนชื่ออีกครั้ง</span>",
                html: true
            })
        </script>
    @endif

    <form action="{{ url('user/write/story') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ชื่อเรื่อง</span></a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="text" name="story_name" class="form-control input-lg" placeholder="ชื่อเรื่อง ..." required>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- <div class="row" style="margin-top: 20px;"> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">นามปากกา</span></a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="text" name="story_author" class="form-control input-lg" placeholder="นามปากกา ..." required>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- <div class="row" style="margin-top: 20px;"> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">หมวดนิยาย</span></a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">

                    @foreach ($categorys as $category)
                    <div class="form-group">
                        <input type="radio" name="category_id" value="{{ $category->id }}" required>
                        &ensp;<span style="font-size: 16px;">{{ $category->category_name }}</span>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- <div class="row"> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <!-- <textarea name="story_detail" id="summernote" class="form-control" rows="8" cols="40" style="resize: none;"></textarea> -->
                        <div id="summernote"></div>
                        <input type="hidden" name="story_outline" id="story_outline">
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- <div class="row" style="margin-top: 20px;"> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">รูปภาพหน้าปก</span></a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="file" name="upload_picture" required>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- <div class="row" style="margin-top: 20px;"> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">Tag</span></a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-inline text-center">
                        <div class="form-group" style="margin-right: 10px;">
                            <input type="text" name="tag1" class="form-control" placeholder="tag 1">
                        </div>
                        <div class="form-group" style="margin-right: 10px;">
                            <input type="text" name="tag2" class="form-control" placeholder="tag 2">
                        </div>
                        <div class="form-group" style="margin-right: 10px;">
                            <input type="text" name="tag3" class="form-control" placeholder="tag 3">
                        </div>
                        <div class="form-group" style="margin-right: 10px;">
                            <input type="text" name="tag4" class="form-control" placeholder="tag 4">
                        </div>
                        <div class="form-group" style="margin-right: 10px;">
                            <input type="text" name="tag5" class="form-control" placeholder="tag 5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- <div class="row" style="margin-top: 20px;"> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
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

                    {{--@if ($count_sub_story >= 4)--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="checkbox" name="optionsRadios3" id="optionsRadios3" value="option1">--}}
                            {{--<span style="font-size: 16px;">เปิดรับเหรียญ</span>--}}
                        {{--</div>--}}

                        {{--<div class="form-inline">--}}
                            {{--<div class="form-group" style="margin-right: 10px;">--}}
                                {{--<label for="">--}}
                                    {{--<i class="fa fa-usd fa-lg"></i>--}}
                                {{--</label>--}}
                                {{--<select name="unlock_coin" id="" class="form-control">--}}
                                    {{--<option value="เลือก">--- เลือก ---</option>--}}
                                    {{--<option value="200">200</option>--}}
                                    {{--<option value="300">300</option>--}}
                                    {{--<option value="400">400</option>--}}
                                    {{--<option value="500">500</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="">--}}
                                    {{--<i class="fa fa-diamond fa-lg"></i>--}}
                                {{--</label>--}}
                                {{--<select name="unlock_diamond" id="" class="form-control">--}}
                                    {{--<option value="เลือก">--- เลือก ---</option>--}}
                                    {{--<option value="2">2</option>--}}
                                    {{--<option value="3">3</option>--}}
                                    {{--<option value="4">4</option>--}}
                                    {{--<option value="5">5</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                    {{--@endif--}}

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
            height: 600
        });
        $('#summernote').on('summernote.change', function(we, contents, $editable) {
            $('#story_outline').val(contents);
            // console.log(contents);
        });


    });
</script>

@endsection
