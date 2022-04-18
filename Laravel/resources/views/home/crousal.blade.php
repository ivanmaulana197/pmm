<center>
<div class="col-lg-10">
    <div class="mb-3 mt-2">
        {{-- <div class="card-body overflow-hidden ">
            <div class="row align-items-center"> --}}
        <div class="carousel slide carousel-fade" id="carouselExampleCaptions" data-ride="carousel">
            {{-- <div class="carousel-indicators">
                    <button class="active" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div> --}}
            <div class="carousel-inner light" style="border-radius: 30px;">
                <div class="carousel-item active" data-bs-interval="4000">
                    <a class="post1" href="{{ asset('assets/img/generic/5.jpg') }}" data-gallery="gallery-1">
                        <img class="d-block w-100" src="{{ asset('assets/img/generic/5.jpg') }}" alt="First slide" />
                      </a>
                    {{-- <img class="d-block w-100" src="{{ asset('assets/img/generic/5.jpg') }}" alt="First slide" /> --}}
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">First Slide Heading</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <a class="post1" href="{{ asset('assets/img/generic/8.jpg') }}" data-gallery="gallery-1">
                        <img class="d-block w-100" src="{{ asset('assets/img/generic/8.jpg') }}" alt="Second slide" />
                      </a>
                    {{-- <img class="d-block w-100" src="{{ asset('assets/img/chat/8.jpg') }}" alt="Second slide" /> --}}
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Second Slide Heading</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <a class="post1" href="{{ asset('assets/img/generic/9.jpg') }}" data-gallery="gallery-1">
                        <img class="d-block w-100" src="{{ asset('assets/img/generic/9.jpg') }}" alt="Second slide" />
                      </a>
                    {{-- <img class="d-block w-100" src="{{ asset('assets/img/generic/9.jpg') }}" alt="Third slide" /> --}}
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Third Slide Heading</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
        {{-- </div>
        </div> --}}
    </div>
</div>
</center>