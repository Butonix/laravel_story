@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span style="font-size: 18px;">รายละเอียดแบนเนอร์</span>
                </div>
                <div class="panel-body">

                    <form action="{{ url('admin/change_ui/update/banner') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group"><span style="font-size: 18px;">แบนเนอร์ 1</span></div>
                        <div id="summernote_1">{!! $banner_1->banner_detail !!}</div>
                        <input type="hidden" name="banner_detail_1" id="banner_detail_1"
                               value="{{ $banner_1->banner_detail }}">
                        <div class="form-group"><span style="font-size: 18px;">แบนเนอร์ 2</span></div>
                        <div id="summernote_2">{!! $banner_2->banner_detail !!}</div>
                        <input type="hidden" name="banner_detail_2" id="banner_detail_2"
                               value="{{ $banner_2->banner_detail }}">
                        <div class="form-group"><span style="font-size: 18px;">แบนเนอร์ 3</span></div>
                        <div id="summernote_3">{!! $banner_3->banner_detail !!}</div>
                        <input type="hidden" name="banner_detail_3" id="banner_detail_3"
                               value="{{ $banner_3->banner_detail }}">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success" style="font-size: 18px; width: 150px;">
                                บันทึก
                            </button>
                        </div>
                    </form>

                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#summernote_1').summernote({
                    height: 300,

                });
                $('#summernote_1').on('summernote.change', function (we, contents, $editable) {
                    $('#banner_detail_1').val(contents);
                    // console.log(contents);
                });

                $('#summernote_2').summernote({
                    height: 300,

                });
                $('#summernote_2').on('summernote.change', function (we, contents, $editable) {
                    $('#banner_detail_2').val(contents);
                    // console.log(contents);
                });

                $('#summernote_3').summernote({
                    height: 300,

                });
                $('#summernote_3').on('summernote.change', function (we, contents, $editable) {
                    $('#banner_detail_3').val(contents);
                    // console.log(contents);
                });
            });
        </script>

@endsection
