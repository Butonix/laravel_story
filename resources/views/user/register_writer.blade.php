@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    <div class="row">

        @if (session('status'))
            <script type="text/javascript">
                swal({
                    title: "",
                    text: "{{ session('status') }}",
                    html: true
                });
            </script>
        @endif

        <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 20px;">
            <div class="form-group">
                @if (count($errors) > 0)
                    <div class="alert alert-danger text-left">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <span style="font-size: 28px;">ลงทะเบียนนักเขียนระบบ Point</span><br>
                <span style="font-size: 20px;">(ข้อมูลนี้จะถูกจัดเก็บอย่างปลอดภัย)</span>
            </div>
        </div>

        <form action="{{ url('user/register/post/writer') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ชื่อ-นามสกุล (ภาษาไทย)</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="full_name" class="form-control input-lg" value="{{ old('full_name') }}"
                               placeholder=""
                               required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">เลขบัตรประจำตัวประชาชน</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="id_card" class="form-control input-lg" value="{{ old('id_card') }}"
                               maxlength="13" placeholder=""
                               required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ธนาคาร</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <select name="bank_name" id="" class="form-control input-lg" style="font-size: 18px;">
                            <option @if (old('bank_name') == 'กสิกรไทย') selected @endif value="กสิกรไทย">
                                ธ.กสิกรไทย
                            </option>
                            <option @if (old('bank_name') == 'ไทยพาณิชย์') selected @endif value="ไทยพาณิชย์">
                                ธ.ไทยพาณิชย์
                            </option>
                            <option @if (old('bank_name') == 'กรุงศรีอยุธยา') selected @endif value="กรุงศรีอยุธยา">
                                ธ.กรุงศรีอยุธยา
                            </option>
                            <option @if (old('bank_name') == 'กรุงไทย') selected @endif value="กรุงไทย">
                                ธ.กรุงไทย
                            </option>
                            <option @if (old('bank_name') == 'กรุงเทพ') selected @endif value="กรุงเทพ">
                                ธ.กรุงเทพ
                            </option>
                            <option @if (old('bank_name') == 'ทหารไทย') selected @endif value="ทหารไทย">
                                ธ.ทหารไทย
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">สาขาบัญชี</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="bank_sub_branch" class="form-control input-lg" value="{{ old('bank_sub_branch') }}" placeholder=""
                               required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">เลขที่บัญชี</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="bank_account_number" class="form-control input-lg" value="{{ old('bank_account_number') }}" placeholder=""
                               required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">ชื่อบัญชี</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="bank_account_name" class="form-control input-lg" value="{{ old('bank_account_name') }}" placeholder=""
                               required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">เบอร์โทรศัพท์ <span style="color: red;">* มีได้มากกว่า 1 เบอร์</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="tel" class="form-control input-lg" value="{{ old('tel') }}" placeholder=""
                               required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ที่อยู่ (เพื่อจัดส่งเอกสาร)</span></a>
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="text" name="address" class="form-control input-lg" value="{{ old('address') }}" placeholder=""
                               required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">รูปถ่ายหน้าสมุดบัญชี</span></a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="file" name="book_bank_file" required>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span
                                    style="font-size: 20px;">รูปถ่ายบัตรประชาชน / สำเนา</span></a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input type="file" name="id_card_file" required>
                    </div>
                </div>
            </div>

            <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px;">
                <div class="form-group text-center">
                    <button type="submit" id="btn_submit" class="btn btn-success"
                            style="font-size: 18px; width: 100%;">ยืนยัน
                    </button>
                </div>
            </div>

            <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px;">
                <div class="form-group text-center">
                    <button type="reset" class="btn btn-danger" style="font-size: 18px; width: 100%;">ยกเลิก
                    </button>
                </div>
            </div>

        </form>

    </div>

@endsection