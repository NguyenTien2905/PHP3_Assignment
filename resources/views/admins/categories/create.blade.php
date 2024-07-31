@extends('admins.layouts.master')

@section('title')
    Thêm loại tin
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
                        <h5 class="card-title mb-0">Form thêm loại tin</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Loại tin</label>
                                <input type="text" id="name" name="name" class="form-control form-control-lg"
                                    placeholder="Nhập tên loại tin" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả ngăn</label>
                                <input type="text" id="description" name="description"
                                    class="form-control form-control-lg" placeholder="Mô tả ngắn" value="{{ old('description') }}">
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
