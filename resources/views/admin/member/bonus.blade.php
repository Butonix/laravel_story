@extends('layouts.admin')

@section('content')

    @if (session('status'))
        <script type="text/javascript">
            swal("", "ให้โบนัสเรียบร้อยแล้ว", "success")
        </script>
    @endif

    <div class="row">

        <div class="form-group text-center">
            <h2>สมาชิกทั้งหมด</h2>
        </div>

        <div class="col-md-12">

            <div class="form-group text-right">
                <a href="{{ url('admin/member/all/sort') }}"><button type="button" class="btn btn-info"><i class="fa fa-list"></i> รายได้มาก - น้อย</button></a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="success">
                        <th>ลำดับที่</th>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>อีเมล</th>
                        <th>รายได้ (เหรียญ)</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($members as $member)

                        @php
                            // Result Cash
                            $total_coin = 0;
                            $storys = App\Story::where('member_id', $member->id)->get();

                            foreach ($storys as $story) {
                                $sub_storys = App\SubStory::where('story_id', $story->id)->get();
                                foreach ($sub_storys as $sub_story) {
                                    if ($sub_story->unlock_coin > 0 && $sub_story->unlock_diamond > 0) {
                                        $coin_start = $sub_story->unlock_coin;
                                        $diamond_start = $sub_story->unlock_diamond;
                                        $unlockSubStory = App\UnlockSubStory::where('sub_story_id', $sub_story->id)->get();
                                        if (count($unlockSubStory) > 0) {
                                            foreach ($unlockSubStory as $item) {
                                                $total_coin = $total_coin + $coin_start;
                                            }
                                        }
                                    }
                                }
                            }
                        @endphp

                        <form action="{{ url('admin/member/bonus/'.$member->id) }}" method="post">
                            {{ csrf_field() }}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->username }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ number_format($total_coin) }}</td>
                                <td>
                                    <input type="text" class="form-control" name="bonus" placeholder="จำนวนเงินโบนัส (บาท)">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                                </td>
                            </tr>
                        </form>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
