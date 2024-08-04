@extends('admins.layouts.master')

@section('title')
    Sửa loại tin
@endsection

@section('css')
@endsection

@section('content')
    <div class="content">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Loại tin</h4>
            </div>
        </div>

        <!-- Start Content-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Form Sửa loại tin</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên tài khoản</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                                        placeholder="Nhập tên tài khoản" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Cấp quyền</label>
                                    <select name="type" class="form-select  @error('type') is-invaild @enderror">
                                        <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="author"{{ $user->type == 'author' ? 'selected' : '' }}>Người viết bài
                                        </option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="Nhập email" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar</label>
                                    <input type="file" id="avatar" name="avatar" class="form-control form-control-lg"
                                        placeholder="Nhập mật khẩu" value="{{ old('avatar') }}">
                                    <img src="{{ Storage::url($user->avatar) }}" alt="" style="height: 100px">
                                    @error('avatar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Update</button>
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
