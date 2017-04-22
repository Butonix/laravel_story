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
                                    <th>IP Address</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($report_visits as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->ip_address }}</td>
                                        <td>{{ $data->created_at }}</td>
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
