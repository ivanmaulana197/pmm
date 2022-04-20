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
                <img src="https://tamiajeng.my.id/desa/logo/Desain__sid__fFcxJnC.png" alt="" width="40" />
            </a>
            <a href="/" class="desa"><span class="font-sans-serif" style="font-size: 16px;">Desa Tamiajeng</span></a>
            <a href="/">
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
                    <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="/admin" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-home"></span>
                            </span>
                            <span class="nav-link-text ps-1">Dashboard</span>
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

                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#pemerintahandesa" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class=" fas fa-user-tie"></span>
                            </span>
                            <span class="nav-link-text ps-1">Info Desa</span>
                        </div>
                    </a>
                    <ul class="nav collapse false" id="pemerintahandesa">
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('admin/info-desa/identitas-desa') ? 'active' : '' }}" href="{{ route('identitas-desa') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Identitas Desa</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('admin/info-desa/aparatur') ? 'active' : '' }}" href="{{ route('aparatur.index') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Aparatur Desa</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('admin/info-desa/pemerintahan-desa') ? 'active' : '' }}" href="{{ route('pemerintahan-desa') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pemerintahan Desa</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->
                    <a class="nav-link  {{ Request::is('admin/berita') ? 'active' : '' }}" href="/admin/berita" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-comments"></span>
                            </span>
                            <span class="nav-link-text ps-1">Berita</span>
                        </div>
                    </a>
                    <a class="nav-link {{ Request::is('admin/lapak-desa') ? 'active' : '' }}" href="{{ route('lapak-desa.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-comments"></span>
                            </span>
                            <span class="nav-link-text ps-1">Lapak Desa</span>
                        </div>
                    </a>
                    <a class="nav-link {{ Request::is('admin/proyek-desa') ? 'active' : '' }}" href="{{ route('proyek-desa.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-comments"></span>
                            </span>
                            <span class="nav-link-text ps-1">Proyek Desa</span>
                        </div>
                    </a>
                    <a class="nav-link {{ Request::is('admin/pengaduan') ? 'active' : '' }}" href="{{ route('pengaduan') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-comments"></span>
                            </span>
                            <span class="nav-link-text ps-1">Pengaduan</span>
                        </div>
                    </a>

                </li>

            </ul>
        </div>
    </div>
</nav>
