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
            {{-- <ul class="nav nav-pills justify-content-center row w-100 mb-3" id="pills-tab" role="tablist">

                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link active w-100 rounded-btn fw-bold" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        ALL
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
                        Teknik Sipil
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-mep-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-mep" type="button" role="tab" aria-controls="pills-mep"
                        aria-selected="false">
                        MEP
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-bim-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-bim" type="button" role="tab" aria-controls="pills-bim"
                        aria-selected="false">
                        BIM
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-workshop-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-workshop" type="button" role="tab" aria-controls="pills-workshop"
                        aria-selected="false">
                        Out of Date
                    </button>
                </li>

            </ul> --}}
            <ul class="nav nav-pills justify-content-center row w-100 mb-3" id="pills-tab" role="tablist">

                {{-- ALL --}}
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link active w-100 rounded-btn fw-bold" id="pills-all-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                        aria-selected="true">
                        ALL
                    </button>
                </li>

                {{-- KATEGORI CAREER --}}
                @foreach ($kategori_careers as $kategori)
                    <li class="nav-item col-lg-2" role="presentation">

                        <button class="nav-link w-100 rounded-btn fw-bold" id="pills-kategori-{{ $kategori->id }}-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-kategori-{{ $kategori->id }}" type="button"
                            role="tab" aria-controls="pills-kategori-{{ $kategori->id }}" aria-selected="false">

                            {{ $kategori->nama }}

                        </button>

                    </li>
                @endforeach

                {{-- OUT OF DATE --}}
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-outdate-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-outdate" type="button" role="tab" aria-controls="pills-outdate"
                        aria-selected="false">

                        Out of Date

                    </button>
                </li>

            </ul>
            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab"
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
                                                    href="{{ route('HalamanDCarerr', ['career' => $career->slug]) }}">Read
                                                    More</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>


                    {{-- dinamesi --}}
                    {{-- =========================
        KATEGORI DINAMIS
    ========================== --}}

                    @foreach ($kategori_careers as $kategori)
                        <div class="tab-pane fade" id="pills-kategori-{{ $kategori->id }}" role="tabpanel"
                            aria-labelledby="pills-kategori-{{ $kategori->id }}-tab" tabindex="0">

                            <div class="row justify-content-center mt-5">

                                @foreach ($kategori->careers as $item)
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">

                                        <div class="event-item">

                                            <img src="{{ $item->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="{{ $item->judul }}">

                                            <div class="event-content bg-cyan-tp p-4 rounded-nav">

                                                <h4 class="fw-bold">
                                                    {{ $item->judul }}
                                                </h4>

                                                <h6 class="mb-2 hijau-1">
                                                    Lokasi: {{ $item->location }}
                                                </h6>

                                                <p class="mb-4">
                                                    Deadline : {{ $item->deadline }}
                                                </p>

                                                <div class="d-flex align-items-center justify-content-start">

                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4"
                                                        href="{{ route('HalamanDCarerr', ['career' => $item->slug]) }}">

                                                        Read More

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                    @endforeach
                    {{-- akhir dinamis --}}
                    <div class="tab-pane fade" id="pills-outdate" role="tabpanel" aria-labelledby="pills-workshop-tab"
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
                                                        href="{{ route('HalamanDCarerr', ['career' => $career->slug]) }}">Read
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
