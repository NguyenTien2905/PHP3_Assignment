@extends('admins.layouts.master')

@section('title')
    Preview Tin tức
@endsection

@section('css')
@include('clients.layouts.partials.css')
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Preveiw bài viết</h4>
                </div>
            </div>

            <!-- Datatables  -->
            <div class="row">
                <div class="single-post">
                    <div class="title mt-3 mb-4">
                        <h2>{{ $article->title }}</h2>
                    </div>
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ Storage::url($article->image_url) }}" alt="">
                    </div>
                    <div class="blog_details">
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><i class="fa fa-user"></i>{{ $article->user->name }}</li>
                            <li><i class="fa fa-comments"></i> 03 Comments</li>
                        </ul>
                        <p>
                            {!! $article->content !!}
                        </p>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
    @include('clients.layouts.partials.js')
@endsection
