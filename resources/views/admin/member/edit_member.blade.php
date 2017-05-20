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

                    <div class="col-md-offset-4 col-md-4">

                        <div class="form-group text-center">
                            <h2>แก้ไขข้อมูล</h2>
                        </div>

                        <form action="{{ url('admin/member/edit/'.$info->id) }}" method="post">

                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="text" class="form-control" name="username"
                                               placeholder="ชื่อผู้ใช้งาน" value="{{ $info->username }}" >
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="email" class="form-control" name="email" placeholder="อีเมล"
                                               value="{{ $info->email }}" >
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="text" class="form-control" name="author" placeholder="นามนักเขียน"
                                               value="{{ $info->author }}" >
                                        <i class="fa fa-edit"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span style="color: red;">* หากไม่ต้องการเปลี่ยนรหัสผ่านให้ปล่อยว่าง</span>
                                </div>

                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="password" class="form-control" name="password" value=""
                                               placeholder="รหัสผ่าน">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <input type="password" class="form-control" name="password_confirmation" value=""
                                               placeholder="ยืนยันรหัสผ่าน">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"
                                            style="width: 100%; font-size: 16px;">บันทึก
                                    </button>
                                </div>
                                <div class="form-group">
                                    <a href="{{ url('admin/member/all') }}">
                                        <button type="button" class="btn btn-danger"
                                                style="width: 100%; font-size: 16px; background-color: #ff6666; border-color: #ff6666;">
                                            ยกเลิก
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>

                    @if (count($errors))
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li><small>{{ $error }}</small></li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
