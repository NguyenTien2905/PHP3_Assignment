<div class="single-recent mb-100">
    <div class="what-img">
        <img src="{{ $item->image_url }}" alt="">
    </div>
    <div class="what-cap">
        <span class="color1">{{ $item->name }}</span>
        <h4><a href="{{ route('article-show', $item->id) }}">{{ $item->title }}</a></h4>
    </div>
</div>