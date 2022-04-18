<div class="card mb-3">
    <div class="card-body bg-light" >
        <div class="card mb-1"  style="cursor: pointer" data-bs-toggle="collapse" data-bs-target="#identitasdesa" aria-expanded="false" aria-controls="identitasdesa">
            <div class="card-body py-2">
                <div class="row justify-content-between">
                    <div class="col">
                        <h5><span class="badge badge-soft-primary"><i class="fas fa-book-reader"></i></span> Identitas desa</h5>
                    </div>
                    <div class="col-auto">
                        <span class="fas fa-angle-down"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body overflow-hidden pt-0 pb-0">
                <div class="collapse mt-3" id="identitasdesa">
                        
                            <p class="mb-0">Nama Desa        : {{ $identitas->namaDesa }}</p>
                            <p class="mb-0">Nama Kecamatan   : {{ $identitas->namaKecamatan }}</p>
                            <p class="mb-0">Nama Kabupaten   : {{ $identitas->namaKabupaten }}</p>
                            <p class="">Nama Provinsi    : {{ $identitas->namaProvinsi }}</p>
                        
                </div>
            </div>
        </div>
        <div class="card mb-1"  style="cursor: pointer" data-bs-toggle="collapse" data-bs-target="#pemerintahdesa" aria-expanded="false" aria-controls="pemerintahdesa">
            <div class="card-body py-2">
                <div class="row justify-content-between">
                    <div class="col">
                        <h5><span class="badge badge-soft-primary"><i class="fas fas fa-gopuram"></i></span> Pemerintah Desa</h5>
                    </div>
                    <div class="col-auto">
                        <span class="fas fa-angle-down"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body overflow-hidden pt-0 pb-0">
                <div class="collapse" id="pemerintahdesa">
                    <div class="bg-dark">
                        <span>sk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>