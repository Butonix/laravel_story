@extends('layouts.admin')

@section('content')

    @if (session('status') == 'success')
        <script type="text/javascript">
            swal({
                title: "",
                text: "<span style='font-size: 18px;'>เปลี่ยนรหัสผ่านสำเร็จ</span>",
                html: true
            })
        </script>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="{{ url('admin/update/password') }}" method="post">
                            {{ csrf_field() }}
                            <table class="table table-none-border">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td style="padding-top: 13px;"></td>
                                    <td><span style="font-size: 18px; color: blue;">เปลี่ยนรหัสผ่าน ผู้ดูแลระบบ</span></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 13px;">รหัสผ่านใหม่</td>
                                    <td><input type="password" class="form-control" name="password"></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 13px;">ยืนยันรหัสผ่าน</td>
                                    <td><input type="password" class="form-control" name="cf_password"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-success" value="Save" style="width: 100%;"></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
