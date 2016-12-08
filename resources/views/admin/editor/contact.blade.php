@extends('layouts.admin')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span style="font-size: 18px;">หน้าติดต่อ</span>
        </div>
        <div class="panel-body">

          <form action="{{ url('admin/editor/contact') }}" method="post">
            {{ csrf_field() }}
            <div id="summernote">{!! $contact->detail !!}</div>
            <input type="hidden" name="detail" id="detail">

            <div class="form-group text-right">
              <button type="submit" class="btn btn-success" style="font-size: 18px; width: 150px;">บันทึก</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script>
      $(document).ready(function() {
          $('#summernote').summernote({
              height: 300,

          });
          $('#summernote').on('summernote.change', function(we, contents, $editable) {
              $('#detail').val(contents);
              // console.log(contents);
          });
      });
  </script>

@endsection
