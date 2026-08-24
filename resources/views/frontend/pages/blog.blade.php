@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Blog</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html " class="hijau-1">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="hijau-1">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Blog</li>
                </ol>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <ul class="nav nav-pills row w-100 mb-3" id="pills-tab" role="tablist">

                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link active w-100 rounded-btn fw-bold" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        ALL
                    </button>
                </li>

                <li class="nav-item  col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        Trends
                    </button>
                </li>
                <li class="nav-item col-lg-2 " role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        Innovations
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        Regulation
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        Workshop
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        Asociation
                    </button>
                </li>
            </ul>
            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">

                        <div class="row mt-5 mb-5">
                            <div class="container-fluid counter py-5 rounded-image"
                                style="background: linear-gradient(rgba(0, 0, 0, 0.800), rgba(0, 0, 0, 0.800)), url({{ asset('frontend/img/jumbotron.webp') }}) center center; background-size: cover;">
                                <div class="text-left ms-4 me-4 " style="max-width: 800px;">
                                    <h1 class="text-uppercase text-white fw-bold">Profile Our Executive Team</h1>
                                    <p class="text-white mb-0">Meet the experienced leaders behind RPNP, driving innovation,
                                        collaboration, and sustainable solutions with expertise and a shared vision for a
                                        better future.
                                </div>

                            </div>
                        </div>
                        <div class="row justify-content-center ">
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-1.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-1.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-1.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-1.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">

                        <div class="row mt-5 mb-5">
                            <div class="container-fluid counter py-5 rounded-image"
                                style="background: linear-gradient(rgba(0, 0, 0, 0.800), rgba(0, 0, 0, 0.800)), url({{ asset('frontend/img/jumbotron.webp') }}) center center; background-size: cover;">
                                <div class="text-left ms-4 me-4 " style="max-width: 800px;">
                                    <h1 class="text-uppercase text-white fw-bold">Profile Our Staff</h1>
                                    <p class="text-white mb-0">Explore our professional team, bringing together experienced
                                        experts dedicated to delivering quality, innovative, and sustainable solutions for
                                        every
                                        project.

                                </div>

                            </div>
                        </div>
                        <div class="row justify-content-center ">
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-2.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-2.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-2.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 me-1 ms-1 d-flex justify-content-center">
                                <div class="portfolio-staff-card">

                                    <!-- Gambar -->
                                    <img src="{{ asset('frontend/img/volunteers-2.jpg') }}" class="portfolio-staff-img"
                                        alt="...">

                                    <!-- Overlay hitam 70% -->
                                    <div class="portfolio-overlay"></div>

                                    <!-- Konten di atas overlay -->
                                    <div class="portfolio-content">

                                        <div class="row h-100">

                                            <!-- Kolom kiri -->
                                            <div class="col-12 d-flex flex-column justify-content-between">
                                                <div>
                                                </div>

                                                <div class="portfolio-staff rounded-btn justify-content-center ">
                                                    <h4 class="text-white text-center fw-bold">Dr.Mariabel Isabela.ST.MT
                                                    </h4>
                                                    <small class="text-center">Urban Design, Greenship Associate</small>

                                                </div>

                                            </div>

                                            <!-- Kolom kanan -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
