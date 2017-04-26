<form action="{{ url('user/like/sub_story/'.$sub_story->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="modal-like" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <span class="modal-title" id="myModalLabel" style="font-size: 22px;">กรุณาเลือกจำนวน <i class="fa fa-heart fa-lg text-danger"></i></span>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="50">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">50 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">100 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="100">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">100 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">200 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="200">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">200 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">400 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="300">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">300 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">600 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="500">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">500 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">1,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="700">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">700 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">1,400 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="1000">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">1,000 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">2,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="1500">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">1,500 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">3,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="3000">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">3,000 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">6,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="4000">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">4,000 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">8,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="5000">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">5,000 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">10,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="10000">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">10,000 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">20,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
                                    <input type="radio" name="count_like" value="100000">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">100,000 <i class="fa fa-heart fa-lg text-danger"></i></span>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    <span style="font-size: 18px;">=</span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-3 text-right">
                                    <span style="font-size: 18px;">200,000 <i class="fa fa-usd fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center"
                         style="padding: 0px 0px 0px 0px;">
                        <button type="submit" class="btn btn-success" style="font-size: 16px;">ตกลง <i class="fa fa-heart fa-lg"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
