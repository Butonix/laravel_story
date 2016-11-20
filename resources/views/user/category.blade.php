@extends('layouts.user')

@section('content')

@include('layouts.components.banner')
@include('layouts.components.navbar')
@include('layouts.components.modal_login')
@include('layouts.components.modal_register')

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading text-left">
        <span style="font-size: 22px;">{{ $category_name }}</span>
      </div>
      <div class="body" style="//background-color: #ffffe6;">
        <div class="media">

          <div class="col-md-12" style="margin-top: 20px;">
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="{{ url('images/icons/default_book.png') }}" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="{{ url('images/icons/default_book.png') }}" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="media-left media-middle">
                  <a href="#">
                    <img class="media-object" src="{{ url('images/icons/default_book.png') }}" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ชื่อเรื่อง...</h4>
                  <span>ตอน...</span><br>
                  <i class="fa fa-user"></i> admin<br>
                  <span>ยอดวิว 10 k</span>
                  <!-- <span><i class="fa fa-comment-o"></i> 1</span><br>
                  <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center" style="margin-bottom: 20px;">
                <hr>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default"><i class="fa fa-angle-left"></i></button>
                    <button type="button" class="btn btn-default">1</button>
                    <button type="button" class="btn btn-default">2</button>
                    <button type="button" class="btn btn-default">3</button>
                    <button type="button" class="btn btn-default">4</button>
                    <button type="button" class="btn btn-default">5</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-angle-right"></i></button>
                    <button type="button" class="btn btn-default"><i class="fa fa-angle-double-right"></i></button>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
