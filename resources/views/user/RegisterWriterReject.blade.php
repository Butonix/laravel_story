@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    <div class="row" style="margin-top: 20px;">

        <script type="text/javascript">
            swal({
                    title: "<h3>ลงทะเบียนนักเขียนระบบ Point</h3><h4>(ข้อมูลนี้จะถูกจัดเก็บอย่างปลอดภัย)</h4>",
                    text: "<h4>การลงทะเบียนของคุณผิดพลาด !<br><br>" +
                    "โปรดตรวจสอบข้อมูลใหม่อีกครั้ง</h4>",
                    html: true,
                    confirmButtonText: "ตกลง",
                },
                function() {
                    window.location = "{{ url('user/register/writer') }}";
                });
        </script>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div style="height: 600px;"></div>
        </div>


    </div>

@endsection
