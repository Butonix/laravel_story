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

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="success">
                        <th>ลำดับที่</th>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>อีเมล</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($members as $member)

                        @php
                            $permission = \App\PermissionMember::find($member->id);
                        @endphp

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->username }}</td>
                            <td>{{ $member->email }}</td>

                            @if ($member->facebook_id != NULL)
                                <td><i class="fa fa-facebook-official fa-lg"></i></td>
                            @else
                                <td><a href="{{ url('admin/member/edit/'.$member->id) }}" style="text-decoration: none;"><i class="fa fa-pencil"></i>
                                        แก้ไข</a></td>
                            @endif

                            @if ($permission->ban_status == 0)
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
