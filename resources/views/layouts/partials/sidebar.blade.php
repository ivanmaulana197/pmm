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
            <a href="{{ route('home') }}" class="gambar">
                <img src="https://tamiajeng.my.id/desa/logo/Desain__sid__fFcxJnC.png" alt="" width="40" />
            </a>
            <a href="{{ route('home', []) }}" class="desa"><span class="font-sans-serif" style="font-size: 16px;">Desa Tamiajeng</span></a>
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
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" role="button" aria-expanded="false">
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

                   @include('layouts.partials.sidebar.aparatur-desa')
                    
                   @include('layouts.partials.sidebar.profile-desa')
                   {{-- @include('layouts.partials.sidebar.data-desa') --}}
                   @include('layouts.partials.sidebar.pemerintahan-desa')
                   {{-- @include('layouts.partials.sidebar.regulasi') --}}
                    
                    <!-- parent pages-->
                    <a class="nav-link {{ Request::is('lapak-desa*') ? 'active' : '' }}" href="{{ route('lapak-desa-home') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-store"></span>
                            </span>
                            <span class="nav-link-text ps-1">Lapak Desa</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link {{ Request::is('proyek-desa*') ? 'active' : '' }}" href="{{ route('proyek-desa-home') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-people-carry"></span>
                            </span>
                            <span class="nav-link-text ps-1">Proyek Desa</span>
                        </div>
                    </a>

                </li>

            </ul>
        </div>
    </div>
</nav>
