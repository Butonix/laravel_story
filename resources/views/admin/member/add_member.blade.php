@extends('layouts.admin')

@section('content')

    <div class="row">

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

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/member/all') }}" style="margin-right: 10px;"><i
                                        class="fa fa-user"></i> สมาชิกทั้งหมด</a>
                            <a href="{{ url('admin/member/add') }}"><i class="fa fa-plus"></i> เพิ่มสมาชิก</a>
                        </div>
                    </div>

                    <div class="col-md-offset-4 col-md-4">
                        <form action="{{ url('admin/member/add') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="text" class="form-control" name="username"
                                               placeholder="ชื่อผู้ใช้งาน" value="{{ old('username') }}" required>
                                        <!-- <i class="fa fa-user"></i> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="email" class="form-control" name="email" placeholder="อีเมล"
                                               value="{{ old('email') }}" required>
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="password" class="form-control" name="password"
                                               placeholder="รหัสผ่าน" required>
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right"
                                            style="width: 100%; font-size: 16px;">เพิ่มสมาชิก
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
