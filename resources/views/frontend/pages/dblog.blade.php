@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Blog</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('HalamanHome') }}" class="hijau-1">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('HalamanBlog') }}" class="hijau-1">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Blog</li>
                </ol>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row d-flex ">
            <h2 class="fw-bold hijau-1 ">{{ $blog->judul }}</h2>
        </div>
        <div class="row d-flex mt-5 mb-3 justify-content-center">
            <img src="{{ asset($blog->foto) }}" class="thumbnail rounded-image img-fluid w-100 h-35" alt="Image"
                style="object-fit: cover; ">
        </div>
        <div class="row mt-3">
            {{-- <h5 class="fw-bold abu ">TAG: <span> BIM, Borneo, Kalimantan Barat</span></h5> --}}
            {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
        </div>
        <div class="row  mt-3 mb-5 d-flex justify-content-center">
            @foreach ($g_blog as $item)
                <div class="col-lg-6 col-xl-3 mb-3 me-1">
                    <div class="blog-item">
                        <div class="blog-img">

                            <a href="{{ asset('inputan/blog/detailimg/' . $item->image) }}" data-lightbox="Blog-1"
                                class="my-auto">

                                <img src="{{ asset('inputan/blog/detailimg/' . $item->image) }}"
                                    class="img-fluid rounded-image w-100" alt="">

                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
