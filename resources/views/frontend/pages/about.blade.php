@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">About Us</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html " class="hijau-1">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="hijau-1">Pages</a></li>
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
                        <img src="{{ asset('frontend/img/about.png') }}" class=" rounded-image img-fluid w-100 h-100"
                            alt="Image" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-xl-7">
                    <h5 class="text-uppercase hijau-1">About Us</h5>
                    <h1 class="mb-4 fw-bold">PT. RPNP Desain Hijau Indonesia</h1>
                    <p class="fs-5 mb-4"> PT. RPNP Desain Hijau Indonesia merupakan Konsultan Konstruksi dan Non-Konstruksi
                        yang berfokus pada Konsultansi Bangunan Hijau dan Sustainable Energy Managemen
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
                <h4 class="text-white"> To create a sustainable future by pioneering innovative, energy-efficient and
                    environmentally friendly building solutions that are in harmony with nature and improve the quality of
                    life for future generations.</h4>
            </div>
            <div class="row ">
                <h1 class="fw-bold text-white mb-4">MISI</h1>
                <ul class="text-white">
                    <li>
                        <strong>Creative Design:</strong> We’re committed to designing buildings that are both beautiful and
                        sustainable, using innovative approaches to make energy-efficient spaces that people love to live
                        and work in.
                    </li>

                    <li>
                        <strong>Sustainable Solutions:</strong> Our goal is to lead the way in green building, offering
                        practical solutions that reduce environmental impact and promote long-term sustainability.
                    </li>

                    <li>
                        <strong>Client Partnership:</strong> We work hand-in-hand with our clients, listening to their needs
                        and tailoring our services to create spaces that reflect their vision while also being
                        environmentally responsible.
                    </li>

                    <li>
                        <strong>Holistic Approach:</strong> By combining architecture, engineering, and planning, we create
                        integrated solutions that make buildings not just green, but also adaptable and ready for the
                        future.
                    </li>

                    <li>
                        <strong>Quality and Integrity:</strong> We strive to deliver excellent work, always with an eye on
                        quality and a commitment to doing the right thing for both our clients and the planet.
                    </li>

                    <li>
                        <strong>Inspiring Change:</strong> We believe in the power of example, inspiring others to embrace
                        sustainable practices through our dedication to green building and education.
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Volunteers End -->

    {{-- direksi --}}
    <section id = "team">
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
    </section>
    {{-- diireksi end --}}

    {{-- lets find us --}}
    <div class="container py-5 mt-5">
        <div class="container  rounded-image bg-hijau-1 mt-5">
            <div class="row p-3 ">
                <div class="col-lg-6 mb-3 mt-3 rounded-image">
                    <iframe class="rounded-image"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8176290864735!2d109.28335527619711!3d-0.03372723554226409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5900352a8487%3A0xcc25715cdad765ce!2sRPNP%20%26%20URBELCO%20STUDIO!5e0!3m2!1sid!2sid!4v1787533456052!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
                <div class="col-lg-6 mb-3 mt-3 d-flex flex-column justify-content-center">
                    <h1 class="fw-bold text-white  ">Let’s Find Us on</h1>
                    <h3 class=" text-white   ">No.38 B, Komplek Harmoni Indah, Jl. Husein Hamzah, Pal Lima,
                        Pontianak Barat, Pontianak, West Kalimantan 78114</h3>

                    <div class="row d-flex justify-content-right">
                        <a class="btn-hover-border rounded-btn mt-3 btn bg-putih1 hijau-1 py-2 px-4" href="#">
                            <i class="fas fa-map-marker-alt hijau-1 me-2"></i>Open Maps</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- Lets find us --}}
@endsection
