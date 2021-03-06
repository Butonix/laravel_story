@include('user.components.modal_like_story')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-offset-4 col-md-4">
                    <div class="table-responsive remove-border">
                        <table class="table remove-border">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><i class="fa fa-usd fa-lg"></i></td>
                                <td>ยอดเหรียญ</td>
                                <td>{{ $total_coin }}</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-heart fa-lg"></i></td>
                                <td>ยอดหัวใจ</td>
                                <td><span id="count-like">{{ number_format($story->count_like) }}</span></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-diamond fa-lg"></i></td>
                                <td>ยอดเพชร</td>
                                <td>0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">


                        <button type="button" id="btn-like" class="btn btn-danger" style="font-size: 18px;">
                            ชอบ <i class="fa fa-exclamation"></i>
                            มอบ <i class="fa fa-heart fa-lg"></i> ให้เลย
                        </button>

                        <div class="form-group" style="margin-top: 20px;">
                            <a onclick="fb('{{ url()->current() }}')" style="cursor:poiter">
                                <button type="button" class="btn btn-primary" style="font-size: 18px;"><i
                                            class="fa fa-facebook"></i> แชร์ผลงาน
                                </button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#btn-like').on('click', function () {
            $('#modal-like').modal();
        });
    });
</script>
