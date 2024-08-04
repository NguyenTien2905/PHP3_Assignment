 <div class="trand-right-single d-flex">
     <div class="trand-right-img">
         <img src="{{ Storage::url($item->image_url) }}" alt="" style="height: 100px; weight: 120px">
     </div>
     <div class="trand-right-cap">
         <span class="color1">{{ $item->category->name }}</span>
         <h4><a href="{{ route('article-show', $item->id) }}">{{ $item->title }}</a></h4>
     </div>
 </div>
