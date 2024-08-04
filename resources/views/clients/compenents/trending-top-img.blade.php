<div class="trend-top-img">
    <img src="{{ Storage::url($item->image_url) }}" alt="">
    <div class="trend-top-cap">
        <span>{{ $item->category->name }}</span>
        <h2><a href="{{ route('article-show', $item->id) }}">{{ $item->title }}</a></h2>
    </div>
</div>
