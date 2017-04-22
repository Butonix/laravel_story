@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.modal_login')
    @include('layouts.components.modal_register')

    @php
        if ($profile->author != null) {
            $author = $profile->author;
        } else {
            $author = old('author');
        }
    @endphp

    <div class="row" style="margin-top: 20px;">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <span style="font-size: 24px; font-weight: bold;">Account Janjaow</span>
            </div>
            <div class="form-group">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <form action="{{ url('user/update/profile') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">ชื่อ / นามปากกา</span></a>
                        </li>
                    </ul>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <input type="text" name="author" class="form-control input-lg" value="{{ $author }}"
                                   placeholder="" minlength="4" maxlength="50">
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">E-mail</span></a>
                        </li>
                    </ul>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <input type="text" name="email" class="form-control input-lg" value="{{ $profile->email }}"
                                   placeholder="" required>
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#"><span
                                        style="font-size: 20px;">Password</span></a></li>
                    </ul>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <input type="password" name="password" class="form-control input-lg" placeholder=""
                                   minlength="4">
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#"><span style="font-size: 20px;">Confirm Password</span></a>
                        </li>
                    </ul>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <input type="password" name="password_confirmation" class="form-control input-lg"
                                   placeholder="" minlength="4">
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#"><span
                                        style="font-size: 20px;">รูปภาพโปรไฟล์</span></a></li>
                    </ul>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <input type="file" name="profile_image">
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px; margin-top: 20px;">
                                <div class="form-group text-center">
                                    <button type="submit" id="btn_submit" class="btn btn-success"
                                            style="font-size: 18px; width: 100%;">ยืนยัน
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-offset-5 col-md-2" style="padding: 0px 0px 0px 0px;">
                                <div class="form-group text-center">
                                    <a href="{{ url('user/profile/') }}">
                                        <button type="button" class="btn btn-danger"
                                                style="font-size: 18px; width: 100%;">ยกเลิก
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection