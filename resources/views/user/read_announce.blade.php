@extends('layouts.user') @section('content') @include('layouts.components.banner') @include('layouts.components.navbar') @include('layouts.components.modal_login') @include('layouts.components.modal_register') @php $categorys = App\Category::all(); @endphp

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body text-center">
        <span style="font-size: 28px;">นิยายใหม่มาแล้ว {{ $announce->announce_title }}</span><br>
        <span style="font-size: 18px;">โดย ({{ $announce->username }}) {{ $announce->created_at }}</span>
        <div class="form-group" style="margin-top: 20px;">
          {!! $announce->announce_detail !!}
        </div>
        <div class="form-group" style="margin-top: 20px;">
          <button type="button" class="btn btn-danger" style="font-size: 18px;" disabled>
            ชอบ <i class="fa fa-exclamation fa-lg"></i>
            มอบ <i class="fa fa-heart fa-lg"></i> ให้เลย
         </button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <span style="font-size: 20px;">Comment / Review</span>
      </div>
      <div class="panel-body">
        <form action="{{ url('user/story/comment') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <div id="summernote"></div>
            <input type="hidden" name="comment" id="comment">
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;" disabled>Post</button>
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
            toolbar: [
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['fontsize', ['fontsize']],
              ['color', ['color']]
            ]
        });
        $('#summernote').on('summernote.change', function(we, contents, $editable) {
            $('#comment').val(contents);
            // console.log(contents);
        });

    });
</script>

@endsection
