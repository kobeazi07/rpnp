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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script>
    $(document).ready(function() {

        $('#contactForm').on('submit', function(e) {

            e.preventDefault();

            let form = $(this);
            let button = $('#btnSubmit');
            let btnText = $('#btnText');
            let btnLoading = $('#btnLoading');

            // Disable tombol
            button.prop('disabled', true);
            btnText.hide();
            btnLoading.show();

            $.ajax({

                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),

                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    'Accept': 'application/json'
                },

                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });

                    // Kosongkan form
                    form[0].reset();
                },

                error: function(xhr) {

                    if (xhr.status === 422) {

                        let errors = xhr.responseJSON.errors;
                        let errorMessages = [];

                        $.each(errors, function(field, messages) {

                            $.each(messages, function(index, message) {
                                errorMessages.push(message);
                            });

                        });

                        Swal.fire({
                            icon: 'warning',
                            title: 'Input Tidak Valid',
                            html: errorMessages.join('<br>'),
                            confirmButtonText: 'OK'
                        });

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: xhr.responseJSON?.message ??
                                'Terjadi kesalahan. Silakan coba lagi.',
                            confirmButtonText: 'OK'
                        });
                    }
                },

                complete: function() {

                    // Aktifkan tombol kembali
                    button.prop('disabled', false);
                    btnText.show();
                    btnLoading.hide();
                }

            });

        });

    });
</script>

</html>
