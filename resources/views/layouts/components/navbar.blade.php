@php
    $categorys = App\Category::all();
@endphp

<nav class="navbar navbar-default" style="border-radius: 0px; margin-bottom: 0px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="margin-left: 50px;">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                @if (Auth::check())
                    <a href="#" class="dropdown dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"
                       style="font-size: 18px; text-decoration: none;">{{ Auth::User()->username }} <span
                                class="caret"></span></a>
                @endif

                <ul class="dropdown-menu">

                    @if (Auth::check())
                        <li><a href="{{ url('user/profile') }}" style="font-size: 18px;">หน้าส่วนตัว</a></li>
                        <li><a href="{{ url('user/write/story') }}" style="font-size: 18px;">เขียนนิยาย</a></li>
                        {{--<li><a href="{{ url('user/topup') }}" style="font-size: 18px;">เติมเหรียญ</a></li>--}}
                        {{--<li><a href="{{ url('user/history/topup') }}" style="font-size: 18px;">ประวัติการเติมเหรียญ</a></li>--}}
                        {{--<li><a href="{{ url('user/history/unlock') }}" style="font-size: 18px;">ประวัติการปลดล็อก</a></li>--}}
                        {{--<li><a href="{{ url('user/register/writer') }}" style="font-size: 18px;">ลงทะเบียนนักเขียนระบบ--}}
                                {{--Point</a></li>--}}
                        {{--<li><a href="{{ url('user/wallet') }}" style="font-size: 18px;">แสดงรายได้</a></li>--}}

                        <li><a href="{{ url('user/coming_soon') }}" style="font-size: 18px;">เติมเหรียญ</a></li>
                        <li><a href="{{ url('user/coming_soon') }}" style="font-size: 18px;">ประวัติการเติมเหรียญ</a></li>
                        <li><a href="{{ url('user/coming_soon') }}" style="font-size: 18px;">ประวัติการปลดล็อก</a></li>
                        <li><a href="{{ url('user/coming_soon') }}" style="font-size: 18px;">ลงทะเบียนนักเขียนระบบ
                                Point</a></li>
                        <li><a href="{{ url('user/wallet') }}" style="font-size: 18px;">แสดงรายได้</a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('user/auth/logout') }}" style="font-size: 18px;"><i
                                        class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
                    @endif

                </ul>
            </li>
            @if (Auth::check())
                @php
                    $memberMoney = new \App\MemberMoney();
                @endphp
                <li><a href="#"><i class="fa fa-usd"></i> = {{ number_format($memberMoney->currentCash()) }}&ensp;&ensp;<i class="fa fa-diamond"></i>
                        = 0</a></li>
            @else
                <li><a href="#login" id="btn-login" style="font-size: 18px;"><i class="fa fa-sign-in"></i>
                        เข้าสู่ระบบ</a></li>
            @endif
        </ul>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{!! url('/') !!}" style="font-size: 20px; margin-right: 50px;"><i class="fa fa-home"></i>
                    หน้าแรก <span class="sr-only">(current)</span></a></li>

            <li class="dropdown" style="margin-right: 50px;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false" style="font-size: 20px;"><i class="fa fa-list"></i> หมวดหมู่นิยาย <span
                            class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach ($categorys as $category)
                        <li><a href="{{ url('category/'.$category->id) }}">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="dropdown" style="margin-right: 50px;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false" style="font-size: 20px;"><i class="fa fa-book"></i> คู่มือการใช้งาน <span
                            class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('AboutUs') }}">จันทร์เจ้าดอทคอม</a></li>
                    {{--<li><a href="{{ url('HowToUseDiamond') }}">อ่านฟรีโดยใช้เพชร</a></li>--}}
                    {{--<li><a href="{{ url('Rules') }}">ลุ้นรับ iPhone 7</a></li>--}}
                    {{--<li><a href="{{ url('HowToUnlockStory') }}">วิธีการปลดล็อกตอนนิยาย</a></li>--}}

                    <li><a href="{{ url('user/coming_soon') }}">อ่านฟรีโดยใช้เพชร</a></li>
                    <li><a href="{{ url('user/coming_soon') }}">วิธีการปลดล็อกตอนนิยาย</a></li>
                </ul>
            </li>

            <li><a href="{!! url('contact') !!}" style="font-size: 20px; margin-right: 50px;"><i
                            class="fa fa-phone"></i> ติดต่อเรา <span class="sr-only">(current)</span></a></li>

        </ul>

    </div><!-- /.navbar-collapse -->
</nav>
