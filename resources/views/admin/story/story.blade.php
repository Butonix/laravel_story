@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col-md-12">
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}

            {{--<div class="col-md-12">--}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="success">
                        <th>ลำดับที่</th>
                        <th>ตอนหลัก</th>
                        <th>เขียนโดย</th>
                        <th>สถานะแบน</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($storys as $story)
                        @php
                            $status_ban = \App\BanStory::where('story_id', $story->id)->first();
                            $getStoryUsername = \App\Member::find($story->member_id);
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $story->story_name }}</td>
                            <td>{{ $getStoryUsername->username }}</td>


                            @if ($status_ban->status_ban == 0)
                                <td style="color: green;">ปกติ</td>
                            @else
                                <td style="color: red;">ถูกแบน</td>
                            @endif

                            <td><a href="{{ url('admin/story/update/'.$story->id) }}"><i class="fa fa-pencil"></i>
                                    แก้ไขเนื้อหา</a></td>
                            <td>
                                <form id="form_ban" action="{{ url('admin/story/ban/'.$story->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <a href="#" style="color: red;"
                                       onclick="document.getElementById('form_ban').submit()"><i class="fa fa-ban"></i>
                                        แบนเนื้อหา</a>
                                </form>
                                <form id="form_unban" action="{{ url('admin/story/unban/'.$story->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <a href="#" style="color: green;"
                                       onclick="document.getElementById('form_unban').submit()"><i
                                                class="fa fa-ban"></i> ปลดแบน</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

@endsection
