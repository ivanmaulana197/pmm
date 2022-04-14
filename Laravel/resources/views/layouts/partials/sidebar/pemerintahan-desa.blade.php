<!-- parent pages-->
<a class="nav-link dropdown-indicator" href="#pemerintahandesa" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
    <div class="d-flex align-items-center">
        <span class="nav-link-icon">
            <span class=" fas fa-user-tie"></span>
        </span>
        <span class="nav-link-text ps-1">Pemerintahan Desa</span>
    </div>
</a>
<ul class="nav collapse false" id="pemerintahandesa">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/pemerintahan-desa/visi-misi') ? 'active' : '' }}" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Visi dan Misi</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item">
        <a class="nav-link  {{ Request::is('/pemerintahan-desa/struktur-desa') ? 'active' : '' }}" href="../app/events/event-detail.html" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Sturktur Desa</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
</ul>