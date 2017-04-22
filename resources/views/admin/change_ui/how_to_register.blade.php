@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span style="font-size: 18px;">วิธีการสมัครสมาชิก</span>
                </div>
                <div class="panel-body">

                    <form action="{{ url('admin/change_ui/update/how_to_register') }}" method="post">
                        {{ csrf_field() }}
                        <div id="summernote">{!! $how_to_register->detail !!}</div>
                        <input type="hidden" name="how_to_register" id="how_to_register"
                               value="{{ $how_to_register->detail }}">
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
                $('#summernote').summernote({
                    height: 300,

                });
                $('#summernote').on('summernote.change', function (we, contents, $editable) {
                    $('#how_to_register').val(contents);
                    // console.log(contents);
                });
            });
        </script>

@endsection
