@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="form-group text-center">
                <h2>นักเขียนระบบ Point</h2>
            </div>

            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="success">
                            <th>ลำดับที่</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>วันที่ลงทะเบียน</th>
                            <th>สถานะ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($lists as $list)
                                @php
                                    $member = \App\Member::find($list->member_id);
                                    $created_at = \Carbon\Carbon::parse($list->created_at)->addYears(543)->format("d / m / Y");
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->username }}</td>
                                    <td>{{ $created_at }}</td>
                                    <td>
                                        @if ($list->status_confirm == 1)
                                            <span style="color: green;">ยืนยันแล้ว</span>
                                        @else
                                            <span style="color: #ff6666;">ไม่ยืนยัน</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ url('admin/writer/'.$list->id) }}" style="text-decoration: none;"><button type="button" class="btn btn-primary" style="width: 100%; font-size: 16px;">รายละเอียด</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection
