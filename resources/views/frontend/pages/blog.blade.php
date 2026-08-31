@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Blog</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('HalamanHome') }} " class="hijau-1">Home</a></li>
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
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-innovation-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-innovation" type="button" role="tab" aria-controls="pills-innovation"
                        aria-selected="false">
                        Innovations
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-regulation-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-regulation" type="button" role="tab" aria-controls="pills-regulation"
                        aria-selected="false">
                        Regulation
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-workshop-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-workshop" type="button" role="tab" aria-controls="pills-workshop"
                        aria-selected="false">
                        Workshop
                    </button>
                </li>
                <li class="nav-item col-lg-2" role="presentation">
                    <button class="nav-link w-100 rounded-btn fw-bold" id="pills-asociation-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-asociation" type="button" role="tab" aria-controls="pills-asociation"
                        aria-selected="false">
                        Asociation
                    </button>
                </li>
            </ul>
            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">


                        <div class="row justify-content-center mt-5 ">
                            @foreach ($blog as $blog)
                                {{-- all --}}
                                <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                    <div class="event-item ">
                                        <img src="{{ $blog->foto }}" class="img-fluid w-100 rounded-atas" alt="Image">
                                        <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                            <h4 class="fw-bold blog-title-2-line">
                                                {{ $blog->judul }}
                                            </h4>
                                            <div class="blog-description-2-line">
                                                {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                                            </div>
                                            <div class="d-flex align-items-center mt-4 justify-content-start">
                                                <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                    href="{{ route('HalamanDBlog', ['blog' => $blog->slug]) }}">
                                                    Read More
                                                </a>
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
                            @foreach ($blogs as $blogs)
                                {{-- Trends --}}

                                <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                    <div class="event-item ">
                                        <img src="{{ $blogs->foto }}" class="img-fluid w-100 rounded-atas"
                                            alt="Image">
                                        <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                            <h4 class="fw-bold blog-title-2-line">
                                                {{ $blog->judul }}
                                            </h4>

                                            <div class="blog-description-2-line">
                                                {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                                            </div>
                                            <div class="d-flex align-items-center mt-4 justify-content-start">
                                                <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                    href="{{ route('HalamanDBlog', ['blog' => $blog->slug]) }}">
                                                    Read More
                                                </a>
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
                            @foreach ($blogss as $blogss)
                                @if ($blogss->rkategori_blog && $blogss->rkategori_blog->nama == 'Innovations')
                                    {{-- Innovations --}}
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                        <div class="event-item ">
                                            <img src="{{ $blogss->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="Image">
                                            <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                                <h4 class="fw-bold blog-title-2-line">
                                                    {{ $blog->judul }}
                                                </h4>

                                                <div class="blog-description-2-line">
                                                    {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                                                </div>
                                                <div class="d-flex align-items-center mt-4 justify-content-start">
                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                        href="{{ route('HalamanDBlog', ['blog' => $blog->slug]) }}">
                                                        Read More
                                                    </a>
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
                            @foreach ($rblogssss as $rblogssss)
                                @if ($rblogssss->rkategori_blog && $rblogssss->rkategori_blog->nama == 'Regulation')
                                    {{-- Regulation --}}
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                        <div class="event-item ">
                                            <img src="{{ $rblogssss->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="Image">
                                            <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                                <h4 class="fw-bold blog-title-2-line">
                                                    {{ $blog->judul }}
                                                </h4>

                                                <div class="blog-description-2-line">
                                                    {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                                                </div>
                                                <div class="d-flex align-items-center mt-4 justify-content-start">
                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                        href="{{ route('HalamanDBlog', ['blog' => $blog->slug]) }}">
                                                        Read More
                                                    </a>
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
                            @foreach ($blogsss as $blogsss)
                                @if ($blogsss->rkategori_blog && $blogsss->rkategori_blog->nama == 'Workshop')
                                    {{-- Workshop --}}
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                        <div class="event-item ">
                                            <img src="{{ $blogsss->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="Image">
                                            <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                                <h4 class="fw-bold blog-title-2-line">
                                                    {{ $blog->judul }}
                                                </h4>

                                                <div class="blog-description-2-line">
                                                    {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                                                </div>
                                                <div class="d-flex align-items-center mt-4 justify-content-start">
                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                        href="{{ route('HalamanDBlog', ['blog' => $blog->slug]) }}">
                                                        Read More
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-asociation" role="tabpanel"
                        aria-labelledby="pills-asociation-tab" tabindex="0">

                        <div class="row justify-content-center mt-5 ">
                            @foreach ($blogssss as $blogssss)
                                @if ($blogssss->rkategori_blog && $blogssss->rkategori_blog->nama == 'Asociation')
                                    {{-- association --}}
                                    <div class="col-lg-3 mb-5 me-1 ms-1 d-flex justify-content-center">
                                        <div class="event-item ">
                                            <img src="{{ $blogssss->foto }}" class="img-fluid w-100 rounded-atas"
                                                alt="Image">
                                            <div class="event-content bg-cyan-tp  p-4 rounded-nav">

                                                <h4 class="fw-bold blog-title-2-line">
                                                    {{ $blog->judul }}
                                                </h4>

                                                <div class="blog-description-2-line">
                                                    {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                                                </div>
                                                <div class="d-flex align-items-center mt-4 justify-content-start">
                                                    <a class="btn-hover-bg rounded-btn w-100 btn btn-primary text-white py-2 px-4 rounded-btn"
                                                        href="{{ route('HalamanDBlog', ['blog' => $blog->slug]) }}">
                                                        Read More
                                                    </a>
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
