@extends('admins.layouts.master')

@section('title')
    Quản lý tin tức
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
                            @if (Auth::user()->type === 'author')
                                 <a href="{{ route('admin.articles.create') }}" class="btn btn-success mb-2">Thêm tin tức</a>
                            @endif
                           
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Title</th>
                                        <th>Danh mục</th>
                                        <th>Tác giả</th>
                                        <th>Lượt xem</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td class="text-center">
                                                <img src="{{ Storage::url($item->image_url) }}" alt=""
                                                    style="height:100px">
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->views }}</td>
                                            <td>
                                                @if ($item->status === 'Pending')
                                                    <span class="text-success">Đang chờ duyệt</span>
                                                @endif
                                                @if ($item->status === 'Show')
                                                    <span class="text-primary">Hiển thị</span>
                                                @endif
                                                @if ($item->status === 'Hide')
                                                    <span class="text-danger">Ẩn</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('admin.articles.show', $item->id) }}"><i
                                                        data-feather="eye"></i></a>
                                                <a href="{{ route('admin.articles.edit', $item->id) }}"><i
                                                        data-feather="edit"></i></a>

                                                @if ( Auth::user()->type === 'admin')
                                                    <form action="{{ route('admin.articles.delete', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onclick="if(!confirm('Bạn chắc chắn muốn xóa không?')){event.preventDefault()}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-white">
                                                            <i data-feather="trash"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                {{ $articles->links() }}
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
@endsection
