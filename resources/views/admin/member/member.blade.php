@extends('layouts.admin')

@section('content')

    <div class="row">

        @if (session('status_register'))
            <script type="text/javascript">
                swal("", "สมัครสมาชิกสำเร็จ", "success")
            </script>
        @endif

        @if (session('status_edit'))
            <script type="text/javascript">
                swal("", "แก้ไขสมาชิกสำเร็จ", "success")
            </script>
        @endif

        @if (session('status_delete'))
            <script type="text/javascript">
                swal("", "ลบสมาชิกสำเร็จ", "success")
            </script>
        @endif

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
                        <th>รหัสผ่าน</th>
                        <th>รายได้ (เหรียญ)</th>
                        <th></th>
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

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->username }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ decrypt($member->text_password) }}</td>
                            <td>{{ number_format($total_coin) }}</td>

                            @if ($member->facebook_id != NULL)
                                <td><i class="fa fa-facebook-official fa-lg"></i></td>
                            @else
                                <td><a href="{{ url('admin/member/edit/'.$member->id) }}" style="text-decoration: none;"><i class="fa fa-pencil"></i>
                                        แก้ไข</a></td>
                            @endif

                            @if ($member->status_ban == 0)
                                <td><a href="#" class="ban-{{ $member->id }}" style="//color: orange; text-decoration: none;"><i
                                                class="fa fa-ban"></i> แบน</a></td>
                                <script>
                                    $(document).ready(function () {
                                        $('.ban-{{ $member->id }}').on('click', function () {
                                            $.post('{{ url('admin/member/ban/'.$member->id) }}',
                                                {
                                                    '_token' : '{{ csrf_token() }}'
                                                },
                                                function (data, status) {
                                                    if (status) {
                                                        location.reload();
                                                    }
                                                    console.log('Ban id {{ $member->id }} : ' + status);
                                                });
                                        });
                                    });
                                </script>
                            @else
                                <td><a href="#" class="unban-{{ $member->id }}" style="//color: orange; text-decoration: none;">ปลดแบน</a></td>
                                <script>
                                    $(document).ready(function () {
                                        $('.unban-{{ $member->id }}').on('click', function () {
                                            $.post('{{ url('admin/member/unban/'.$member->id) }}',
                                                {
                                                    '_token' : '{{ csrf_token() }}'
                                                },
                                                function (data, status) {
                                                    if (status) {
                                                        location.reload();
                                                    }
                                                    console.log('Ban id {{ $member->id }} : ' + status);
                                                });
                                        });
                                    });
                                </script>
                            @endif

                            <td><a href="{{ url('admin/member/delete/'.$member->id) }}" style="color: red; text-decoration: none;"><i
                                            class="fa fa-trash-o"></i> ลบ</a></td>
                        </tr>



                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection
