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
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="{{ route('client.category', 0 ) }}"
                        role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                    @foreach ($categories as $item)
                        <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href=" {{ route('client.category', $item->id) }}"
                            role="tab" aria-controls="nav-profile" aria-selected="false" >{{ $item->name }}</a>
                    @endforeach
                </div>
            </nav>
            <!--End Nav Button  -->
        </div>
    </div>
</div>
