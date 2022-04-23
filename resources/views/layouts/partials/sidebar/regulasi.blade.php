<!-- parent pages-->
<a class="nav-link dropdown-indicator" href="#regulasi" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
    <div class="d-flex align-items-center">
        <span class="nav-link-icon">
            <span class=" far fa-file-alt"></span>
        </span>
        <span class="nav-link-text ps-1">Regulasi</span>
    </div>
</a>
<ul class="nav collapse false" id="regulasi">
    <li class="nav-item {{ Request::is('/regulasi/produk-hukum') ? 'active' : '' }}">
        <a class="nav-link" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Produk Hukum</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/regulasi/informasi-publik') ? 'active' : '' }}" href="../app/events/event-detail.html" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Informasi Publik</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
</ul>