<template>

  <form id="form_login">
    <div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="modal-title" id="myModalLabel" style="font-size: 22px;"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</span>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="icon-addon addon-lg">
                  <input type="email" class="form-control" placeholder="อีเมล" required>
                  <i class="fa fa-user"></i>
              </div>
              <span class="pull-right"><a href="#" onclick="normal_register()">สมัครสมาชิก</a></span>
            </div>
            <div class="form-group">
              <div class="icon-addon addon-lg">
                  <input type="password" class="form-control" placeholder="รหัสผ่าน" required>
                  <i class="fa fa-key"></i>
              </div>
              <span class="pull-right" style="margin-left: 10px;"><a href="#">ลืมรหัสผ่าน</a></span>

            </div>
            <div class="form-group">

            </div>
          </div>
          <div class="modal-footer">
            <div class="col-xs-6 col-sm-6 col-md-4 text-left" style="//border: 1px solid red; padding: 0px 0px 0px 0px;">
              <button type="button" class="btn btn-primary"><i class="fa fa-facebook-square fa-lg"></i> ล็อกอินด้วยเฟสบุ๊ก</button>
            </div>
            <!-- <div class="col-xs-offset-4 col-xs-2 col-sm-6 col-md-offset-4 col-md-2" style="padding: 0px 0px 0px 0px;">
              <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
            </div> -->
            <div class="col-xs-6 col-sm-6 col-md-offset-6 col-md-2 text-right" style="padding: 0px 0px 0px 0px;">
              <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>

</template>

<script>
    export default {
        mounted() {
            console.log('Component modal login ready.')
        }
    }
</script>
