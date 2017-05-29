@extends('layouts.user')
@section('content')
    @include('layouts.components.banner')
    @include('layouts.components.navbar')

    <div class="row" style="margin-top: 20px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <span style="font-size: 22px; color: green;">ยืนยันรายการปลดล็อก</span>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>ชื่อเรื่อง</td>
                                        <td>{{ $story->story_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>ชื่อตอน</td>
                                        <td>
                                            <span>{{ $subStory->story_name }}</span>
                                            <span class="pull-right" style="color: green;">
                                            {{ $permission->unlock_coin }} <i class="fa fa-usd"></i>&ensp;หรือ&ensp;
                                                {{ $permission->unlock_diamond }} <i class="fa fa-diamond"></i>
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>นักเขียน</td>
                                        <td>{{ $story->story_author }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="form-inline">
                                <div class="form-group" style="margin-right: 10px;">
                                    <button type="button" id="unlock-coin" class="btn btn-success"
                                            style="width: 100px; font-size: 16px;">
                                        {{ $permission->unlock_coin }} <i class="fa fa-usd"></i>
                                    </button>
                                </div>
                                <div class="form-group" style="margin-right: 10px;">
                                    <button type="button" id="unlock-diamond" class="btn btn-success"
                                            style="width: 100px; font-size: 16px;">
                                        {{ $permission->unlock_diamond }} <i class="fa fa-diamond"></i>
                                    </button>
                                </div>
                                <div class="form-group" style="margin-right: 10px;">
                                    <a href="#" id="redirect-back">
                                        <button type="button" class="btn btn-danger"
                                                style="width: 100px; font-size: 16px;">
                                            ยกเลิก
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#unlock-coin').on('click', function () {
                $.ajax({
                    url: '{{ url('user/unlock/'.$subStory->id) }}',
                    method: 'PUT',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'cash': '{{ $permission->unlock_coin }}'
                    },
                    success: function (data, status) {
                        console.log(data);
                        if (data == 'Update Success') {
                            window.location.href = '{{ url('user/read/story/detail/'.$subStory->id) }}';
                        } else {
                            swal({
                                    title: "",
                                    text: "<h4>จำนวนเหรียญของคุณไม่เพียงพอ</h4>" +
                                    "<h4>กรุณาเติมเหรียญ <i class='fa fa-usd'></i></h4>",
                                    html: true,
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: false
                                },
                                function () {
                                    window.location = "{{ url('/user/topup/form') }}";
                                })
                        }
                    }

                });
            });

            $('#redirect-back').on('click', function () {
                history.back();
            });
        });
    </script>

@endsection