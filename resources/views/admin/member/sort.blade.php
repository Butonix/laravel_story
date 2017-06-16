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

        @php
            $list_desc = array();
            foreach ($members as $member) {
                // Result Cash
                $total_coin = 0;
                $storys = App\Story::where('member_id', $member->id)->get();

                foreach ($storys as $story) {
                    $sub_storys = App\SubStory::where('story_id', $story->id)->get();
                    foreach ($sub_storys as $sub_story) {
                        if ($sub_story->unlock_coin > 0 && $sub_story->unlock_diamond > 0) {
                            $coin_start = $sub_story->unlock_coin;
                            $diamond_start = $sub_story->unlock_diamond;
                            $unlockSubStory = App\UnlockSubStory::where('sub_story_id', $sub_story->sub_story_id)->get();
                            if (count($unlockSubStory) > 0) {
                                foreach ($unlockSubStory as $item) {
                                    $total_coin = $total_coin + $coin_start;
                                }
                            }
                        }
                    }
                }
                array_push($list_desc, [
                    'id' => $member->id,
                    'username' => $member->username,
                    'email' => $member->email,
                    'text_password' => decrypt($member->text_password),
                    'facebook_id' => $member->facebook_id,
                    'coin' => $total_coin
                ]);
            }

            /*array_push($list_desc, [
                    'id' => 1,
                    'username' => 'test1',
                    'email' => 'test1@gmail.com',
                    'text_password' => 'password',
                    'facebook_id' => 'NULL',
                    'coin' => 500
                ]);
            array_push($list_desc, [
                    'id' => 2,
                    'username' => 'test2',
                    'email' => 'test2@gmail.com',
                    'text_password' => 'password',
                    'facebook_id' => 'NULL',
                    'coin' => 0
                ]);*/


            //$list_desc = array_reverse($list_desc);
            //dd($list_desc);

        @endphp

        <div class="form-group text-center">
            <h2>สมาชิกทั้งหมด</h2>
            <span style="font-size: 18px;">(เรียงลำดับรายได้ มาก-น้อย)</span>
        </div>

        <div class="col-md-12">

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
                    @foreach ($list_desc as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['username'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['text_password'] }}</td>
                            <td>{{ number_format($item['coin']) }}</td>

                            @if ($item['facebook_id'] != NULL)
                                <td><i class="fa fa-facebook-official fa-lg"></i></td>
                            @else
                                <td><a href="{{ url('admin/member/edit/'.$item['id']) }}" style="text-decoration: none;"><i class="fa fa-pencil"></i>
                                        แก้ไข</a></td>
                            @endif

                            @if ($item['status_ban'] == 0)
                                <td><a href="#" class="ban-{{ $item['id'] }}" style="//color: orange; text-decoration: none;"><i
                                                class="fa fa-ban"></i> แบน</a></td>
                                <script>
                                    $(document).ready(function () {
                                        $('.ban-{{ $item['id'] }}').on('click', function () {
                                            $.post('{{ url('admin/member/ban/'.$item['id']) }}',
                                                {
                                                    '_token' : '{{ csrf_token() }}'
                                                },
                                                function (data, status) {
                                                    if (status) {
                                                        location.reload();
                                                    }
                                                    console.log('Ban id {{ $item['id'] }} : ' + status);
                                                });
                                        });
                                    });
                                </script>
                            @else
                                <td><a href="#" class="unban-{{ $item['id'] }}" style="//color: orange; text-decoration: none;">ปลดแบน</a></td>
                                <script>
                                    $(document).ready(function () {
                                        $('.unban-{{ $item['id'] }}').on('click', function () {
                                            $.post('{{ url('admin/member/unban/'.$item['id']) }}',
                                                {
                                                    '_token' : '{{ csrf_token() }}'
                                                },
                                                function (data, status) {
                                                    if (status) {
                                                        location.reload();
                                                    }
                                                    console.log('Ban id {{ $item['id'] }} : ' + status);
                                                });
                                        });
                                    });
                                </script>
                            @endif

                            <td><a href="{{ url('admin/member/delete/'.$item['id']) }}" style="color: red; text-decoration: none;"><i
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
