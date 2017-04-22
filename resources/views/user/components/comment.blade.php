<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span style="font-size: 20px;">Comment / Review</span>
            </div>
            <div class="panel-body">
                <form action="user/profile" method="get">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <!-- <textarea name="story_detail" class="form-control" rows="8" cols="40" style="resize: none;"></textarea> -->
                        <div id="summernote"></div>
                        <input type="hidden" name="comment" id="comment">
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-success" style="font-size: 18px; width: 20%;">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
