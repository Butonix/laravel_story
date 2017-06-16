<form action="{{ url('user/auth/register') }}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <span class="modal-title" id="myModalLabel" style="font-size: 22px;">ลงทะเบียนสมาชิกใหม่</span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="icon-addon addon-lg">
                            <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้งาน"
                                   value="{{ old('username') }}" maxlength="15" required>
                            <!-- <i class="fa fa-user"></i> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="icon-addon addon-lg">
                            <input type="email" class="form-control" name="email" placeholder="อีเมล"
                                   value="{{ old('email') }}" required>
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="icon-addon addon-lg">
                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน" required>
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-group">

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="padding: 0px 0px 0px 0px;">
                        <button type="button" class="btn btn-default pull-right" id="btn_close_modal"
                                data-dismiss="modal" style="width: 20%; background-color: #f2f2f2; margin-left: 10px;">
                            ปิดหน้าต่าง
                        </button>
                        <button type="submit" class="btn btn-success pull-right" style="width: 30%;">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
