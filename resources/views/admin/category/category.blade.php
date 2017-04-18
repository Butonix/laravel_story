@extends('layouts.admin')

@section('content')

  <div class="row">

    @if (session('status_category'))
      <script type="text/javascript">
        swal("", "เพิ่มหมวดหมู่สำเร็จ", "success")
      </script>
    @endif

    @if (session('status_edit_category'))
      <script type="text/javascript">
        swal("", "แก้ไขหมวดหมู่สำเร็จ", "success")
      </script>
    @endif

    @if (session('status_delete_category'))
      <script type="text/javascript">
        swal("", "ลบหมวดหมู่สำเร็จ", "success")
      </script>
    @endif

    {{--<div class="col-md-12">--}}
      {{--<div class="panel panel-default">--}}
        {{--<div class="panel-body">--}}

          <div class="col-md-12">
            <div class="form-group">
              <a href="{{ url('admin/category/all') }}" style="margin-right: 10px; color: green;"><i class="fa fa-book"></i> หมวดหมู่ทั้งหมด</a>
              <a href="{{ url('admin/category/add') }}" style="color: green;"><i class="fa fa-plus"></i> เพิ่มหมวดหมู่</a>
            </div>
          </div>

          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                    <tr class="success">
                      <th>ลำดับที่</th>
                      <th>ชื่อหมวดหมู่</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categorys as $category)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td><a href="{{ url('admin/category/edit/'.$category->id) }}"><i class="fa fa-pencil"></i> แก้ไข</a></td>
                        <td><a href="{{ url('admin/category/delete/'.$category->id) }}" style="color: red;"><i class="fa fa-trash-o"></i> ลบ</a></td>
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
