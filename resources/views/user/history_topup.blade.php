@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    <div class="row" style="margin-top: 20px; padding-bottom: 125px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <span style="font-size: 28px;">ประวัติการเติมเหรียญ <i class="fa fa-usd"></i></span><br>
                <span style="font-size: 18px;">(รีเซ็ตข้อมูลทุก 14 วัน)</span>
            </div>
            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>วันที่ / เวลา</th>
                                <th>รายการ</th>
                                <th>จำนวนเหรียญ <i class="fa fa-usd"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getHistoryCashCard as $item)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->addYears(543)->format("d / m / Y H:i") }}</td>
                                    <td>True Money {{ $item->cashcard_no }}</td>
                                    <td>{{ $historyCashCard->formatAmount($item->amount) }} <i class="fa fa-usd"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection