@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    <div class="row" style="margin-top: 20px; padding-bottom: 150px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <span style="font-size: 28px;">ประวัติการปลดล็อก</span>
            </div>
            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="active">
                            <th>วันที่ / เวลา</th>
                            <th>ชื่อเรื่อง</th>
                            <th>ชื่อตอน</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($historyUnlock as $item)
                            @php
                                $sub_story = \App\SubStory::find($item->sub_story_id);
                                $story = \App\Story::find($sub_story->story_id);
                            @endphp
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->addYears(543)->format("d / m / Y H:i") }}</td>
                                <td><a href="{{ url('user/read/story/'.$story->id) }}">{{ $story->story_name }}</a></td>
                                <td><a href="{{ url('user/read/story/detail/'.$sub_story->id) }}">{{ $sub_story->story_name }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection