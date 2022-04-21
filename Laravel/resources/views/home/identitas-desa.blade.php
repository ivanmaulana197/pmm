<div class="card mb-3">
    <div class="card-body bg-light">
        <div class="card mb-1" style="cursor: pointer" data-bs-toggle="collapse" data-bs-target="#identitasdesa"
            aria-expanded="false" aria-controls="identitasdesa">
            <div class="card-body py-2">
                <div class="row justify-content-between">
                    <div class="col">
                        <h5><span class="badge badge-soft-primary"><i class="fas fa-book-reader"></i></span> Identitas
                            desa</h5>
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
                    <table id="table-agenda" width="100%">
                        <tbody>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Nama Desa</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"><b> {{ $identitas->namaDesa
                                        }}</b></td>
                            </tr>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Kecamatan</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"> {{ $identitas->namaKecamatan
                                    }}</td>
                            </tr>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Kabupaten</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"> {{ $identitas->namaKabupaten
                                    }}</td>
                            </tr>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Provinsi</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"> {{ $identitas->namaProvinsi
                                    }}</td>
                            </tr>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Kode Pos</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"> 61375</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="card mb-1" style="cursor: pointer" data-bs-toggle="collapse" data-bs-target="#pemerintahdesa"
            aria-expanded="false" aria-controls="pemerintahdesa">
            <div class="card-body py-2">
                <div class="row justify-content-between">
                    <div class="col">
                        <h5><span class="badge badge-soft-primary"><i class="fas fas fa-gopuram"></i></span> Pemerintah
                            Desa</h5>
                    </div>
                    <div class="col-auto">
                        <span class="fas fa-angle-down"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body overflow-hidden pt-0 pb-0">
                <div class="collapse mt-3" id="pemerintahdesa">
                    <table id="table-agenda" width="100%">
                        <tbody>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Nama Desa</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"><b> {{
                                        $pemerintahan->namaKepalaDesa }}</b></td>
                            </tr>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Kecamatan</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"> {{ $pemerintahan->kantor }}
                                </td>
                            </tr>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Kabupaten</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"> {{ $pemerintahan->telp }}
                                </td>
                            </tr>
                            <tr>
                                <td width="47%" style="vertical-align:top;">Provinsi</td>
                                <td width="3%" style="vertical-align:top;">:</td>
                                <td width="50%" style="text-align:left;vertical-align:top"> {{ $pemerintahan->email }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>