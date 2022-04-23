  <!-- parent pages-->
  <a class="nav-link dropdown-indicator" href="#datadesa" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
    <div class="d-flex align-items-center">
        <span class="nav-link-icon">
            <span class="fas fa-outdent"></span>
        </span>
        <span class="nav-link-text ps-1">Data Desa</span>
    </div>
</a>
<ul class="nav collapse false" id="datadesa">
    
    <li class="nav-item {{ Request::is('/data-desa/data-pendidikan') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Data Pendidikan Ditempuh</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item {{ Request::is('/data-desa/data-pekerjaan') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Data Pekerjaan</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item {{ Request::is('/data-desa/data-agama') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Data Agama</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item {{ Request::is('/data-desa/data-jenis-kelamin') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Data Jenis Kelamin</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item {{ Request::is('/data-desa/data-golongan-darah') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Data Golongan Darah</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item {{ Request::is('/data-desa/data-kelompok-umur') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Data Kelompok Umur</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item {{ Request::is('/data-desa/data-penerima-bantuan') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Data Penerimaan Bantuan Penduduk</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
   
</ul>
