<nav class="navbar navbar-light navbar-vertical navbar-glass navbar-expand-xl">
    @include('layouts.partials.scr.navbar_style')
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                <span class="navbar-toggle-icon">
                    <span class="toggle-line"></span>
                </span>
            </button>
        </div>

        <div class="navbar-brand py-2">
            <a href="/" class="gambar">
                <img src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" />
            </a>
            <a href="" class="desa"><span class="font-sans-serif" style="font-size: 16px;">Desa Tamiajeng</span></a>
            <a href="">
                <p class="text-500 fs--2" style="line-height: 20%">Kecamatan Trawas</p>
            </a>

        </div>

        

    </div>
    <div class="collapse navbar-collapse scrollbar" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                {{-- beranda --}}
                <li class="nav-item">
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="dashboard">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-home"></span>
                            </span>
                            <span class="nav-link-text ps-1">Beranda</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Menu Category</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="../app/calendar.html" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-calendar-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Calendar</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="../app/chat.html" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-comments"></span>
                            </span>
                            <span class="nav-link-text ps-1">Chat</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-envelope-open"></span>
                            </span>
                            <span class="nav-link-text ps-1">Profile Desa</span>
                        </div>
                    </a>
                    <ul class="nav collapse false" id="email">
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Profile Wilayah Desa</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Sejarah Desa</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-calendar-day"></span>
                            </span>
                            <span class="nav-link-text ps-1">Pemerintahan Desa</span>
                        </div>
                    </a>
                    <ul class="nav collapse false" id="events">
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Visi dan Misi</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../app/events/event-detail.html" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Sturktur Desa</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>


                </li>

            </ul>
        </div>
    </div>
</nav>

    