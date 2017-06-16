@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')
    @include('layouts.components.carousel_only')

    <div class="row" style="margin-top: 20px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <span style="font-size: 22px;">{{ $category_name }}</span>
                </div>
                <div class="body" style="//background-color: #ffffe6;">
                    <div class="media" style="margin-top: 20px;">

                        @foreach ($storys as $story)
                            @if ($story->status_public == 1)
                                <div class="col-xs-12 col-sm-12 col-md-4" style="margin-top: 20px;">
                                    <div class="col-xs-12 col-sm-12 col-md-5 text-center">
                                        <div class="form-group">
                                            <a href="{{ url('user/read/story/'.$story->id) }}">
                                                {{--<img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" style="width: 250px; height: 350px; border-radius: 4px;">--}}
                                                <img src="{{ url('uploads/images/storys/'.$story->story_picture) }}" style="width: 120px; height: 120px; border-radius: 4px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7 text-left">
                                        <div class="form-group">
                                            <h4>ชื่อเรื่อง <span>{{ $story->story_name }}</span>
                                            </h4>
                                            <span style="font-size: 16px;"><i class="fa fa-user"></i> {{ $story->story_author }}</span><br>
                                            <span style="font-size: 16px;">ยอดวิว {{ $story->count_visitor }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
