@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.carousel_only')

    @if (session('status') == 'success')
        <script type="text/javascript">
            swal({
                title: "",
                text: "<span style='font-size: 18px;'>เรียบร้อย<br>โปรดตรวจสอบ E-mail ของคุณ</span>",
                html: true
            });
        </script>
    @endif

    @if (session('status') == 'error')
        <script type="text/javascript">
            swal({
                title: "",
                text: "<span style='font-size: 18px;'>ผิดพลาด !<br>กรุณาตรวจสอบใหม่อีกครั้ง</span>",
                html: true
            });
        </script>
    @endif

    <div class="row" style="margin-top: 20px;">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span style="font-size: 22px;">ลืมรหัสผ่าน</span>
                </div>
                <div class="panel-body" style="//background-color: red;">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="{{ url('forgot_password') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <span style="font-size: 18px; color: red;">* กรุณากรอก E-mail</span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="width: 100%; font-size: 18px;">ส่งรหัสผ่าน</button>
                            </div>
                            <div class="form-group">
                                <span style="font-size: 18px; color: blue;">ทางระบบจะส่งรหัสผ่านไปยัง E-mail ของคุณ</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end row -->

@endsection
