<div class="card mb-3">
    <div class="card-body">
        <div class="card bg-300 mb-2">
            <div class="card-body text-center py-2">
                <button class="carousel-control-prev" type="button" data-bs-target="#aparaturdesa" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <h5>APARATUR DESA</h5>
                <button class="carousel-control-next" type="button" data-bs-target="#aparaturdesa" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="carousel slide carousel-fade" id="aparaturdesa" data-ride="carousel">
            <div class="carousel-inner light" style="border-radius: 10px;">
            @foreach($aparaturs as $i=>$aparatur)
            @if($i==0)
                <div class="carousel-item active" data-bs-interval="2000">
                    <img class="d-block w-100" src="{{ $aparatur->gambar }}"  alt="First slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h4 class="text-white">{{ $aparatur->nama }}</h4>
                        <p>{{ $aparatur->jabatan }}</p>
                    </div>
                </div>
            @else
                <div class="carousel-item" data-bs-interval="2000">
                    <img class="d-block w-100" src="{{ $aparatur->gambar }}"  alt="Second slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h4 class="text-white">{{ $aparatur->nama }}</h4>
                        <p>{{ $aparatur->jabatan }}</p>
                    </div>
                </div>
            @endif
            @endforeach
            </div>
        </div>
    </div>
</div>