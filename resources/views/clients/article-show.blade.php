@extends('clients.layouts.master')

@section('title')
    @foreach ($article as $item)
        {{ $item->title }}
    @endforeach
@endsection

@section('main')
    <!--================Blog Area =================-->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        @foreach ($article as $item)
                        <div class="single-post">
                            <div class="title mt-3 mb-4">
                                <h2>{{ $item->title }}</h2>
                            </div>
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ $item->image_url }}" alt="">
                            </div>
                            <div class="blog_details">
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href=""><i class="fa fa-user"></i>{{ $item->name }}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                                <p>
                                   {!! nl2br(e($item->content)) !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        <div class="navigation-top">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and
                                    4
                                    people like this</p>
                                <div class="col-sm-4 text-center my-2 my-sm-0">
                                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                                </div>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                </ul>
                            </div>
                            <div class="navigation-area">
                                <div class="row">
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="/assets/client/img/post/preview.png"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="#">
                                                <h4>Space The Final Frontier</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="#">
                                                <h4>Telescopes 101</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="/assets/client/img/post/next.png"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-author">
                            <div class="media align-items-center">
                                <img src="/assets/client/img/blog/author.png" alt="">
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Harvard milan</h4>
                                    </a>
                                    <p>Second divided from form fish beast made. Every of seas all gathered use saying
                                        you're,
                                        he
                                        our dominion twon Second divided from</p>
                                </div>
                            </div>
                        </div>
                        @include('clients.compenents.articles.comment')
                    </div>
                    @include('clients.compenents.articles.sidebar')
                </div>
            </div>
        </section>

    <!--================ Blog Area end =================-->
@endsection
