@extends('admins.layouts.master')

@section('title')
    Thêm tài khoản admins
@endsection

@section('css')
@endsection

@section('content')
    <div class="content">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Tài khoản</h4>
            </div>
        </div>

        <!-- Start Content-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Form tạo tài khoản</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>    
                        </div>
                    @endif
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên tài khoản</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                                        placeholder="Nhập tên tài khoản" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Cấp quyền</label>
                                    <select name="type"
                                        class="form-select  @error('type') is-invaild @enderror">
                                        <option value="0" selected>-- Chọn cấp quyền --</option>
                                        <option value="admin">Admin</option>
                                        <option value="author">Người viết bài</option>
                                    </select>

                                    
                                    @error('type')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="Nhập email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Mật khẩu</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Nhập mật khẩu"
                                        value="{{ old('password') }}" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar</label>
                                    <input type="file" id="avatar" name="avatar" class="form-control form-control-lg"
                                        placeholder="Nhập mật khẩu" value="{{ old('avatar') }}">
                                    @error('avatar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
@endsection
