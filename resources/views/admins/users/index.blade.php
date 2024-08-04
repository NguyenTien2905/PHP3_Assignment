@extends('admins.layouts.master')

@section('title')
    Quản lý người dùng
@endsection

@section('css')
@endsection

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Loại tin</h4>
                </div>
            </div>

            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Danh sách</h5>
                        </div><!-- end card header -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-body">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-2">Thêm loại tin</a>
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Tên tài khoản</th>
                                        <th>Email</th>
                                        <th>Loại người dùng</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td class="text-center">
                                                @if ($user->avatar == null)
                                                    <img src="/assets/defautlt_img/avatar-default-symbolic-icon-479x512-n8sg74wg.png"
                                                        alt="" style="height: 50px">
                                                @else
                                                    <img src="{{ Storage::url($user->avatar) }}" alt=""
                                                        style="height: 50px">
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->type == 'admin')
                                                    <span>Admin</span>
                                                @endif
                                                @if ($user->type == 'member')
                                                    <span>Thành viên</span>
                                                @endif
                                                @if ($user->type == 'author')
                                                    <span>Người viết bài</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $user->created_at }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.users.edit', $user->id) }}"><i
                                                        data-feather="edit"></i></a>
                                                <form action="{{ route('admin.users.resetPass', $user->id) }}"
                                                    method="POST" class="d-inline"
                                                    onclick="if(!confirm('Bạn chắc chắn muốn reset mật khẩu không?')){event.preventDefault()}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="border-0 bg-white">
                                                        <i data-feather="refresh-ccw"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.users.delete', $user->id) }}"
                                                    method="POST" class="d-inline"
                                                    onclick="if(!confirm('Bạn chắc chắn muốn xóa không?')){event.preventDefault()}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-white">
                                                        <i data-feather="trash"></i>
                                                    </button>
                                                </form>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                {{ $users->links() }}
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
@endsection
