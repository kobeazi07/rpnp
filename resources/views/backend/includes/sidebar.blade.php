  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
              {{-- <i class="fas fa-laugh-wink"></i> --}}
          </div>
          <div class="sidebar-brand-text text-left mx-3">Admin Bang Uco </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ Route::is('HalamanDashboard') ? 'active' : '' }}">
          <a class="nav-link" href="{{ Route('HalamanDashboard') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdminAbout') ? 'active' : '' }}">
          <a class="nav-link" href="{{ Route('HalamanAdminAbout') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>About</span></a>
      </li>
      <li class="nav-item {{ Route::is('HalamanAdminpartner') ? 'active' : '' }}">
          <a class="nav-link" href="{{ Route('HalamanAdminpartner') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Partner</span></a>
      </li>
      <li class="nav-item {{ Route::is('HalamanAdminservices') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdminservices') }}">
              <i class="fas fa-fw fa-concierge-bell"></i>
              <span>Services</span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdmintestimoni') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdmintestimoni') }}">
              <i class="fas fa-fw fa-comments"></i>
              <span>Testimoni</span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdminklasifikasi') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdminklasifikasi') }}">
              <i class="fas fa-fw fa-list"></i>
              <span>Klasifikasi</span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdmingaleri') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdmingaleri') }}">
              <i class="fas fa-fw fa-images"></i>
              <span>Galeri</span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdminstaff') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdminstaff') }}">
              <i class="fas fa-fw fa-users"></i>
              <span>Staff</span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdminkategori_career') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdminkategori_career') }}">
              <i class="fas fa-fw fa-tags"></i>
              <span>Kategori Career</span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdminbuilding_type') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdminbuilding_type') }}">
              <i class="fas fa-fw fa-building"></i>
              <span>Building Type</span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('HalamanAdminkategori_blog') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('HalamanAdminkategori_blog') }}">
              <i class="fas fa-fw fa-folder"></i>
              <span>Kategori Blog</span>
          </a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- Nav Item - Pages Collapse Menu -->
      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      {{-- <li class="nav-item {{ Route::is('HalamanPortfolio') ? 'active' : '' }}">
          <a class="nav-link" href="{{ Route('HalamanPortfolio') }}">
              <i class="fas fa-fw fa-table"></i>
              <span>Portfolio</span></a>
      </li>
      <li class="nav-item {{ Route::is('HalamanAbout') ? 'active' : '' }}">
          <a class="nav-link" href="{{ Route('HalamanAbout') }}">
              <i class="fas fa-fw fa-table"></i>
              <span>About</span></a>
      </li> --}}


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <!-- Sidebar Message -->
      {{-- <div class="sidebar-card d-none d-lg-flex">
            <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
            <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and
                more!</p>
            <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
        </div> --}}

  </ul>
