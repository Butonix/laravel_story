@extends('layouts.user')

@section('content')

@include('layouts.components.banner')
@include('layouts.components.navbar')
@include('layouts.components.modal_login')
@include('layouts.components.modal_register')

<style>
  .table th, .table td {
    border-top: none !important;
    border-left: none !important;
    border-bottom: none !important;
  }
  .remove-border {
    border:0px;
  }
</style>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ผลการค้นหา</span></a></li>
    </ul>
    <div class="panel panel-default">
      <div class="panel-body" style="margin-top: 20px;">

        @foreach ($storys as $story)
          <div class="col-md-12">
            <div class="form-group">
              <div class="media-left media-middle">
                <a href="{{ url('user/read/story/'.$story->id) }}">
                  <img class="media-object" src="{{ url('uploads/images/storys/'.$story->story_picture) }}" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">ชื่อเรื่อง <span>{{ $story->story_name }}</span></h4>
                <span style="font-size: 16px;"><i class="fa fa-user"></i> {{ $story->story_author }}</span><br>
                <span style="font-size: 16px;">ยอดวิว <span>{{ $story->visit }}</span></span>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</div>

@endsection
