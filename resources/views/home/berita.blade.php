<div class="card mb-3">
    <div class="card-header pb-0">
        <h5>Berita terbaru</h5>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-sm-6 mb-3">
                <div class="card mb-3">
                    <div class=" carousel slide carousel-fade" id="controlStyledExample" data-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($post->multipleImage as $i=>$image)

                            @if ($i==0)
                            <button class="active" type="button" data-bs-target="#controlStyledExample"
                                data-bs-slide-to="{{ $i }}" aria-current="true" aria-label="Slide {{ $i }}"></button>
                            @else
                            <button type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="{{ $i }}"
                                aria-current="true" aria-label="Slide {{ $i }}"></button>
                            @endif

                            @endforeach

                        </div>
                        <div class="carousel-inner rounded">
                            @foreach ($post->multipleImage as $i=>$image)
                            @if ($i==0)
                            <div class="carousel-item active">
                                <a class="post1" href="{{ $image->path }}"
                                    data-gallery="gallery-1">
                                    <img class="card-img-top" src="{{ $image->path }}"
                                        alt="" />
                                </a>
                            </div>
                            @else
                            <div class="carousel-item">
                                <a class="post1" href="{{ $image->path }}"
                                    data-gallery="gallery-1">
                                    <img class="card-img-top" src="{{ $image->path }}"
                                        alt="" />
                                </a>
                            </div>
                            @endif
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#controlStyledExample"
                            data-bs-slide="prev">
                            <span class="fas fa-angle-left"></span> <span class="sr-only">Previous</span> </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#controlStyledExample"
                            data-bs-slide="next">
                            <span class="fas fa-angle-right"></span><span class="sr-only">Next</span> </button>

                    </div>
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <div class="d-flex">
                                    <div class="calendar me-2"><span class="calendar-month">{{
                                            $post->created_at->isoFormat('MMM')
                                            }}</span><span class="calendar-day">{{ $post->created_at->isoFormat('D') }}
                                        </span>
                                    </div>
                                    <div class="flex-1 fs--1">
                                        <a href="{{ route('detail-berita-home', $post->slug) }}"><h5 class="fs-0">{{ $post->title }}</h5></a>
                                        <p class="mb-0">by <a href="#!">{{ $post->user->name }}</a> • {{
                                            $post->created_at->diffForHumans() }}
                                        </p>
                                        <a href="" class="fs-0 text-warning fw-semi-bold">{{ $post->category->nama_category }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto mt-4 mt-md-0">
                                <button class="btn btn-falcon-default btn-sm me-2" type="button"><span
                                        class="fas fa-heart text-danger me-1"></span>{{ $post->like }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
    <div class="card-footer">
        {!! $posts->links() !!}
    </div>
</div>