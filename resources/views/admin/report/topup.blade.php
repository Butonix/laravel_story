@extends('layouts.admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">

          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                    <tr class="success">
                      <th>ลำดับที่</th>
                      <th>ชื่อผู้ใช้งาน</th>
                      <th>ยอดเติม (บาท)</th>
                      <th>รวมรายได้</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $real_amount = 0;
                    @endphp
                    @foreach ($history_cashcard as $data)
                      @php
                        if ($data->amount == '5000') {
                            $display_money = 50;
                            $real_amount = $real_amount + 50;
                        } else if ($data->amount == '9000') {
                            $display_money = 90;
                            $real_amount = $real_amount + 90;
                        } else if ($data->amount == '15000') {
                            $display_money = 150;
                            $real_amount = $real_amount + 150;
                        } else if ($data->amount == '30000') {
                            $display_money = 300;
                            $real_amount = $real_amount + 300;
                        } else if ($data->amount == '50000') {
                            $display_money = 500;
                            $real_amount = $real_amount + 500;
                        } else if ($data->amount == '100000') {
                            $display_money = 1000;
                            $real_amount = $real_amount + 1000;
                        }
                      @endphp
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $display_money }}</td>
                        <td>{{ $real_amount }}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
