<div class="header-bottom header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                <!-- sticky -->
                <div class="sticky-logo">
                    <a href="index.html"><img src="/assets/client/img/logo/logo.png" alt=""></a>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-md-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="{{ route('client.home') }}">Trang chủ</a></li>
                            <li><a href="{{ route('client.category', 0) }}">Danh mục</a></li>
                            <li><a href="about.html">Giới thiệu</a></li>
                            <li><a href="latest_news.html">Tin mới nhất</a></li>
                            <li><a href="contact.html">Liên hệ</a></li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest


                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4">
                <div class="header-right-btn f-right d-none d-lg-block">
                    <i class="fas fa-search special-tag"></i>
                    <div class="search-box">
                        <form action="{{ route('article-search') }}" method="GET">
                            <input type="text" placeholder="Search" name="keyword">
                            <button type="submit"></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
