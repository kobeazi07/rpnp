@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Career</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('HalamanHome') }}" class="hijau-1">Home</a></li>
                    <li class="breadcrumb-item active text-white">Career</li>
                </ol>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <ul class="nav nav-pills justify-content-center row w-100 mb-3" id="pills-tab" role="tablist">

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
                        New
                    </button>
                </li>
                <li class="nav-item col-lg-2 " role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-innovation-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-innovation" type="button" role="tab" aria-controls="pills-innovation"
                        aria-selected="false">
                        Arsitek
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-regulation-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-regulation" type="button" role="tab" aria-controls="pills-regulation"
                        aria-selected="false">
                        Struktur
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-workshop-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-workshop" type="button" role="tab" aria-controls="pills-workshop"
                        aria-selected="false">
                        Out of Date
                    </button>
                </li>

            </ul>
            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">

                        {{-- all --}}
                        <div class="row justify-content-center mt-5 ">
                            @foreach ($career as $career)
                                <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                    <div class="event-item ">
                                        <img src="{{ $career->foto }}" class="img-fluid w-100 rounded-atas" alt="Image">
                                        <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                            <h4 class="fw-bold">{{ $career->judul }}</h4>
                                            <h6 class="mb-2 hijau-1">Lokasi: {{ $career->location }}</h6>
                                            <p class="mb-4">Dealine : {{ $career->deadline }}</p>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                    href="{{ route('HalamanDCarerr', ['id' => $career->id]) }}">Read
                                                    More</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">

                        <div class="row justify-content-center mt-5 ">
                            @foreach ($careers as $careers)
                                {{-- new --}}
                                <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                    <div class="event-item ">
                                        <img src="{{ $careers->foto }}" class="img-fluid w-100 rounded-atas" alt="Image">
                                        <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                            <h4 class="fw-bold">{{ $careers->judul }}</h4>
                                            <h6 class="mb-2 hijau-1">Lokasi: {{ $careers->location }}</h6>
                                            <p class="mb-4">Dealine : {{ $career->deadline }}</p>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                    href="{{ route('HalamanDCarerr', ['id' => $career->id]) }}">Read
                                                    More</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-innovation" role="tabpanel"
                        aria-labelledby="pills-innovation-tab" tabindex="0">

                        <div class="row justify-content-center mt-5 ">
                            @foreach ($careerss as $careerss)
                                @if ($careerss->Rkategori_career && $careerss->Rkategori_career->nama == 'Arsitek')
                                    {{-- arsitek --}}
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                        <div class="event-item ">
                                            <img src="{{ $careerss->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="Image">
                                            <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                                <h4 class="fw-bold">{{ $careerss->judul }}</h4>
                                                <h6 class="mb-2 hijau-1">Lokasi: {{ $careerss->location }}</h6>
                                                <p class="mb-4">Dealine : {{ $careerss->deadline }}</p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                        href="{{ route('HalamanDCarerr', ['id' => $career->id]) }}">Read
                                                        More</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-regulation" role="tabpanel"
                        aria-labelledby="pills-regulation-tab" tabindex="0">

                        <div class="row justify-content-center mt-5 ">
                            {{-- struktur --}}
                            @foreach ($careersss as $careersss)
                                @if ($careersss->Rkategori_career && $careersss->Rkategori_career->nama == 'Struktur')
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                        <div class="event-item ">
                                            <img src="{{ $careersss->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="Image">
                                            <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                                <h4 class="fw-bold">{{ $careersss->judul }}</h4>
                                                <h6 class="mb-2 hijau-1">Lokasi: {{ $careersss->location }}</h6>
                                                <p class="mb-4">Dealine : {{ $careersss->deadline }}</p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                        href="{{ route('HalamanDCarerr', ['id' => $career->id]) }}">Read
                                                        More</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-workshop" role="tabpanel" aria-labelledby="pills-workshop-tab"
                        tabindex="0">

                        <div class="row justify-content-center mt-5 ">
                            @foreach ($careerssss as $careerssss)
                                @if (Carbon\Carbon::parse($careerssss->deadline)->lt(Carbon\Carbon::today()))
                                    {{-- out of date --}}
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                        <div class="event-item ">
                                            <img src="{{ $careerssss->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="Image">
                                            <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                                <h4 class="fw-bold">{{ $careerssss->judul }}</h4>
                                                <h6 class="mb-2 hijau-1">Lokasi: {{ $careerssss->location }}</h6>
                                                <p class="mb-4">Dealine : {{ $careerssss->deadline }}</p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                        href="{{ route('HalamanDCarerr', ['id' => $career->id]) }}">Read
                                                        More</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
