  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
              {{-- <i class="fas fa-laugh-wink"></i> --}}
          </div>
          <div class="sidebar-brand-text text-left mx-3">Admin RPNP </div>
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
      <li class="nav-item">

          <a class="nav-link {{ Route::is(
              'HalamanAdminpartner',
              'HalamanAdminservices',
              'HalamanAdmintestimoni',
              'HalamanAdminklasifikasi',
              'HalamanAdmingaleri',
              'HalamanAdminstaff',
              'HalamanAdminkategori_career',
              'HalamanAdminbuilding_type',
              'HalamanAdminkategori_blog',
              'HalamanAdminkategori_portfolio',
          )
              ? ''
              : 'collapsed' }}"
              href="#" data-toggle="collapse" data-target="#collapseMasterData"
              aria-expanded="{{ Route::is(
                  'HalamanAdminpartner',
                  'HalamanAdminservices',
                  'HalamanAdmintestimoni',
                  'HalamanAdminklasifikasi',
                  'HalamanAdmingaleri',
                  'HalamanAdminstaff',
                  'HalamanAdminkategori_career',
                  'HalamanAdminbuilding_type',
                  'HalamanAdminkategori_blog',
                  'HalamanAdminkategori_portfolio',
              )
                  ? 'true'
                  : 'false' }}"
              aria-controls="collapseMasterData">

              <i class="fas fa-fw fa-database"></i>
              <span>Master Data</span>

          </a>


          <div id="collapseMasterData"
              class="collapse {{ Route::is(
                  'HalamanAdminpartner',
                  'HalamanAdminservices',
                  'HalamanAdmintestimoni',
                  'HalamanAdminklasifikasi',
                  'HalamanAdmingaleri',
                  'HalamanAdminstaff',
                  'HalamanAdminkategori_career',
                  'HalamanAdminbuilding_type',
                  'HalamanAdminkategori_blog',
                  'HalamanAdminkategori_portfolio',
              )
                  ? 'show'
                  : '' }}"
              aria-labelledby="headingMasterData" data-parent="#accordionSidebar">

              <div class="bg-white py-2 collapse-inner rounded">

                  <h6 class="collapse-header">
                      Master:
                  </h6>


                  {{-- Partner --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminpartner') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminpartner') }}">

                      <i class="fas fa-fw fa-handshake mr-2"></i>
                      Partner

                  </a>


                  {{-- Services --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminservices') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminservices') }}">

                      <i class="fas fa-fw fa-concierge-bell mr-2"></i>
                      Services

                  </a>


                  {{-- Testimoni --}}
                  <a class="collapse-item {{ Route::is('HalamanAdmintestimoni') ? 'active' : '' }}"
                      href="{{ route('HalamanAdmintestimoni') }}">

                      <i class="fas fa-fw fa-comments mr-2"></i>
                      Testimoni

                  </a>


                  {{-- Klasifikasi --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminklasifikasi') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminklasifikasi') }}">

                      <i class="fas fa-fw fa-list mr-2"></i>
                      Klasifikasi

                  </a>


                  {{-- Galeri --}}
                  <a class="collapse-item {{ Route::is('HalamanAdmingaleri') ? 'active' : '' }}"
                      href="{{ route('HalamanAdmingaleri') }}">

                      <i class="fas fa-fw fa-images mr-2"></i>
                      Galeri

                  </a>


                  {{-- Staff --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminstaff') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminstaff') }}">

                      <i class="fas fa-fw fa-users mr-2"></i>
                      Staff

                  </a>


                  {{-- Kategori Career --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminkategori_career') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminkategori_career') }}">

                      <i class="fas fa-fw fa-tags mr-2"></i>
                      Kategori Career

                  </a>


                  {{-- Building Type --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminbuilding_type') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminbuilding_type') }}">

                      <i class="fas fa-fw fa-building mr-2"></i>
                      Building Type

                  </a>


                  {{-- Kategori Blog --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminkategori_blog') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminkategori_blog') }}">

                      <i class="fas fa-fw fa-folder mr-2"></i>
                      Kategori Blog

                  </a>
                  <a class="collapse-item {{ Route::is('HalamanAdminportfolio') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminkategori_portfolio') }}">

                      <i class="fas fa-fw fa-folder mr-2"></i>
                      Kategori Portfolio

                  </a>

              </div>

          </div>

      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- Nav Item - Pages Collapse Menu -->
      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">

          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContent"
              aria-expanded="false" aria-controls="collapseContent">

              <i class="fas fa-fw fa-folder"></i>

              <span>Content Management</span>

          </a>

          <div id="collapseContent" class="collapse" aria-labelledby="headingContent" data-parent="#accordionSidebar">

              <div class="bg-white py-2 collapse-inner rounded">

                  <h6 class="collapse-header">
                      Content:
                  </h6>

                  {{-- Career --}}
                  <a class="collapse-item {{ Route::is('HalamanAdmincareer') ? 'active' : '' }}"
                      href="{{ route('HalamanAdmincareer') }}">

                      <i class="fas fa-fw fa-briefcase mr-2"></i>
                      Career

                  </a>

                  {{-- Portfolio --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminportfolio') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminportfolio') }}">

                      <i class="fas fa-fw fa-project-diagram mr-2"></i>
                      Portfolio

                  </a>

                  {{-- Blog --}}
                  <a class="collapse-item {{ Route::is('HalamanAdminblog') ? 'active' : '' }}"
                      href="{{ route('HalamanAdminblog') }}">

                      <i class="fas fa-fw fa-blog mr-2"></i>
                      Blog

                  </a>

              </div>

          </div>

      </li>
      <!-- Nav Item - Tables -->

      {{-- <li class="nav-item {{ Route::is('HalamanAbout') ? 'active' : '' }}">
          <a class="nav-link" href="{{ Route('HalamanAbout') }}">
              <i class="fas fa-fw fa-table"></i>
              <span>About</span></a>
      </li>  --}}


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
