<div class="weekly2-single">
    <div class="weekly2-img">
        <img src="{{ Storage::url($item->image_url) }}" alt="">
    </div>
    <div class="weekly2-caption">
        <span class="color1">{{ $item->category->name }}</span>
        <p>{{ $item->created_at }}</p>
        <h4><a href="{{ route('article-show', $item->id) }}">{{ $item->title }}</a></h4>
    </div>
</div>