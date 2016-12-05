@extends('layouts.user') @section('content') @include('layouts.components.banner') @include('layouts.components.navbar') @include('layouts.components.modal_login') @include('layouts.components.modal_register')

<div class="row" style="margin-top: 20px;">
  <div class="col-md-12" style="margin-bottom: 250px;">
    <div class="panel panel-primary">
      <div class="panel-heading" style="text-align: center;">
        <span style="font-size: 22px;">เติมเหรียญ <i class="fa fa-usd"></i></span>
      </div>
      <div class="panel-body" style="text-align: center;">
        <div class="form-group" style="margin-top: 20px;">
          <a href="{{ url('user/topup/form') }}"><span style="font-size: 20px;">บัตรเงินสด true money <i class="fa fa-angle-right"></i></span></a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
