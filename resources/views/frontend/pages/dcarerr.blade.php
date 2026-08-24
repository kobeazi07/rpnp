@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Carerr</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html " class="hijau-1">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="hijau-1">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Carerr</li>
                </ol>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row d-flex ">
            <h2 class="fw-bold hijau-1 ">Fulltime Junior Urban Design/Planning</h2>
        </div>
        <div class="row d-flex mt-5 mb-3 justify-content-center">
            <img src="{{ asset('frontend/img/about.png') }}" class="thumbnail rounded-image img-fluid w-100 h-35"
                alt="Image" style="object-fit: cover; ">
        </div>
        <div class="row mb-3">
            <h5 class="fw-bold abu">Deadline : 30 Agustus 2026</h5>
            <h5 class="fw-bold abu">Location : Pontianak</h5>
            <h2 class="fw-bold hijau-1 mt-3 ">Requirement: </h2>
            <p class="mt-3">Borneo BIM Festival sukses menjadi event pertama di Kalimantan Barat yang mengangkat tema
                Building
                Information Modeling (BIM). Menghadirkan berbagai profesional, praktisi, dan pemerhati industri konstruksi,
                kegiatan ini menjadi wadah untuk berbagi wawasan, memperluas kolaborasi, serta mendorong penerapan teknologi
                BIM dalam mendukung transformasi industri konstruksi yang lebih modern dan berkelanjutan.</p>
        </div>
        <div class="row  mt-3 mb-5 d-flex justify-content-center">
            <a class="btn-hover-bg rounded-btn w-40 btn btn-primary text-white py-2 px-4 rounded-btn"
                href="#">Daftar</a>
        </div>
    </div>
@endsection
