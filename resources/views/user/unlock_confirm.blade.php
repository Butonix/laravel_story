@extends('layouts.user')
@section('content')
    @include('layouts.components.banner')
    @include('layouts.components.navbar')

    <div class="row" style="margin-top: 20px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <span style="font-size: 22px; color: green;">ยืนยันรายการปลดล็อก</span>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>ชื่อเรื่อง</td>
                                        <td>{{ $story->story_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>ชื่อตอน</td>
                                        <td>
                                            <span class="pull-left">{{ $subStory->story_name }}</span>
                                            <span class="pull-right" style="color: green;">
                                            {{ $permission->unlock_coin }} <i class="fa fa-usd"></i>&ensp;หรือ&ensp;
                                                {{ $permission->unlock_diamond }} <i class="fa fa-diamond"></i>
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>นักเขียน</td>
                                        <td>{{ $story->story_author }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="form-inline">
                                <div class="form-group" style="margin-right: 10px;">
                                    <button type="button" class="btn btn-success" style="width: 100px; font-size: 16px;">
                                        {{ $permission->unlock_coin }} <i class="fa fa-usd"></i>
                                    </button>
                                </div>
                                <div class="form-group" style="margin-right: 10px;">
                                    <button type="button" class="btn btn-success" style="width: 100px; font-size: 16px;">
                                        {{ $permission->unlock_diamond }} <i class="fa fa-diamond"></i>
                                    </button>
                                </div>
                                <div class="form-group" style="margin-right: 10px;">
                                    <a href="#">
                                        <button type="button" class="btn btn-danger" style="width: 100px; font-size: 16px;">
                                            ยกเลิก
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection