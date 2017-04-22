@extends('layouts.auth')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="{{ url('admin/auth') }}" method="post">
                            {{ csrf_field() }}
                            <table class="table table-none-border">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="padding-top: 13px;">Username</td>
                                    <td><input type="text" class="form-control" name="username" autofocus></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 13px;">Password</td>
                                    <td><input type="password" class="form-control" name="password"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-success" value="Login" style="width: 100%;">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
