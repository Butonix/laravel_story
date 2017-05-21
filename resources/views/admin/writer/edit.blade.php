@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-md-offset-3 col-md-6">

                        <div class="form-group text-center">
                            <h2>แก้ไขข้อมูล นักเขียนระบบ Point</h2>
                        </div>

                        <form action="{{ url('admin/writer/'.$info->id) }}" method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="col-md-12">

                                <div class="form-group">
                                    <span style="font-size: 20px;">ชื่อ-นามสกุล</span>
                                    <input type="text" name="full_name" value="{{ $info->full_name }}" class="form-control input-lg" placeholder="ชื่อ-นามสกุล">
                                </div>

                                <div class="form-group">
                                    <span style="font-size: 20px;">เลขบัตรประชน</span>
                                    <input type="text" name="id_card" value="{{ $info->id_card }}" class="form-control input-lg" placeholder="เลขบัตรประชน">
                                </div>

                                <div class="form-group">
                                    <span style="font-size: 20px;">ที่อยู่</span>
                                    <input type="text" name="address" value="{{ $info->address }}" class="form-control input-lg" placeholder="ที่อยู่">
                                </div>

                                <div class="form-group">
                                    <span style="font-size: 20px;">เบอร์ติดต่อ</span>
                                    <input type="text" name="tel" value="{{ $info->tel }}" class="form-control input-lg" placeholder="เบอร์ติดต่อ">
                                </div>

                                <div class="form-group">
                                    <span style="font-size: 20px;">ธนาคาร</span>
                                    <input type="text" name="bank_name" value="{{ $info->bank_name }}" class="form-control input-lg" placeholder="ธนาคาร">
                                </div>

                                <div class="form-group">
                                    <span style="font-size: 20px;">ธ.สาขา</span>
                                    <input type="text" name="bank_sub_branch" value="{{ $info->bank_sub_branch }}" class="form-control input-lg" placeholder="ธ.สาขา">
                                </div>

                                <div class="form-group">
                                    <span style="font-size: 20px;">ธ.เลขที่บัญชี</span>
                                    <input type="text" name="bank_account_number" value="{{ $info->bank_account_number }}" class="form-control input-lg" placeholder="ธ.เลขที่บัญชี">
                                </div>

                                <div class="form-group">
                                    <span style="font-size: 20px;">ธ.ชื่อบัญชี</span>
                                    <input type="text" name="bank_account_name" value="{{ $info->bank_account_name }}" class="form-control input-lg" placeholder="ธ.ชื่อบัญชี">
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
                                    <a href="{{ url('admin/writer/'.$info->id) }}">
                                        <button type="button" class="btn btn-danger"
                                                style="width: 100%; font-size: 16px; background-color: #ff6666; border-color: #ff6666;">
                                            ย้อนกลับ
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
