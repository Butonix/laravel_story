@extends('layouts.admin')

@section('content')

  <div class="row">

    @if (session('status_register'))
      <script type="text/javascript">
        swal("", "สมัครสมาชิกสำเร็จ", "success")
      </script>
    @endif

    @if (session('status_edit'))
      <script type="text/javascript">
        swal("", "แก้ไขสมาชิกสำเร็จ", "success")
      </script>
    @endif

    @if (session('status_delete'))
      <script type="text/javascript">
        swal("", "ลบสมาชิกสำเร็จ", "success")
      </script>
    @endif

    {{--<div class="col-md-12">--}}
      {{--<div class="panel panel-default">--}}
        {{--<div class="panel-body">--}}

          <div class="col-md-12">
            <div class="form-group">
              <a href="{{ url('admin/member/all') }}" style="margin-right: 10px; color: green;"><i class="fa fa-user"></i> สมาชิกทั้งหมด</a>
              <a href="{{ url('admin/member/add') }}" style="color: green;"><i class="fa fa-plus"></i> เพิ่มสมาชิก</a>
            </div>
          </div>

          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                    <tr class="success">
                      <th>ลำดับที่</th>
                      <th>ชื่อผู้ใช้งาน</th>
                      <th>อีเมล</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($members as $member)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->username }}</td>
                        <td>{{ $member->email }}</td>
                        <td><a href="{{ url('admin/member/edit/'.$member->id) }}"><i class="fa fa-pencil"></i> แก้ไข</a></td>
                        <td><a href="{{ url('admin/member/delete/'.$member->id) }}" style="color: red;"><i class="fa fa-trash-o"></i> ลบ</a></td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>

        </div>
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}

@endsection
