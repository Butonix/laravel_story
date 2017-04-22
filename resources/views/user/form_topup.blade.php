@extends('layouts.user') @section('content') @include('layouts.components.banner') @include('layouts.components.navbar') @include('layouts.components.modal_login') @include('layouts.components.modal_register')

<div class="row" style="margin-top: 20px;">

    @if (session('status_truemoney') == 190035)
        <script type="text/javascript">
            swal("", "รหัสบัตร truemoney ต้องเป็นเลข 14 หลัก", "error")
        </script>
    @endif

    @if (session('status_truemoney') == 800005)
        <script type="text/javascript">
            swal("", "รหัสบัตร truemoney ไม่ถูกต้อง", "error")
        </script>
    @endif

    @if (session('status_truemoney') == 800017)
        <script type="text/javascript">
            swal("", "รหัสบัตร truemoney ถูกใช้งานแล้ว", "error")
        </script>
    @endif

    @if (session('status_truemoney') == 800018)
        <script type="text/javascript">
            swal("", "กรุณาใส่รหัสบัตร truemoney อีกครั้ง", "error")
        </script>
    @endif

    @if (session('status_truemoney') == 800019)
        <script type="text/javascript">
            swal("", "รหัสบัตร truemoney ถูกระงับชั่วคราว กรุณาติดต่อ Call Center", "error")
        </script>
    @endif

    @if (session('status_truemoney') == 800201)
        <script type="text/javascript">
            swal("", "กรุณาตรวจสอบรหัสบัตร truemoney อีกครั้ง", "error")
        </script>
    @endif

    @if (session('status_truemoney') == 800220)
        <script type="text/javascript">
            swal("", "รหัสบัตร truemoney ไม่สามารถใช้เติมเงินได้ กรุณาติดต่อ Call Center", "error")
        </script>
    @endif

    @if (session('status_truemoney') == 810000)
        <script type="text/javascript">
            swal({
                title: "",
                text: "ระบบระงับการเติมเงินของท่าน 1 ชั่วโมง<br>เนื่องจากความพยายามเติมเงินผิดติดต่อกัน 5 ครั้ง",
                html: true
            });
        </script>
    @endif

    <div class="col-md-12" style="//margin-bottom: 250px;">
        <div class="panel panel-default">
            <div class="panel-body" style="text-align: center;">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="warning">
                            <th style="font-size: 18px;">จำนวนเหรียญที่ได้รับ</th>
                            <th style="font-size: 18px;">ราคาบัตร true money</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="font-size: 18px;">5,400 <i class="fa fa-usd"></i></td>
                            <td style="font-size: 18px;">50 บาท</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">9,800 <i class="fa fa-usd"></i></td>
                            <td style="font-size: 18px;">90 บาท</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">16,400 <i class="fa fa-usd"></i></td>
                            <td style="font-size: 18px;">150 บาท</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">33,000 <i class="fa fa-usd"></i></td>
                            <td style="font-size: 18px;">300 บาท</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">55,200 <i class="fa fa-usd"></i></td>
                            <td style="font-size: 18px;">500 บาท</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px;">111,000 <i class="fa fa-usd"></i></td>
                            <td style="font-size: 18px;">1,000 บาท</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-4 col-md-offset-4">

                    <form action="{{ url('user/topup/form') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <span style="font-size: 20px;">กรอกรหัสบัตร true money 14 หลัก</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="TM_CODE" maxlength="14">
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submit_topup" class="btn btn-success" style="font-size: 18px;">
                                เติมเหรียญ <i class="fa fa-usd"></i></button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#submit_topup').on('click', function () {
            swal({
                title: "",
                text: "กรุณารอสักครู่ ระบบกำลังประมวลผล<br><span style='color: red;'>คำเตือน ห้ามปิดหน้านี้ในขณะกำลังประมวลผล</span>",
                html: true
            });
        });
    });
</script>

@endsection
