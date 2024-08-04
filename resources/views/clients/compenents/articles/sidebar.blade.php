<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form method="GET" action="{{ route('article-search') }}">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder='Search Keyword' name='keyword'
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                        <div class="input-group-append">
                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                    type="submit">Search</button>
            </form>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
                @foreach ($categories as $item)
                    <li>
                        <a href="{{ route('client.category', $item->id) }}" class="d-flex">
                            <p>{{ $item->name }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Recent Post</h3>
            @foreach ($posts as $item)
                <div class="media post_item">
                    <img style="max-height: 80px;" src="{{ Storage::url($item->image_url) }}" alt="post">
                    <div class="media-body">
                        <a href="{{ route('article-show', $item->id) }}">
                            <h3>{{ $item->title }}</h3>
                        </a>
                        <p>{{ $item->created_at }}</p>
                    </div>
                </div>
            @endforeach

        </aside>
    </div>
</div>
