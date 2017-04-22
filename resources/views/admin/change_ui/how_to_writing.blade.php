@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span style="font-size: 18px;">วิธีการลงนิยาย</span>
                </div>
                <div class="panel-body">

                    <form action="{{ url('admin/change_ui/update/how_to_writing') }}" method="post">
                        {{ csrf_field() }}
                        <div id="summernote">{!! $how_to_writing->detail !!}</div>
                        <input type="hidden" name="how_to_writing" id="how_to_writing"
                               value="{{ $how_to_writing->detail }}">
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
                    $('#how_to_writing').val(contents);
                    // console.log(contents);
                });
            });
        </script>

@endsection
