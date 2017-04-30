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
                    text: "<h4>คุณได้ลงทะเบียนนักเขียนระบบ Point เรียบร้อยแล้ว<br>" +
                    "หากต้องการแก้ไขข้อมูล&ensp;รบกวนส่งรายละเอียดที่ต้องการ<br>" +
                    "มาที่&ensp;:&ensp;support@janjaow.com<br>" +
                    "Facebook : Janjaow</h4>",
                    html: true,
                    confirmButtonText: "ปิดหน้าต่าง",
                },
                function() {
                    window.history.back();
                });
        </script>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div style="height: 600px;"></div>
        </div>


    </div>

@endsection
