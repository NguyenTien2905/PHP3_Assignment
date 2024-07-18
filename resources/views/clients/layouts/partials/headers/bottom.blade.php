<div class="header-bottom header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                <!-- sticky -->
                    <div class="sticky-logo">
                        <a href="index.html"><img src="/client/assets/img/logo/logo.png" alt=""></a>
                    </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-md-block">
                    <nav>                  
                        <ul id="navigation">    
                            <li><a href="{{ route('client.home' )}}">Trang chủ</a></li>
                            <li><a href="{{ route('client.category') }}">Danh mục</a></li>
                            <li><a href="about.html">Giới thiệu</a></li>
                            <li><a href="latest_news.html">Tin mới nhất</a></li>
                            <li><a href="contact.html">Liên hệ</a></li>
                            </li>
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