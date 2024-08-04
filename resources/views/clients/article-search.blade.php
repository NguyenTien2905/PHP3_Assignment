@extends('clients.layouts.master')

@section('title')
    Tìm kiếm
@endsection

@section('main')
    <!--================Blog Area =================-->

    <section class="blog_area section-padding">

        <div class="container">
            <h1> Kết quả tìm kiếm cho từ khóa: {{ $keyword }}</h1>
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @if ($articles->isEmpty())
                            <p>Không có tin tức nào.</p>
                        @else
                            @foreach ($articles as $item)
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{ Storage::url($item->image_url) }}" alt="">
                                        <a href="#" class="blog_item_date">
                                            {{ $item->created_at }}
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{ route('article-show', $item->id) }}s">
                                            <h2>{{ $item->title }}</h2>
                                        </a>
                                        <ul class="blog-info-link">
                                            <li><a href="{{ route('client.category', $item->category_id) }}"><i class="fa fa-user"></i> {{ $item->user->name}}</a></li>
                                            <li><i class="fa fa-comments"></i> 03 Comments</a></li>
                                        </ul>
                                    </div>
                                </article>
                            @endforeach
                        @endif





                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                @include('clients.compenents.articles.sidebar')
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection
