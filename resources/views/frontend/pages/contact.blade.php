@extends('frontend.layouts.index')

@section('konten')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="   background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(frontend/img/h-jumbo.webp);">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Contact</h1>

                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('HalamanHome') }}" class="hijau-1">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact</li>
                </ol>
        </div>
    </div>
    <!-- Contact Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="contact p-5">
                <div class="row g-4">
                    <div class="col-xl-5">
                        <h1 class="mb-4 fw-bold">Get in touch</h1>
                        <p class="mb-4">Reach out today and let’s build smarter, sustainable, and compliant engineering
                            solutions together.

                        </p>
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <input type="hidden" name="setting_email" value="{{ $setting->email }}">
                            <div class="row gx-4 gy-3">
                                <div class="col-xl-6">
                                    <input type="text" class="form-control bg-white rounded-btn border-0 py-3 px-4"
                                        placeholder="Your First Name" name="first_name">
                                </div>
                                <div class="col-xl-6">
                                    <input type="email" class="form-control bg-white rounded-btn border-0 py-3 px-4"
                                        placeholder="Your Email" name="email">
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" class="form-control bg-white rounded-btn  border-0 py-3 px-4"
                                        placeholder="Your Phone" name="phone">
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" class="form-control bg-white rounded-btn border-0 py-3 px-4"
                                        placeholder="Subject" name="subject">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white rounded-btn   border-0 py-3 px-4" rows="7" cols="10"
                                        placeholder="Your Message" name="message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn-hover-bg bg-hijau-1 text-white rounded-btn w-100 py-3 px-5"
                                        type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-7">
                        <div>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="bg-white rounded-btn p-4" style="height: 250px">
                                        <i class="fas fa-map-marker-alt fa-2x text-primary mb-2"></i>
                                        <h4>Address</h4>
                                        <p class="mb-0">{{ $setting->alamat ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="bg-white rounded-btn p-4" style="height: 250px">
                                        <i class="fas fa-envelope fa-2x text-primary mb-2"></i>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">{{ $setting->email ?? '' }}</p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="google-map">
                                        {!! $setting->embed_gmaps !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
