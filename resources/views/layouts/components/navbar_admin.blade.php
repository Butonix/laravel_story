<nav class="navbar navbar-default" style="border-radius: 0px;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('admin/main') }}">JanJaow</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">จัดการสมาชิก <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li> -->

                @if (Session::get('active_menu') == 'member')
                    <li class="dropdown active font-size-normal">
                @else
                    <li class="dropdown font-size-normal">
                        @endif

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false" style="font-size: 18px;">จัดการสมาชิก <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/member/all') }}">สมาชิกทั้งหมด</a></li>
                            <li><a href="{{ url('admin/member/add') }}">เพิ่มสมาชิก</a></li>
                            <li><a href="{{ url('admin/writer') }}">นักเขียนระบบ Point</a></li>
                            <li><a href="{{ url('admin/member/bonus') }}">โบนัส</a></li>
                            {{--<li><a href="{{ url('admin/member/facebook') }}">สมาชิกเฟสบุ๊ค</a></li>--}}
                        </ul>
                    </li>

                    @if (Session::get('active_menu') == 'category')
                        <li class="dropdown active font-size-normal">
                    @else
                        <li class="dropdown font-size-normal">
                            @endif
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">จัดการเนื้อหา <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('admin/category/all') }}">หมวดหมู่นิยาย</a></li>
                                <li><a href="{{ url('admin/story/all') }}">ตอนหลักนิยาย</a></li>
                                <li><a href="{{ url('admin/sub_story/all') }}">ตอนย่อยนิยาย</a></li>
                                <li><a href="{{ url('admin/promote/story') }}">โปรโมทนิยาย</a></li>
                                <!-- <li role="separator" class="divider"></li> -->
                            </ul>
                        </li>

                        @if (Session::get('active_menu') == 'change_ui')
                            <li class="dropdown active font-size-normal">
                        @else
                            <li class="dropdown font-size-normal">
                                @endif
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">แก้ไขหน้าเว็บ
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('admin/change_ui/banner') }}">รายละเอียดแบนเนอร์</a></li>
                                    <li><a href="{{ url('admin/change_ui/AboutUs') }}">จันทร์เจ้าดอทคอม</a></li>
                                    <li><a href="{{ url('admin/change_ui/HowToUseDiamond') }}">อ่านฟรีโดยใช้เพชร</a></li>
                                    <li><a href="{{ url('admin/change_ui/Rules') }}">ลุ้นรับ iPhone 7</a></li>
                                    <li><a href="{{ url('admin/change_ui/HowToUnlockStory') }}">วิธีการปลดล็อกตอนนิยาย</a></li>
                                    <li><a href="{{ url('admin/change_ui/contact') }}">ติดต่อเรา</a></li>
                                    <!-- <li role="separator" class="divider"></li> -->
                                </ul>
                            </li>

                            @if (Session::get('active_menu') == 'report')
                                <li class="dropdown active font-size-normal">
                            @else
                                <li class="dropdown font-size-normal">
                                    @endif
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">รายงาน <span
                                                class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('admin/report/visit') }}">นิยาย (ยอดวิวสูงสุด)</a></li>
                                        <li><a href="{{ url('admin/report/topup') }}">รายได้ (ยอดเติมเหรียญ)</a></li>
                                        <li><a href="{{ url('admin/report/people') }}">ยอดผู้เข้าชมเว็บไซต์</a></li>
                                        <!-- <li role="separator" class="divider"></li> -->
                                    </ul>
                                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown font-size-normal">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false" style="font-size: 18px;"><i class="fa fa-user"></i> บัญชีผู้ใช้งาน <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('admin/change_password') }}">เปลี่ยนรหัสผ่าน</a></li>
                        <li><a href="{{ url('admin/logout') }}">ออกจากระบบ</a></li>
                        <!-- <li role="separator" class="divider"></li> -->
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
