@extends('layouts.user') @section('content')

<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <span style="font-size: 18px;"><i class="fa fa-money fa-lg"></i> นิยาย
          @if ($id == 1)
            รักวัยรุ่น
          @elseif ($id == 2)
            รัก,โรแมนติค
          @else
            ตลก,คอมเมดี้
          @endif
          ยอดสนับสนุนสูงสุด
        </span>
                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ชื่อเรื่อง...</h4>
                                <span>ตอน...</span><br>
                                <i class="fa fa-user"></i> admin<br>
                                <span><i class="fa fa-comment-o"></i> 1</span><br>
                                <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ชื่อเรื่อง...</h4>
                                <span>ตอน...</span><br>
                                <i class="fa fa-user"></i> admin<br>
                                <span><i class="fa fa-comment-o"></i> 1</span><br>
                                <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ชื่อเรื่อง...</h4>
                                <span>ตอน...</span><br>
                                <i class="fa fa-user"></i> admin<br>
                                <span><i class="fa fa-comment-o"></i> 1</span><br>
                                <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="pull-right" style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <span style="font-size: 18px;"><i class="fa fa-eye fa-lg"></i> นิยาย
          @if ($id == 1)
            รักวัยรุ่น
          @elseif ($id == 2)
            รัก,โรแมนติค
          @else
            ตลก,คอมเมดี้
          @endif
          ยอดอ่านสูงสุด
        </span>
                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125095/636136094357206955-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ชื่อเรื่อง...</h4>
                                <span>ตอน...</span><br>
                                <i class="fa fa-user"></i> admin<br>
                                <span><i class="fa fa-comment-o"></i> 1</span><br>
                                <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125587/636137722619944097-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ชื่อเรื่อง...</h4>
                                <span>ตอน...</span><br>
                                <i class="fa fa-user"></i> admin<br>
                                <span><i class="fa fa-comment-o"></i> 1</span><br>
                                <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125761/636138682021141824-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ชื่อเรื่อง...</h4>
                                <span>ตอน...</span><br>
                                <i class="fa fa-user"></i> admin<br>
                                <span><i class="fa fa-comment-o"></i> 1</span><br>
                                <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="pull-right" style="padding-right: 10px; padding-bottom: 10px; font-size: 16px;">ดูทั้งหมด...</a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125095/636136094357206955-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125587/636137722619944097-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125761/636138682021141824-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125095/636136094357206955-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125587/636137722619944097-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125761/636138682021141824-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/113513/636082468242063747-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/123285/636123880206411132-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="http://cdn-th.tunwalai.net/files/story/125622/636137852753451807-story.jpg" alt="..." style="width: 120px; height: 120px; border-radius: 4px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ชื่อเรื่อง...</h4>
                            <span>ตอน...</span><br>
                            <i class="fa fa-user"></i> admin<br>
                            <span><i class="fa fa-comment-o"></i> 1</span><br>
                            <span><i class="fa fa-clock-o"></i> 1 ชั่วโมงที่แล้ว</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <hr>
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default"><i class="fa fa-angle-left"></i></button>
                        <button type="button" class="btn btn-default">1</button>
                        <button type="button" class="btn btn-default">2</button>
                        <button type="button" class="btn btn-default">3</button>
                        <button type="button" class="btn btn-default">4</button>
                        <button type="button" class="btn btn-default">5</button>
                        <button type="button" class="btn btn-default"><i class="fa fa-angle-right"></i></button>
                        <button type="button" class="btn btn-default"><i class="fa fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
            <!-- end panel-body -->
        </div>
    </div>
    <!-- end col-md-12 -->

</div>

@endsection
