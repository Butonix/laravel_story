@extends('layouts.admin')

@section('content')

  <div class="row">

    @if (session('status_category'))
      <script type="text/javascript">
        swal("", "ชื่อหมวดหมู่นี้มีในระบบแล้ว", "error")
      </script>
    @endif

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">

          <div class="col-md-12">
            <div class="form-group">
              <a href="{{ url('admin/category/all') }}" style="margin-right: 10px;"><i class="fa fa-book"></i> หมวดหมู่ทั้งหมด</a>
              <a href="{{ url('admin/category/add') }}"><i class="fa fa-plus"></i> เพิ่มหมวดหมู่</a>
            </div>
          </div>

          <div class="col-md-offset-4 col-md-4">
            <form action="{{ url('admin/category/edit') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="category_id" value="{{ $category->id }}">

              <div class="col-md-12">
                <div class="form-group">
                  <div class="icon-addon addon-lg">
                      <input type="text" class="form-control" name="category_name" placeholder="ชื่อหมวดหมู่" value="{{ $category->category_name }}" required>
                      <!-- <i class="fa fa-user"></i> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">

                      @if ($category->status_alert == 1)
                        <input type="checkbox" name="status_alert" value="1" class="form-check-input" checked>
                      @else
                        <input type="checkbox" name="status_alert" value="1" class="form-check-input">
                      @endif

                      <span style="color: red;">แสดงแจ้งเตือนใช้วิจารณญาณในการอ่าน</span>
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary pull-right" style="width: 100%; font-size: 16px;">แก้ไขหมวดหมู่  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
