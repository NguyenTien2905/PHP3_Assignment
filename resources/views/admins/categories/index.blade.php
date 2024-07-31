@extends('admins.layouts.master')

@section('title')
    Quản lý loại tin
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
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-2">Thêm loại tin</a>
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên loại</th>
                                        <th>Mô tả</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.categories.edit', $category->id) }}"><i
                                                        data-feather="edit"></i></a>
                                                <form action="{{ route('admin.categories.delete', $category->id) }}"
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
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
@endsection
