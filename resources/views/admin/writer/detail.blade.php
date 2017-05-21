@extends('layouts.admin')

@section('content')

    @php
        $member = \App\Member::find($info->member_id);
    @endphp

    <style>
        tr th {
            border: 0px !important;
            font-size: 18px !important;
        }
        tr td {
            border: 0px !important;
            font-size: 18px !important;
        }
        select {
            font-size: 16px !important;
        }
    </style>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <h2>รายละเอียด</h2>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">

                        <div class="form-group">
                            <table class="table" style="//border: 1px solid red;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">ชื่อผู้ใช้งาน :</td>
                                        <td class="text-left">{{ $member->username }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">ชื่อ-นามสกุล :</td>
                                        <td class="text-left">{{ $info->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">เลขบัตรประชาชน :</td>
                                        <td class="text-left">{{ $info->id_card }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">ที่อยู่ :</td>
                                        <td class="text-left">{{ $info->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">เบอร์ติดต่อ :</td>
                                        <td class="text-left">{{ $info->tel }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">ธนาคาร :</td>
                                        <td class="text-left">{{ $info->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">ธ.สาขา :</td>
                                        <td class="text-left">{{ $info->bank_sub_branch }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">ธ.เลขที่บัญชี :</td>
                                        <td class="text-left">{{ $info->bank_account_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="font-weight: bold;">ธ.ชื่อบัญชี :</td>
                                        <td class="text-left">{{ $info->bank_account_name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="from-group" style="padding-top: 20px;">
                            <span style="font-size: 18px; font-weight: bold;">สมุดบัญชีธนาคาร</span>
                        </div>
                        <div class="form-group">
                            <a class="image-popup-vertical-fit" href="{{ url('uploads/book_bank_files/'.$info->member_id) }}">
                                <img src="{{ url('uploads/book_bank_files/'.$info->member_id) }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="from-group">
                            <span style="font-size: 18px; font-weight: bold;">สำเนาบัตรประชาชน</span>
                        </div>
                        <div class="form-group">
                            <a class="image-popup-vertical-fit" href="{{ url('uploads/id_card_files/'.$info->member_id) }}">
                                <img src="{{ url('uploads/id_card_files/'.$info->member_id) }}" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" style="padding-top: 20px;">
                            <span style="font-size: 18px; font-weight: bold;">ผลการตรวจสอบ</span>
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ url('admin/writer/'.$info->id.'/edit') }}"><i class="fa fa-pencil"></i> แก้ไขข้อมูล</a>
                        </div>
                        <form method="POST" action="{{ url('admin/writer/'.$info->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select name="confirm_status" id="" class="form-control">
                                    <option value="1">อนุมัติ</option>
                                    <option value="0">ปฏิเสธ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 16px;">บันทึก</button>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('admin/writer') }}">
                                    <button type="button" class="btn btn-danger"
                                            style="width: 100%; font-size: 16px; background-color: #ff6666; border-color: #ff6666;">
                                        ยกเลิก
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-img-mobile',
                image: {
                    verticalFit: true
                }
            });
        });
    </script>

@endsection
