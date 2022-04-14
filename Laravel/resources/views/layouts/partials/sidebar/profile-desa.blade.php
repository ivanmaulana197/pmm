<!-- parent pages-->
<a class="nav-link dropdown-indicator" href="#profiledesa" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
    <div class="d-flex align-items-center">
        <span class="nav-link-icon">
            <span class="fas fa-portrait"></span>
        </span>
        <span class="nav-link-text ps-1">Profile Desa</span>
    </div>
</a>
<ul class="nav collapse false" id="profiledesa">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/profile-desa/profile-wilayah') ? 'active' : '' }}" href="#" aria-expanded="false">
            <div class="d-flex align-items-center">
                <span class="nav-link-text ps-1">Profile Wilayah Desa</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/profile-desa/sejarah-desa') ? 'active' : '' }}" href="#" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Sejarah Desa</span>
            </div>
        </a>
        <!-- more inner pages-->
    </li>
</ul>