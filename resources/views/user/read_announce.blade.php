@extends('layouts.user') @section('content') @include('layouts.components.banner') @include('layouts.components.navbar') @include('layouts.components.modal_login') @include('layouts.components.modal_register') @php $categorys = App\Category::all(); @endphp

<div class="row" style="margin-top: 20px;">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <span style="font-size: 28px;">{{ $announce->announce_title }}</span><br>
                <span style="font-size: 18px; color: #abc;">โดย {{ $member->username }}
                    @php
                        $created_at = \Carbon\Carbon::parse($announce->created_at)->addYears(543)->format("d / m / Y");
                        echo '<small>'.$created_at.'</small>';
                    @endphp
                </span>
                <div class="form-group" style="margin-top: 20px;">
                    {!! $announce->announce_detail !!}
                </div>
                {{--<div class="form-group" style="margin-top: 20px;">--}}
                    {{--<button type="button" class="btn btn-danger" style="font-size: 18px;" disabled>--}}
                        {{--ชอบ <i class="fa fa-exclamation fa-lg"></i>--}}
                        {{--มอบ <i class="fa fa-heart fa-lg"></i> ให้เลย--}}
                    {{--</button>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>

@if ($announce->status_comment == 1)
    <div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0;">
        <div class="form-group">
            <span style="font-size: 22px;">ความคิดเห็น / รีวิว</span>
        </div>
        <div class="form-group">
{{--            <form action="{{ url('user/comment/story/'.$announce->id) }}" method="post">--}}
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="comment_detail" id="" class="form-control summernote" style="resize: none;" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success" style="font-size: 18px; width: 20%;">บันทึก
                    </button>
                </div>
            {{--</form>--}}
        </div>
    </div>
@endif

<script>
    $(document).ready(function () {

        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']]
            ]
        });

    });
</script>

@endsection
