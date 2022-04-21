<center>
    <div class="col-lg-10">
        <div class="mb-3 mt-2">

            <div class="carousel slide carousel-fade" id="carouselExampleCaptions" data-ride="carousel">
                <div class="carousel-inner light" style="border-radius: 30px;">
                    @if (count($posts)<5) 
                        @foreach ($posts as $i=>$post)
                            @if($i==0)
                            <div class="carousel-item active" data-bs-interval="4000" >
                                <a class="post1" href="{{ $post->multipleImage[0]->path }}" data-gallery="gallery-1">
                                        <img class="d-block w-100" src="{{ $post->multipleImage[0]->path }}" alt="First slide" />
                                </a>
                                <div class="carousel-caption d-none d-md-block">
                                    <a href=""><h5 class="text-white">{{ $post->title }}</h5></a>
                                </div>
                            </div>
                            @else
                            <div class="carousel-item" data-bs-interval="4000">
                                <a class="post1" href="{{ $post->multipleImage[0]->path }}" data-gallery="gallery-1">
                                    <img class="d-block w-100" src="{{ $post->multipleImage[0]->path }}" alt="First slide" />
                                </a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-white">{{ $post->title }}</h5>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else
                        @for ($i=0;$i<5;$i++) 
                            @if($i==0) 
                            <div class="carousel-item active" data-bs-interval="4000">
                                <a class="col-sm-4" href="{{ $posts[$i]->multipleImage[0]->path }}" data-gallery="gallery-1">
                                    <img class="w-100 img-fluid" width="200" src="{{ $posts[$i]->multipleImage[0]->path }}" alt="First slide" />
                                </a>
                            </div>
                            @else
                            <div class="carousel-item" data-bs-interval="4000">
                                <a class="post1" href="{{ $posts[$i]->multipleImage[0]->path }}" data-gallery="gallery-1">
                                    <img class="d-block w-100" src="{{ $posts[$i]->multipleImage[0]->path }}" alt="First slide" />
                                </a>
                            </div>
                            @endif
                        @endfor
                    @endif

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
        {{--
    </div>
    </div> --}}
    </div>
    </div>
</center>