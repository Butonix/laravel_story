@extends('layouts.user')

@section('content')

    @include('layouts.components.banner')
    @include('layouts.components.navbar')
    @include('layouts.components.carousel_only')

    <div class="row" style="margin-top: 20px;">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span style="font-size: 22px;"><!-- <i class="fa fa-newspaper-o fa-2x"></i> --> ติดต่อเรา</span>
                </div>
                <div class="panel-body" style="//background-color: red;">

                    {!! $contact !!}

                </div>
            </div>
        </div>

    </div> <!-- end row -->

@endsection
