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
                        <th>ชื่อนิยาย</th>
                        <th>เขียนโดย</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($storys as $data)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">{{ $loop->iteration }}</td>
                            <td class="text-center" style="vertical-align: middle;">{{ $data->story_name }}</td>
                            <td class="text-center" style="vertical-align: middle;">{{ $data->username }}</td>
                            <td class="text-center" style="vertical-align: middle;">
                                <a onclick="fb('{{ url('user/read/story/'.$data->id) }}')" style="cursor:poiter">
                                    <button type="button" class="btn btn-primary" style="font-size: 18px;"><i
                                                class="fa fa-facebook"></i> แชร์ผลงาน
                                    </button>
                                </a>
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
