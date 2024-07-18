<div class="col-lg-4">
    <div class="single-bottom mb-35">
        <div class="trend-bottom-img mb-30">
            <img src="{{ $item->image_url }}" alt="">
        </div>
        <div class="trend-bottom-cap">
            <span class="color1">{{ $item->name }}</span>
            <h4><a href="{{ route('article-show', $item->id) }}">{{ $item->title }}</a></h4>
        </div>
    </div>
</div>