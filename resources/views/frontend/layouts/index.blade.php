<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @php
        $setting = App\Models\Setting::first();
    @endphp
    <title>{{ $setting->tittle }}</title>
    <meta name="description" content="{{ $setting->description }}">
    <meta name="keywords" content="{{ $setting->meta }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/png" href="{{ asset('frontend/img/logorpnp.png') }}">
    @include('frontend.includes.style')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    @include('frontend.includes.navbar')
    <!-- Navbar End -->


    @yield('konten')


    @include('frontend.includes.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('frontend.includes.script')

</body>

</html>
