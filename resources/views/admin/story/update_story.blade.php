@extends('layouts.admin')

@section('content')

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

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <span style="font-size: 26px;">แก้ไขเนื้อหา {{ $story->story_name }}</span>
        </div>

        <form action="{{ url('admin/story/update/'.$story->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ชื่อเรื่อง</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="story_name" class="form-control input-lg" placeholder="ชื่อเรื่อง ..."
                               value="{{ $story->story_name }}" required>
                    </div>
                </div>
            </div>
            <!-- </div> -->

            <!-- <div class="row" style="margin-top: 20px;"> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">นามปากกา</span></a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="story_author" class="form-control input-lg" placeholder="นามปากกา ..."
                               value="{{ $story->story_author }}" required>
                    </div>
                </div>
            </div>
            <!-- </div> -->

            <!-- <div class="row" style="margin-top: 20px;"> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">หมวดนิยาย</span></a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">

                        @foreach ($categorys as $category)
                            <div class="form-group">

                                @if ($category->id == $story->category_id)
                                    <input type="radio" name="category_id" value="{{ $category->id }}" checked required>
                                @else
                                    <input type="radio" name="category_id" value="{{ $category->id }}" required>
                                    @endif
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
                            <div id="summernote">{!! $story->story_outline !!}</div>
                            <input type="hidden" name="story_outline" id="story_outline"
                                   value="{{ $story->story_outline }}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->

            <!-- <div class="row" style="margin-top: 20px;"> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">รูปภาพหน้าปก</span></a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group text-center">
                            <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" alt="">
                        </div>
                        <input type="file" name="upload_picture">
                    </div>
                </div>
            </div>
            <!-- </div> -->

            <!-- <div class="row" style="margin-top: 20px;"> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">Tag</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-inline text-center">

                            @if ($tag->tag1 != NULL)
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag1" class="form-control" placeholder="tag 1"
                                           value="{{ $tag->tag1 }}">
                                </div>
                            @else
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag1" class="form-control" placeholder="tag 1">
                                </div>
                            @endif

                            @if ($tag->tag2 != NULL)
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag2" class="form-control" placeholder="tag 2"
                                           value="{{ $tag->tag2 }}">
                                </div>
                            @else
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag2" class="form-control" placeholder="tag 2">
                                </div>
                            @endif

                            @if ($tag->tag3 != NULL)
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag3" class="form-control" placeholder="tag 3"
                                           value="{{ $tag->tag3 }}">
                                </div>
                            @else
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag3" class="form-control" placeholder="tag 3">
                                </div>
                            @endif

                            @if ($tag->tag4 != NULL)
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag4" class="form-control" placeholder="tag 4"
                                           value="{{ $tag->tag4 }}">
                                </div>
                            @else
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag4" class="form-control" placeholder="tag 4">
                                </div>
                            @endif

                            @if ($tag->tag5 != NULL)
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag5" class="form-control" placeholder="tag 5"
                                           value="{{ $tag->tag5 }}">
                                </div>
                            @else
                                <div class="form-group" style="margin-right: 10px;">
                                    <input type="text" name="tag5" class="form-control" placeholder="tag 5">
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->

            <!-- <div class="row" style="margin-top: 20px;"> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @if ($story->status_comment == 1)
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

                        @if ($story->status_public == 1)
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

                        <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px;">
                            <div class="form-group text-center">
                                <button type="submit" id="btn_submit" class="btn btn-success"
                                        style="font-size: 18px; width: 100%;"><i class="fa fa-upload"></i> อัพโหลด
                                </button>
                            </div>
                        </div>

                        <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px;">
                            <div class="form-group text-center">
                                <a href="{{ url('admin/story/all') }}">
                                    <button type="button" class="btn btn-danger" style="font-size: 18px; width: 100%;">
                                        <i class="fa fa-ban"></i> ยกเลิก
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- </div> -->
        </form>
    </div>

    <script>
        $(document).ready(function () {

            $('#summernote').summernote({
                height: 600
            });
            $('#summernote').on('summernote.change', function (we, contents, $editable) {
                $('#story_outline').val(contents);
                // console.log(contents);
            });


        });
    </script>

@endsection
