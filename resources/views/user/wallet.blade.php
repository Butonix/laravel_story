@extends('layouts.user') @section('content') @include('layouts.components.banner') @include('layouts.components.navbar') @include('layouts.components.modal_login') @include('layouts.components.modal_register') @php $categorys = App\Category::all(); @endphp

<div class="row" style="margin-top: 20px;">
    <div class="col-md-12">

        <div class="form-group text-center">
            <span style="font-size: 28px;">ตารางแสดงรายได้ (บาท)</span>
        </div>
        <div class="form-group text-right">
            <span style="font-size: 20px; color: green;">เลขที่บัญชีธนาคาร {{ $info_writer->bank_account_number }}</span>
        </div>

        <div class="panel panel-default">
            {{--<div class="panel-heading text-center">--}}
                {{--<span style="font-size: 22px;">ตารางแสดงรายได้ (บาท)</span>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="active">
                                <th>รายการ</th>
                                <th>ยอดเงิน (บาท)</th>
                                <th>โบนัส (บาท)</th>
                                <th>ยอดเงินคงเหลือ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_bonus = 0;
                            @endphp
                            @foreach ($month as $key => $val)
                                @if ($val != null)
                                    @php
                                        $total_income = 0;
                                        foreach ($val as $item) {
                                            $total_income = $total_income + $item['income'];
                                        }
                                        $bonus = \App\Bonus::where('member_id', Auth::user()->id)->whereMonth('created_at', '=', $val[0]['month'])->get();
                                        foreach ($bonus as $fetch_bonus) {
                                            $total_bonus = $total_bonus + $fetch_bonus->money;
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            <span>เดือน {{ $key }} / {{ $val[0]['year'] }}</span>
                                        </td>
                                        <td>{{ number_format($total_income, 2) }}</td>
                                        <td>{{ number_format($total_bonus, 2) }}</td>
                                        <td>{{ (number_format($total_income, 2) + number_format($total_bonus, 2)) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            {{--</div>--}}
        </div>
    </div>
</div>

@endsection
