@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="success">
                                    <th>ลำดับที่</th>
                                    <th>ชื่อนิยาย</th>
                                    <th>ยอดวิว</th>
                                    <th>นักเขียน</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($story_statistics as $story_statistic)

                                    @php
                                        $story = \App\Story::find($story_statistic->story_id);
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $story->story_name }}</td>
                                        <td>{{ $story_statistic->count_visitor }}</td>
                                        <td>{{ $story->story_author }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
