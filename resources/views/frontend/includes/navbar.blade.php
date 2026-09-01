  <div class="container-fluid fixed-top px-0">
      @php
          $setting = App\Models\Setting::first();
      @endphp
      <div class="container px-0">
          <div class="topbar hijau-1">
              <div class="row align-items-center justify-content-center">
                  <div class="col-md-8">
                      <div class="topbar-info d-flex flex-wrap">
                          <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $setting->email }}"
                              class="text-light me-4"><i
                                  class="fas fa-envelope text-white me-2 ">{{ $setting->email }}</i></a>
                          <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/^0/', '62', $setting->no_wa) }}&text={{ $setting->text_wa }}"
                              class="text-light"><i
                                  class="fas fa-phone-alt text-white me-2"></i>{{ $setting->no_wa }}</a>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="topbar-icon d-flex align-items-center justify-content-end">
                          <a href="{{ $setting->link_facebook }}" class="btn-square text-white me-2"><i
                                  class="fab fa-facebook-f"></i></a>
                          <a href="{{ $setting->link_instagram }}" class="btn-square text-white me-2"><i
                                  class="fab fa-instagram"></i></a>
                          <a href="{{ $setting->link_tiktok }}" class="btn-square text-white me-2"><i
                                  class="fab fa-tiktok"></i></a>
                          <a href="{{ $setting->link_linkedin }}" class="btn-square text-white me-0"><i
                                  class="fab fa-linkedin-in"></i></a>
                      </div>
                  </div>
              </div>
          </div>
          <nav class="navbar navbar-light bg-light navbar-expand-xl rounded-nav">
              <a href="{{ route('HalamanHome') }}" class="navbar-brand ms-5 mb-2 mt-2 w-25">
                  <img src="{{ asset('frontend/img/logorpnp.png') }}" class="w-25" alt="">
                  {{-- <h1 class="text-primary display-5">Environs</h1> --}}
              </a>
              <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarCollapse">
                  <span class="fa fa-bars text-primary"></span>
              </button>
              <div class="collapse navbar-collapse bg-light rounded-10"
                  style="border-radius: 0px 0px 15px 15px !important;" id="navbarCollapse">
                  <div class="navbar-nav ms-auto">
                      <a href="{{ route('HalamanHome') }}"
                          class="nav-item nav-link {{ Route::is('HalamanHome') ? 'active' : '' }}">
                          Home
                      </a>

                      <a href="{{ route('HalamanAbout') }}"
                          class="nav-item nav-link {{ Route::is('HalamanAbout') ? 'active' : '' }}">
                          About
                      </a>

                      <a href="{{ route('HalamanAbout') }}#ourteam"
                          class="nav-item nav-link {{ Route::is('HalamanAbout') ? 'active' : '' }}">
                          Our Team
                      </a>

                      <a href="{{ route('HalamanHome') }}#portfolio"
                          class="nav-item nav-link {{ Route::is('HalamanHome') ? 'active' : '' }}">
                          Portfolio
                      </a>

                      <a href="{{ route('HalamanCarerr') }}"
                          class="nav-item nav-link {{ Route::is('HalamanCarerr') ? 'active' : '' }}">
                          Career
                      </a>

                      <a href="{{ route('HalamanBlog') }}"
                          class="nav-item nav-link {{ Route::is('HalamanBlog') ? 'active' : '' }}">
                          Blog
                      </a>


                  </div>
                  <div class="d-flex align-items-center flex-nowrap pt-xl-0" style="margin-left: 15px;">
                      <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/^0/', '62', $setting->no_wa) }}&text={{ $setting->text_wa }}"
                          class="btn-hover-bg btn bg-hijau-1 text-white py-2 px-4 me-3 rounded-btn">Lets
                          Talk!</a>
                  </div>
              </div>
          </nav>
      </div>
  </div>
