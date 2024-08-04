<div class="row d-flex justify-content-between">
    <div class="col-lg-3 col-md-3">
        <div class="section-tittle mb-30">
            <h3>Có gì mới </h3>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 ">
        <div class="properties__button">
            <!--Nav Button  -->
            <nav>
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" href="{{ route('client.category', 0) }}">All</a>
                    @foreach ($categories as $item)
                        <a class="nav-item nav-link"
                            href="{{ route('client.category', $item->id) }}">{{ $item->name }}</a>
                    @endforeach
                </div>
            </nav>
            <!--End Nav Button  -->
        </div>
    </div>
</div>
