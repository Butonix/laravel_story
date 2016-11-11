@extends('layouts.admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr class="success">
                    <th>ลำดับที่</th>
                    <th><i class="fa fa-facebook"></i> ชื่อผู้ใช้งาน</th>
                    <th>อีเมล</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($facebooks as $facebook)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $facebook->full_name }}</td>
                      <td>{{ $facebook->email }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
