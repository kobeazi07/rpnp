@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">About Us</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('HalamanHome') }} " class="hijau-1">Home</a></li>
                    <li class="breadcrumb-item active text-white">About Us</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-fluid about  py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5">
                    <div class="h-100">
                        <img src="{{ asset('frontend/img/about.jpeg') }}" class=" rounded-image img-fluid w-100 h-100"
                            alt="Image" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-xl-7">
                    <h5 class="text-uppercase hijau-1">About Us</h5>
                    <h1 class="mb-4 fw-bold">{{ $about->judul }}</h1>
                    <p class="fs-5 mb-4"> {!! str_replace('&nbsp;', ' ', $about->deskripsi) !!}
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Volunteers Start -->
    <div class="container-fluid  bg-hijau-2 py-5">
        <div class="container py-5">
            <div class="row mb-5">
                <h1 class="fw-bold text-white mb-4">VISI</h1>
                <div class="mb-4 about-description">
                    {!! str_replace('&nbsp;', ' ', $about->visi) !!}
                </div>
            </div>
            <div class="row ">
                <h1 class="fw-bold text-white mb-4">MISI</h1>
                <div class="mb-4 about-description">
                    {!! str_replace('&nbsp;', ' ', $about->misi) !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Volunteers End -->

    {{-- direksi --}}
    <section id = "ourteam" class="ourteam section">
        <div class="container mt-5 ">
            <div class="d-flex justify-content-center">
                <ul class="nav nav-pills row w-100 mb-3" id="pills-tab" role="tablist">

                    <li class="nav-item col-lg-6" role="presentation">
                        <button class="nav-link active w-100 rounded-btn fw-bold" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">
                            Direksi
                        </button>
                    </li>

                    <li class="nav-item col-lg-6" role="presentation">
                        <button class="nav-link w-100 rounded-btn fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">
                            Staff
                        </button>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">

                        <div class="row mt-5 mb-5">
                            <div class="container-fluid counter py-5 rounded-image"
                                style="background: linear-gradient(rgba(0, 0, 0, 0.800), rgba(0, 0, 0, 0.800)), url({{ asset('frontend/img/jumbotron.webp') }}) center center; background-size: cover;">
                                <div class="text-left ms-4 me-4 " style="max-width: 800px;">
                                    <h1 class="text-uppercase text-white fw-bold">Profile Our Executive Team</h1>
                                    <p class="text-white mb-0">Meet the experienced leaders behind RPNP, driving
                                        innovation,
                                        collaboration, and sustainable solutions with expertise and a shared vision for
                                        a
                                        better future.
                                </div>

                            </div>
                        </div>
                        <div class="row justify-content-center ">
                            @foreach ($staff as $dataStaff)
                                @if ($dataStaff->status == 'direksi')
                                    <div class="col-lg-3 mb-3 me-4  ms-4 d-flex justify-content-center">
                                        <button type="button" class="portfolio-staff-btn" data-bs-toggle="modal"
                                            data-bs-target="#staff-{{ $dataStaff->id }}">
                                            <div class="portfolio-staff-card">

                                                <!-- Gambar -->
                                                <img src="  {{ $dataStaff->foto }}" class="portfolio-staff-img"
                                                    alt="...">

                                                <!-- Overlay hitam 70% -->
                                                <div class="portfolio-overlay"></div>

                                                <!-- Konten di atas overlay -->
                                                <div class="portfolio-content">

                                                    <div class="row h-100">

                                                        <!-- Kolom kiri -->
                                                        <div class="col-12 d-flex flex-column justify-content-between">
                                                            <div class="d-flex justify-content-center">
                                                                <div class="col-6"></div>
                                                                <div class="col-6">
                                                                    <div
                                                                        class="detail-staff bg-hijau-1 rounded-btn d-flex align-items-center justify-content-center float-end">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            fill="currentColor" class="bi bi-eye-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                                            <path
                                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="portfolio-staff rounded-btn justify-content-center ">
                                                                <h4 class="text-white text-center fw-bold">
                                                                    {{ $dataStaff->nama_lengkap }}
                                                                </h4>
                                                                <small class="text-center">
                                                                    {{ $dataStaff->jabatan }}</small>

                                                            </div>

                                                        </div>

                                                        <!-- Kolom kanan -->


                                                    </div>

                                                </div>

                                            </div>
                                        </button>

                                        {{-- modal direksi --}}
                                        <div class="modal fade " id="staff-{{ $dataStaff->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div
                                                                class="col-lg-4 col-12 mb-3 d-flex justify-content-center align-items-center">
                                                                <img src="{{ $dataStaff->foto }}"
                                                                    class="portfolio-staff-img-detail rounded-image"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-lg-8 col-12 mb-3">
                                                                <h4 class="fw-bold">{{ $dataStaff->nama_lengkap }}</h4>
                                                                <p>{{ $dataStaff->jabatan }}</p>
                                                                <p> {!! str_replace('&nbsp;', ' ', $dataStaff->deskripsi) !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn bg-hijau-1 text-white rounded-btn"
                                                            data-bs-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- akhir modal direksi --}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">

                        <div class="row mt-5 mb-5">
                            <div class="container-fluid counter py-5 rounded-image"
                                style="background: linear-gradient(rgba(0, 0, 0, 0.800), rgba(0, 0, 0, 0.800)), url({{ asset('frontend/img/jumbotron.webp') }}) center center; background-size: cover;">
                                <div class="text-left ms-4 me-4 " style="max-width: 800px;">
                                    <h1 class="text-uppercase text-white fw-bold">Profile Our Staff</h1>
                                    <p class="text-white mb-0">Explore our professional team, bringing together
                                        experienced
                                        experts dedicated to delivering quality, innovative, and sustainable solutions
                                        for
                                        every
                                        project.

                                </div>

                            </div>
                        </div>
                        <div class="row justify-content-center row g-4">
                            @foreach ($staff as $dataStaff)
                                @if ($dataStaff->status == 'staff')
                                    <div class="col-lg-3 mb-3 me-4 ms-4 d-flex justify-content-center">
                                        <button type="button" class="portfolio-staff-btn" data-bs-toggle="modal"
                                            data-bs-target="#staff-{{ $dataStaff->id }}">
                                            <div class="portfolio-staff-card">

                                                <!-- Gambar -->
                                                <img src="{{ $dataStaff->foto }}" class="portfolio-staff-img"
                                                    alt="...">

                                                <!-- Overlay hitam 70% -->
                                                <div class="portfolio-overlay"></div>

                                                <!-- Konten di atas overlay -->
                                                <div class="portfolio-content">

                                                    <div class="row h-100">

                                                        <!-- Kolom kiri -->
                                                        <div class="col-12 d-flex flex-column justify-content-between">
                                                            <div class="d-flex justify-content-center">
                                                                <div class="col-6"></div>
                                                                <div class="col-6">
                                                                    <div
                                                                        class="detail-staff bg-hijau-1 rounded-btn d-flex align-items-center justify-content-center float-end">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            fill="currentColor" class="bi bi-eye-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                                            <path
                                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="portfolio-staff rounded-btn justify-content-center ">
                                                                <h4 class="text-white text-center fw-bold">
                                                                    {{ $dataStaff->nama_lengkap }}
                                                                </h4>
                                                                <small class="text-center">
                                                                    {{ $dataStaff->jabatan }}</small>

                                                            </div>

                                                        </div>

                                                        <!-- Kolom kanan -->


                                                    </div>

                                                </div>

                                            </div>
                                        </button>
                                    </div>
                                    {{-- modal staff --}}
                                    <div class="modal fade " id="staff-{{ $dataStaff->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 col-12 mb-3 d-flex justify-content-center align-items-center">
                                                            <img src="{{ $dataStaff->foto }}"
                                                                class="portfolio-staff-img-detail rounded-image"
                                                                alt="">
                                                        </div>
                                                        <div class="col-lg-8 col-12 mb-3">
                                                            <h4 class="fw-bold">{{ $dataStaff->nama_lengkap }}</h4>
                                                            <p>{{ $dataStaff->jabatan }}</p>
                                                            <p> {!! str_replace('&nbsp;', ' ', $dataStaff->deskripsi) !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-hijau-1 text-white rounded-btn"
                                                        data-bs-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- akhir modal staff --}}
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- diireksi end --}}

    {{-- lets find us --}}
    <div class="container py-5 mt-5">
        <div class="container  rounded-image bg-hijau-1 mt-5">
            <div class="row p-3 ">
                <div class="col-lg-6 col-12 mb-3 mt-3">
                    <div class="google-map">
                        {!! $setting->embed_gmaps !!}
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-3 mt-3 d-flex flex-column justify-content-center">
                    <h1 class="fw-bold text-white  ">Let’s Find Us on</h1>
                    <h3 class=" text-white   ">{{ $setting->alamat }}</h3>

                    <div class="row d-flex justify-content-right">
                        <a class="btn-hover-border rounded-btn mt-3 btn bg-putih1 hijau-1 py-2 px-4"
                            href="{{ $setting->link_gmaps }}">
                            <i class="fas fa-map-marker-alt hijau-1 me-2"></i>Open Maps</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- Lets find us --}}
@endsection
