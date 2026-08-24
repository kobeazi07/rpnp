@extends('frontend.layouts.index')

@section('konten')
    <!-- Carousel Start -->
    <div class="container-fluid carousel-header vh-100 px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active">
                    <img src="{{ asset('frontend/img/h-jumbo.webp') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">

                            <h1 class="text-header-1 fw-bold text-capitalize text-white mb-4">INNOVATION SOLUTION FOR
                                SUSTAINABLE
                                LIVING
                            </h1>
                            <p class="mb-5 fs-5">We help businesses and organizations build smarter, greener, and more
                                sustainable solutions through Greenship & EDGE, Sustainable Energy Resource, BIM (Building
                                Information Modeling), PBG, and SLF consulting services.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn rounded-btn bg-hijau-1 text-white py-3 px-5" href="#">Join
                                    With
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid about  py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col  -xl-5">
                    <div class="h-100 ">
                        <img src="{{ asset('frontend/img/about.png') }}" class=" rounded-image img-fluid w-100 h-100"
                            alt="Image" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-xl-7">

                    <h2 class="mb-4">Our goal is a ustainable future for people and nature</h2>
                    <p class="fs-5 mb-4">Our goal is a sustainable future for people and nature. Discover who we are and how
                        our vision and mission inspire us to create innovative, sustainable, and environmentally responsible
                        solutions for a better future.

                    </p>
                    <div class="tab-class bg-hijau-3 rounded-image p-4">
                        <ul class="nav d-flex mb-2">
                            <li class="nav-item mb-3">
                                <a class="rounded-btn btn-hover-border d-flex py-2 text-center bg-white active"
                                    data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 150px;">About</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="rounded-btn btn-hover-border d-flex py-2 mx-3 text-center bg-white"
                                    data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 150px;">Vission</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="rounded-btn btn-hover-border d-flex py-2 text-center bg-white"
                                    data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 150px;">Mission</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase text-white fw-bold  mb-3">PT. RPNP Desain Hijau
                                                    Indonesia
                                                </h5>
                                                <p class="mb-4 text-white">Lorem Ipsum is simply dummy text of the printing
                                                    and
                                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type and scrambled it to make a type specimen book. It has
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-border rounded-btn btn bg-hijau-1 text-white py-2 px-4"
                                                        href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase text-white fw-bold  mb-3">PT. RPNP Desain Hijau
                                                    Indonesia 2
                                                </h5>
                                                <p class="mb-4 text-white">Lorem Ipsum is simply dummy text of the printing
                                                    and
                                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type and scrambled it to make a type specimen book. It has
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-border rounded-btn btn bg-hijau-1 text-white py-2 px-4"
                                                        href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase text-white fw-bold  mb-3">PT. RPNP Desain Hijau
                                                    Indonesia 3
                                                </h5>
                                                <p class="mb-4 text-white">Lorem Ipsum is simply dummy text of the printing
                                                    and
                                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type and scrambled it to make a type specimen book. It has
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-border rounded-btn btn bg-hijau-1 text-white py-2 px-4"
                                                        href="#">Read More</a>
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
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid service py-5 bg-hijau-1">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase putih1">What we do</h5>
                <h1 class="mb-0 putih1 fw-bold">Smarter by Design, Sustainable by Purpose, Compliant by Standard</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item rounded-image">
                        <img src="{{ asset('frontend/img/wwd-1.webp') }}" class="img-fluid w-100 wwd-img "
                            alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0 fw-bold">Greenship & Edge</a>
                        </div>
                    </div>
                    <p class="my-4 text-white">Kami membantu Anda dalam proses sertifikasi bangunan hijau melalui skema
                        Greenship dan EDGE, Sistem sertifikasi bangunan hijau adalah serangkaian sistem dan alat
                        pemeringkatan yang digunakan untuk menilai kinerja bangunan atau proyek konstruksi dari perspektif
                        keberlanjutan dan lingkungan.
                    </p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item rounded-image">
                        <img src="{{ asset('frontend/img/wwd-2.webp') }}" class="img-fluid w-100 wwd-img" alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0 fw-bold"> Sustainable Energy
                                Resource</a>
                        </div>
                    </div>
                    <p class="my-4 text-white">Mengembangkan rencana energi yang komprehensif, termasuk pemilihan teknologi
                        energi terbarukan yang sesuai
                    </p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item rounded-image">
                        <img src="{{ asset('frontend/img/wwd-3.webp') }}" class="img-fluid w-100 wwd-img" alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0 fw-bold">BIM (Building
                                Information Modeling)</a>
                        </div>
                    </div>
                    <p class="my-4 text-white">Sistem terintegrasi yang berfungsi untuk mengelola digitalisasi bangunan dan
                        infrastruktur, mensimulasikan seluruh informasi pada sebuah proyek pembangunan ke dalam model 3
                        dimensi.
                    </p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item rounded-image">
                        <img src="{{ asset('frontend/img/wwd-4.webp') }}" class="img-fluid w-100 wwd-img" alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0 fw-bold">PBG dan SLF</a>
                        </div>
                    </div>
                    <p class="my-4 text-white">kami adalah konsultan perizinan yang dapat membantu Anda mengatasi semua
                        tantangan terkait dengan perizinan bangunan dan lingkungan
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- portfolio Start -->
    <div class="container-fluid counter py-5"
        style="background: linear-gradient(rgba(0, 0, 0, 0.800), rgba(0, 0, 0, 0.800)), url({{ asset('frontend/img/jumbotron.webp') }}) center center; background-size: cover;">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary fw-bold">Portfolio</h5>
                <p class="text-white mb-0">Explore our previous projects, where expertise, innovation, and sustainable
                    solutions come together to deliver impactful results for our clients.
                </p>
            </div>
            <div class="row g-4">

                <!-- Kolom 1 -->
                <div class="col-md-2 col-lg-2 col-xl-2 year-column ">
                    <div class="tab-class p-4">

                        <ul class="nav d-flex flex-column mb-2 year-nav">

                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 justify-content-center  text-center bg-transparent active"
                                    data-bs-toggle="pill" href="#tab-1">
                                    <h1 class="text-white" style="width: 150px;">2026</h1>
                                </a>
                            </li>

                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 justify-content-center  text-center bg-transparent"
                                    data-bs-toggle="pill" href="#tab-2">
                                    <h1 class="text-white" style="width: 150px;">2025</h1>
                                </a>
                            </li>

                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 justify-content-center  text-center bg-transparent"
                                    data-bs-toggle="pill" href="#tab-3">
                                    <h1 class="text-white" style="width: 150px;">2022</h1>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

                <!-- Kolom 3 -->
                <div class="col-md-9 col-lg-9 col-xl-9">
                    <div class="tab-content ">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row">
                                {{-- <div class="col-md-4 mb-3 me-3">
                                    <div class="portfolio-card" style="width: 21rem; ">
                                        <img src="{{ asset('frontend/img/c_portfolio.webp') }}" class="card-img-top"
                                            alt="..." style ="height:13rem !important;  object-fit:cover;">
                                    </div>

                                </div> --}}
                                <div class="col-md-4 mb-3 me-3">
                                    <div class="portfolio-card">

                                        <!-- Gambar -->
                                        <img src="{{ asset('frontend/img/c_portfolio.webp') }}" class="portfolio-img"
                                            alt="...">

                                        <!-- Overlay hitam 70% -->
                                        <div class="portfolio-overlay"></div>

                                        <!-- Konten di atas overlay -->
                                        <div class="portfolio-content">

                                            <div class="row h-100">

                                                <!-- Kolom kiri -->
                                                <div class="col-8 d-flex flex-column justify-content-between">

                                                    <div>
                                                        <p class="text-white mb-0 fw-bold">
                                                            Building Type: Health Building
                                                        </p>
                                                    </div>

                                                    <div class="portfolio-title rounded-btn ">
                                                        <small>SLE</small>
                                                        <h4 class="text-white fw-bold">Judulnya</h4>
                                                    </div>

                                                </div>

                                                <!-- Kolom kanan -->
                                                <div
                                                    class="col-4 d-flex flex-column align-items-end justify-content-between">

                                                    <span class="portfolio-number">
                                                        1
                                                    </span>

                                                    <a href="#" class="portfolio-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row">
                                <div class="col-md-4 mb-3 me-3">
                                    <div class="portfolio-card">

                                        <!-- Gambar -->
                                        <img src="{{ asset('frontend/img/c_portfolio.webp') }}" class="portfolio-img"
                                            alt="...">

                                        <!-- Overlay hitam 70% -->
                                        <div class="portfolio-overlay"></div>

                                        <!-- Konten di atas overlay -->
                                        <div class="portfolio-content">

                                            <div class="row h-100">

                                                <!-- Kolom kiri -->
                                                <div class="col-8 d-flex flex-column justify-content-between">

                                                    <div>
                                                        <p class="text-white mb-0 fw-bold">
                                                            Building Type: Health Building
                                                        </p>
                                                    </div>

                                                    <div class="portfolio-title rounded-btn ">
                                                        <small>SLE</small>
                                                        <h4 class="text-white fw-bold">Judulnya</h4>
                                                    </div>

                                                </div>

                                                <!-- Kolom kanan -->
                                                <div
                                                    class="col-4 d-flex flex-column align-items-end justify-content-between">

                                                    <span class="portfolio-number">
                                                        1
                                                    </span>

                                                    <a href="#" class="portfolio-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 me-3">
                                    <div class="portfolio-card">

                                        <!-- Gambar -->
                                        <img src="{{ asset('frontend/img/c_portfolio.webp') }}" class="portfolio-img"
                                            alt="...">

                                        <!-- Overlay hitam 70% -->
                                        <div class="portfolio-overlay"></div>

                                        <!-- Konten di atas overlay -->
                                        <div class="portfolio-content">

                                            <div class="row h-100">

                                                <!-- Kolom kiri -->
                                                <div class="col-8 d-flex flex-column justify-content-between">

                                                    <div>
                                                        <p class="text-white mb-0 fw-bold">
                                                            Building Type: Health Building
                                                        </p>
                                                    </div>

                                                    <div class="portfolio-title rounded-btn ">
                                                        <small>SLE</small>
                                                        <h4 class="text-white fw-bold">Judulnya</h4>
                                                    </div>

                                                </div>

                                                <!-- Kolom kanan -->
                                                <div
                                                    class="col-4 d-flex flex-column align-items-end justify-content-between">

                                                    <span class="portfolio-number">
                                                        1
                                                    </span>

                                                    <a href="#" class="portfolio-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-3 me-3">
                                            <div class="portfolio-card">

                                                <!-- Gambar -->
                                                <img src="{{ asset('frontend/img/c_portfolio.webp') }}"
                                                    class="portfolio-img" alt="...">

                                                <!-- Overlay hitam 70% -->
                                                <div class="portfolio-overlay"></div>

                                                <!-- Konten di atas overlay -->
                                                <div class="portfolio-content">

                                                    <div class="row h-100">

                                                        <!-- Kolom kiri -->
                                                        <div class="col-8 d-flex flex-column justify-content-between">

                                                            <div>
                                                                <p class="text-white mb-0 fw-bold">
                                                                    Building Type: Health Building
                                                                </p>
                                                            </div>

                                                            <div class="portfolio-title rounded-btn ">
                                                                <small>SLE</small>
                                                                <h4 class="text-white fw-bold">Judulnya</h4>
                                                            </div>

                                                        </div>

                                                        <!-- Kolom kanan -->
                                                        <div
                                                            class="col-4 d-flex flex-column align-items-end justify-content-between">

                                                            <span class="portfolio-number">
                                                                1
                                                            </span>

                                                            <a href="#" class="portfolio-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 me-3">
                                            <div class="portfolio-card">

                                                <!-- Gambar -->
                                                <img src="{{ asset('frontend/img/c_portfolio.webp') }}"
                                                    class="portfolio-img" alt="...">

                                                <!-- Overlay hitam 70% -->
                                                <div class="portfolio-overlay"></div>

                                                <!-- Konten di atas overlay -->
                                                <div class="portfolio-content">

                                                    <div class="row h-100">

                                                        <!-- Kolom kiri -->
                                                        <div class="col-8 d-flex flex-column justify-content-between">

                                                            <div>
                                                                <p class="text-white mb-0 fw-bold">
                                                                    Building Type: Health Building
                                                                </p>
                                                            </div>

                                                            <div class="portfolio-title rounded-btn ">
                                                                <small>SLE</small>
                                                                <h4 class="text-white fw-bold">Judulnya</h4>
                                                            </div>

                                                        </div>

                                                        <!-- Kolom kanan -->
                                                        <div
                                                            class="col-4 d-flex flex-column align-items-end justify-content-between">

                                                            <span class="portfolio-number">
                                                                1
                                                            </span>

                                                            <a href="#" class="portfolio-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 me-3">
                                            <div class="portfolio-card">

                                                <!-- Gambar -->
                                                <img src="{{ asset('frontend/img/c_portfolio.webp') }}"
                                                    class="portfolio-img" alt="...">

                                                <!-- Overlay hitam 70% -->
                                                <div class="portfolio-overlay"></div>

                                                <!-- Konten di atas overlay -->
                                                <div class="portfolio-content">

                                                    <div class="row h-100">

                                                        <!-- Kolom kiri -->
                                                        <div class="col-8 d-flex flex-column justify-content-between">

                                                            <div>
                                                                <p class="text-white mb-0 fw-bold">
                                                                    Building Type: Health Building
                                                                </p>
                                                            </div>

                                                            <div class="portfolio-title rounded-btn ">
                                                                <small>SLE</small>
                                                                <h4 class="text-white fw-bold">Judulnya</h4>
                                                            </div>

                                                        </div>

                                                        <!-- Kolom kanan -->
                                                        <div
                                                            class="col-4 d-flex flex-column align-items-end justify-content-between">

                                                            <span class="portfolio-number">
                                                                1
                                                            </span>

                                                            <a href="#" class="portfolio-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

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

                </div>



            </div>
        </div>
    </div>
    <!-- portfolio End -->


    <!-- partner Start -->
    <div class="container-fluid volunteer py-5 ">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="row g-4">
                        <div class="col-lg-6 ">
                            <div class="volunteer-img rounded-image">
                                <img src="{{ asset('frontend/img/volunteers-1.jpg') }}" class="img-fluid w-100"
                                    alt="Image">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="volunteer-img rounded-image">
                                <img src="{{ asset('frontend/img/volunteers-3.jpg') }}" class="img-fluid w-100"
                                    alt="Image">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="volunteer-img  rounded-image">
                                <img src="{{ asset('frontend/img/volunteers-2.jpg') }}" class="img-fluid w-100"
                                    alt="Image">

                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="volunteer-img rounded-image">
                                <img src="{{ asset('frontend/img/volunteers-4.jpg') }}" class="img-fluid w-100"
                                    alt="Image">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="text-uppercase hijau-1">Our Partner</h5>
                    <h1 class="mb-4">Lets Meeting Our Partner!</h1>
                    <p class="mb-4">Together with our trusted partners, we combine expertise, innovation, and
                        collaboration to deliver smart, sustainable, and reliable solutions that create lasting value for
                        every project.
                    </p>

                    <div class="row">
                        <div class="col-3 me-3 mb-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('frontend/img/logorpnp.png') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="col-3 me-3 mb-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('frontend/img/banguco.png') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="col-3 me-3 mb-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('frontend/img/urbelco.jpeg') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="col-3 me-3 mb-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('frontend/img/bigrid.png') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="col-3 me-3 mb-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('frontend/img/bim.png') }}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="col-3 me-3 mb-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('frontend/img/logocontoh.png') }}" class="img-fluid w-100"
                                alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partner End -->
    <!-- Causes Start -->
    <!-- Causes End -->
    <!-- Events Start -->
    <div class="container-fluid event py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary hijau-1">TESTIMONIAL</h5>
                <h1 class="mb-0">What They’re Talking About Our Work</h1>
            </div>
            <div class="event-carousel owl-carousel mt-5">
                <div class="event-item ">
                    <img src="{{ asset('frontend/img/events-1.jpg') }}" class="img-fluid w-100 rounded-atas"
                        alt="Image">
                    <div class="event-content p-4 rounded-nav">

                        <h4 class="fw-bold">Dr.Abdul Muhammad.ST.MT</h4>
                        <h6 class="mb-4 hijau-1">Kepala Bagian BPJN PUPR Kalbar</h6>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>

                    </div>
                </div>
                <div class="event-item ">
                    <img src="{{ asset('frontend/img/events-1.jpg') }}" class="img-fluid w-100 rounded-atas"
                        alt="Image">
                    <div class="event-content p-4 rounded-nav">

                        <h4 class="fw-bold">Dr.Abdul Muhammad.ST.MT</h4>
                        <h6 class="mb-4 hijau-1">Kepala Bagian BPJN PUPR Kalbar</h6>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>

                    </div>
                </div>
                <div class="event-item ">
                    <img src="{{ asset('frontend/img/events-1.jpg') }}" class="img-fluid w-100 rounded-atas"
                        alt="Image">
                    <div class="event-content p-4 rounded-nav">

                        <h4 class="fw-bold">Dr.Abdul Muhammad.ST.MT</h4>
                        <h6 class="mb-4 hijau-1">Kepala Bagian BPJN PUPR Kalbar</h6>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>

                    </div>
                </div>
                <div class="event-item ">
                    <img src="{{ asset('frontend/img/events-1.jpg') }}" class="img-fluid w-100 rounded-atas"
                        alt="Image">
                    <div class="event-content p-4 rounded-nav">

                        <h4 class="fw-bold">Dr.Abdul Muhammad.ST.MT</h4>
                        <h6 class="mb-4 hijau-1">Kepala Bagian BPJN PUPR Kalbar</h6>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>

                    </div>
                </div>
                {{-- <div class="event-item">
                    <img src="{{ asset('frontend/img/events-2.jpg') }}" class="img-fluid w-100" alt="Image">
                    <div class="event-content p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-body"><i class="fas fa-map-marker-alt me-2"></i>Grand Mahal, Dubai
                                2100.</span>
                            <span class="text-body"><i class="fas fa-calendar-alt me-2"></i>10 Feb, 2023</span>
                        </div>
                        <h4 class="mb-4">How To Build A Cleaning Plan</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div>
                <div class="event-item">
                    <img src="{{ asset('frontend/img/events-3.jpg') }}" class="img-fluid w-100" alt="Image">
                    <div class="event-content p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-body"><i class="fas fa-map-marker-alt me-2"></i>Grand Mahal, Dubai
                                2100.</span>
                            <span class="text-body"><i class="fas fa-calendar-alt me-2"></i>10 Feb, 2023</span>
                        </div>
                        <h4 class="mb-4">How To Build A Cleaning Plan</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div>
                <div class="event-item">
                    <img src="{{ asset('frontend/img/events-4.jpg') }}" class="img-fluid w-100" alt="Image">
                    <div class="event-content p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-body"><i class="fas fa-map-marker-alt me-2"></i>Grand Mahal, Dubai
                                2100.</span>
                            <span class="text-body"><i class="fas fa-calendar-alt me-2"></i>10 Feb, 2023</span>
                        </div>
                        <h4 class="mb-4">How To Build A Cleaning Plan</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Events End -->
    {{-- klasifikasi --}}
    <div class="container-fluid  py-5 ">
        <div class="container py-5">
            <div class="row g-5">

                <div class="col-lg-7">
                    <h5 class="text-uppercase hijau-1">Our Partner</h5>
                    <h1 class="mb-4">Lets Meeting Our Partner!</h1>
                    <p class="mb-4">Together with our trusted partners, we combine expertise, innovation, and
                        collaboration to deliver smart, sustainable, and reliable solutions that create lasting value for
                        every project.
                    </p>

                    <div class="row">

                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('frontend/img/klasifikasi.webp') }}" class="img-fluid w-100 rounded-image"
                        style="height:25rem; object-fit:cover;" alt="Image">

                </div>
            </div>
        </div>
    </div>

    {{-- endklasifikasi --}}

    <!-- Gallery Start -->
    <div class="container-fluid gallery py-5 px-0">
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h5 class="text-uppercase hijau-1 fw-bold text-primary">Galeries</h5>
            <h1 class="mb-4 fw-bold">Our Journey in Action</h1>

        </div>
        <div class="row g-0">
            <div class="col-lg-4">
                <div class="gallery-item">
                    <img src="{{ asset('frontend/img/gallery-2.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('frontend/img/gallery-2.jpg') }}" data-lightbox="gallery-2" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('frontend/img/gallery-3.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('frontend/img/gallery-3.jpg') }}" data-lightbox="gallery-3" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="gallery-item">
                    <img src="{{ asset('frontend/img/gallery-1.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('frontend/img/gallery-1.jpg') }}" data-lightbox="gallery-1" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="gallery-item">
                    <img src="{{ asset('frontend/img/gallery-4.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('frontend/img/gallery-4.jpg') }}" data-lightbox="gallery-4" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('frontend/img/gallery-5.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('frontend/img/gallery-5.jpg') }}" data-lightbox="gallery-5" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->


    <!-- Volunteers Start -->
    <div class="container-fluid  py-5 mt-5">
        <div class="container py-5 rounded-image bg-hijau-1 mt-5">
            <div class="row g-5 justify-content-center">
                <img src="{{ asset('frontend/img/logorpnpputih.png') }}" class="w-10 text-center " alt="">

            </div>
            <div class="row  justify-content-center ps-1 pe-1 mt-5 ">
                <h2 class="fw-bold text-white  w-45 text-center">Let’s work together to create smarter, sustainable, and
                    compliant
                    solutions
                    for your next project.</h2>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="align-items-center text-center ">
                    <a class="btn-hover-border rounded-btn btn bg-putih1 hijau-1 py-2 px-4" href="#">
                        <i class="fas fa-phone-alt hijau-1 me-2"></i>Lets Talk!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Volunteers End -->
@endsection
