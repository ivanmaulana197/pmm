<div class="card mb-1">
    <div class="card-header pb-2 bg-light" style="cursor: pointer" data-bs-toggle="collapse"
        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <div class="row justify-content-between">
            <div class="col">
                <h5>Jadwal Sholat</h5>
            </div>
            <div class="col-auto">
                <span class="fas fa-angle-down"></span>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body overflow-hidden pt-0 pb-0">
        <div class="collapse" id="collapseExample">
            <div class="row justify-content-around">
                <div class="col-4 col-sm-4 col-lg-2 mt-2 mb-2">
                    <div class="card bg-300">
                        <div class="card header bg-400">
                            <h6 class="fw-semi-bold mb-0"
                                style="position: relative; display: flex;justify-content: center">Imsyak</h6>
                        </div>
                        <div class="card-body pb-1 pt-1" style="position: relative;text-align: center;">
                            <img class="" src="{{ asset('img/masjid.png') }}"
                                class="img-fluid fit-cover rounded-1 absolute-sm-centered pb-2" style="max-width: 50px"
                                alt="">
                            <span class=""
                                style="font-size: 12px;position: relative; display: flex;justify-content: center">{{
                                $data['imsak'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2 mt-2 mb-2">
                    <div class="card bg-300">
                        <div class="card header bg-400">
                            <h6 class="fw-semi-bold mb-0"
                                style="position: relative; display: flex;justify-content: center">Subuh</h6>
                        </div>
                        <div class="card-body pb-1 pt-1" style="position: relative;text-align: center;">
                            <img src="{{ asset('img/masjid.png') }}"
                                class="img-fluid fit-cover rounded-1 absolute-sm-centered pb-2" style="max-width: 50px"
                                alt="">
                            <span class=""
                                style="font-size: 12px;position: relative; display: flex;justify-content: center">{{
                                $data['subuh'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2 mt-2 mb-2">
                    <div class="card bg-300">
                        <div class="card header bg-400">
                            <h6 class="fw-semi-bold mb-0"
                                style="position: relative; display: flex;justify-content: center">Dzuhur</h6>
                        </div>
                        <div class="card-body pb-1 pt-1" style="position: relative;text-align: center;">
                            <img src="{{ asset('img/masjid.png') }}"
                                class="img-fluid fit-cover rounded-1 absolute-sm-centered pb-2" style="max-width: 50px"
                                alt="">
                            <span class=""
                                style="font-size: 12px;position: relative; display: flex;justify-content: center">{{
                                $data['dzuhur'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2 mt-2 mb-2">
                    <div class="card bg-300">
                        <div class="card header bg-400">
                            <h6 class="fw-semi-bold mb-0"
                                style="position: relative; display: flex;justify-content: center">Ashar</h6>
                        </div>
                        <div class="card-body pb-1 pt-1" style="position: relative;text-align: center;">
                            <img src="{{ asset('img/masjid.png') }}"
                                class="img-fluid fit-cover rounded-1 absolute-sm-centered pb-2" style="max-width: 50px"
                                alt="">
                            <span class=""
                                style="font-size: 12px;position: relative; display: flex;justify-content: center">{{
                                $data['ashar'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2 mt-2 mb-2">
                    <div class="card bg-300">
                        <div class="card header bg-400">
                            <h6 class="fw-semi-bold mb-0"
                                style="position: relative; display: flex;justify-content: center">Maghrib</h6>
                        </div>
                        <div class="card-body pb-1 pt-1" style="position: relative;text-align: center;">
                            <img src="{{ asset('img/masjid.png') }}"
                                class="img-fluid fit-cover rounded-1 absolute-sm-centered pb-2" style="max-width: 50px"
                                alt="">
                            <span class=""
                                style="font-size: 12px;position: relative; display: flex;justify-content: center">{{
                                $data['maghrib'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2 mt-2 mb-2">
                    <div class="card bg-300">
                        <div class="card header bg-400">
                            <h6 class="fw-semi-bold mb-0"
                                style="position: relative; display: flex;justify-content: center">Isya</h6>
                        </div>
                        <div class="card-body pb-1 pt-1" style="position: relative;text-align: center;">
                            <img src="{{ asset('img/masjid.png') }}"
                                class="img-fluid fit-cover rounded-1 absolute-sm-centered pb-2" style="max-width: 50px"
                                alt="">
                            <span class=""
                                style="font-size: 12px;position: relative; display: flex;justify-content: center">{{
                                $data['isya'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>