@extends('admins.layouts.master')

@section('title')
    Chỉnh sửa
@endsection

@section('css')
    <!-- Quill css -->
    <link href="/assets/admin/libs/quill/quill.core.js" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="content">


        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Bài viết</h4>
            </div>
        </div>

        <!-- Start Content-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Form chỉnh sửa tin tức</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tiêu đề</label>
                                    <input type="text" id="title" name="title" class="form-control form-control-lg"
                                        placeholder="Nhập tiêu đề bài viết" value="{{ $article->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="category_id" class="form-label">Loại tin</label>
                                    <select name="category_id"
                                        class="form-select  @error('category_id') is-invaild @enderror">
                                        <option selected>-- Chọn loại tin --</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $article->category_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="image_url" class="form-label">Ảnh đại diện</label>
                                    <input type="file" id="image_url" name="image_url" placeholder="Ảnh đại diện"
                                        class="form-control" onchange="showImage(event)">
                                    <img id="img" src="{{ Storage::url($article->image_url) }}" alt=""
                                        style='height: 100px' class="mt-2">
                                    @error('image_url')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label" for="content">Nội dung bài viết</label>
                                    @error('content')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <div id="quill-editor" style="height: 400px;">
                                        </div>
                                        <textarea name="content" id="inside_content" class="d-none"></textarea>
                                    </div>
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
    <!-- Quill Editor Js -->
    <script src="/assets/admin/libs/quill/quill.core.js"></script>
    <script src="/assets/admin/libs/quill/quill.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill("#quill-editor", {
                theme: "snow",

            })

            // Hiển thì nội dung cũ
            var old_inside = `{!! $article->content !!}`;
            quill.root.innerHTML = old_inside;

            // Cập nhật textarea khi quill-editor thay đổi
            quill.on('text-change', function() {
                var html = quill.root.innerHTML;
                document.getElementById('inside_content').value = html;
            })

        })
    </script>

    <script>
        function showImage(event) {
            const img = document.getElementById('img');

            console.log(img);

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img.src = reader.result;
                img.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
