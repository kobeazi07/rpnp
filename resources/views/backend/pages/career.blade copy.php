@extends('backend.layouts.index')

@section('konten')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data career</h6>
                {{-- modal tambah --}}
                <!-- Large modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                    data-target=".bd-example-modal-lg">Tambah + </button>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form id="formcareer" enctype="multipart/form-data">
                                    @csrf

                                    {{-- Judul Career --}}
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Judul Career</label>
                                        <input type="text" class="form-control" name="judul"
                                            id="exampleFormControlInput1" placeholder="masukkan judul career" required>
                                    </div>

                                    {{-- Deadline --}}
                                    <div class="form-group">
                                        <label for="deadline">Deadline</label>
                                        <input type="date" class="form-control" name="deadline" id="deadline">
                                    </div>

                                    {{-- Location --}}
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" name="location" id="location"
                                            placeholder="masukkan lokasi pekerjaan">
                                    </div>

                                    {{-- Kategori Career --}}
                                    <div class="form-group">
                                        <label for="status">Kategori Career</label>

                                        <select id="status" name="kategori_career" class="form-control" required>

                                            <option value="" selected disabled>Choose...</option>

                                            @foreach ($kcareer as $kategori)
                                                <option value="{{ $kategori->id }}">
                                                    {{ $kategori->nama }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    {{-- Requirement --}}
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Requirement</label>

                                        <textarea class="form-control" name="requirement" id="requirement" rows="5"
                                            placeholder="masukkan requirement pekerjaan"></textarea>
                                    </div>

                                    {{-- Link Daftar --}}
                                    <div class="form-group">
                                        <label for="link_daftar">Link Daftar</label>

                                        <input type="text" class="form-control" name="link_daftar" id="link_daftar"
                                            placeholder="masukkan link pendaftaran">
                                    </div>

                                    {{-- Foto --}}
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Foto</label>

                                        <div class="input-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>

                                            <div class="custom-file">
                                                <input name="foto" type="file" class="custom-file-input"
                                                    accept="image/*">

                                                <label class="custom-file-label">
                                                    Choose file
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Close
                                        </button>

                                        <button type="button" class="btn btn-primary" id="btnSavecareer">
                                            Save changes
                                        </button>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- akhir modal tambah --}}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deadline</th>
                                <th>Location</th>
                                <th>Kategori</th>
                                <th>Requirement</th>
                                <th>Link Daftar</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($career as $key => $career)
                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        {{ $career->judul }}
                                    </td>

                                    <td>
                                        {{ $career->deadline }}
                                    </td>

                                    <td>
                                        {{ $career->location }}
                                    </td>

                                    <td>
                                        {{ $career->Rkategori_career->nama ?? '-' }}
                                    </td>

                                    <td>
                                        {!! str_replace('&nbsp;', ' ', $career->requirement) !!}
                                    </td>

                                    <td>
                                        @if ($career->link_daftar)
                                            <a href="{{ $career->link_daftar }}" target="_blank"
                                                class="btn btn-sm btn-info">
                                                Link
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if ($career->foto)
                                            <img src="{{ asset($career->foto) }}" alt="{{ $career->judul }}"
                                                style="width: 150px; height:150px; object-fit:cover;">
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>

                                        {{-- Button Edit --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#Edit-{{ $career->id }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">

                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />

                                            </svg>

                                        </button>


                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="Edit-{{ $career->id }}" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">

                                            <div class="modal-dialog modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            Edit Career
                                                        </h5>

                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">

                                                            <span aria-hidden="true">
                                                                &times;
                                                            </span>

                                                        </button>

                                                    </div>


                                                    <form class="editformcareer" data-id="{{ $career->id }}"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        <div class="modal-body">

                                                            {{-- Judul --}}
                                                            <div class="form-group">

                                                                <label for="exampleFormControlInput1">
                                                                    Judul Career
                                                                </label>

                                                                <input type="text" class="form-control" name="judul"
                                                                    id="exampleFormControlInput1"
                                                                    value="{{ $career->judul }}" required>

                                                            </div>


                                                            {{-- Deadline --}}
                                                            <div class="form-group">

                                                                <label for="deadline">
                                                                    Deadline
                                                                </label>

                                                                <input type="date" class="form-control"
                                                                    name="deadline" id="deadline"
                                                                    value="{{ $career->deadline }}">

                                                            </div>


                                                            {{-- Location --}}
                                                            <div class="form-group">

                                                                <label for="location">
                                                                    Location
                                                                </label>

                                                                <input type="text" class="form-control"
                                                                    name="location" id="location"
                                                                    value="{{ $career->location }}"
                                                                    placeholder="Masukkan lokasi pekerjaan">

                                                            </div>


                                                            {{-- Kategori Career --}}
                                                            <div class="form-group">

                                                                <label for="status">
                                                                    Kategori Career
                                                                </label>

                                                                <select id="status" name="kategori_career"
                                                                    class="form-control" required>

                                                                    <option value="" disabled>
                                                                        Choose...
                                                                    </option>

                                                                    @foreach ($kcareer as $kategori)
                                                                        <option value="{{ $kategori->id }}"
                                                                            {{ $career->kategori_career == $kategori->id ? 'selected' : '' }}>

                                                                            {{ $kategori->nama }}

                                                                        </option>
                                                                    @endforeach

                                                                </select>

                                                            </div>


                                                            {{-- Requirement --}}
                                                            <div class="form-group">

                                                                <label for="exampleFormControlTextarea1">
                                                                    Requirement
                                                                </label>

                                                                <textarea class="form-control editor" name="requirement" id="deskripsi2-{{ $career->id }}" rows="5"
                                                                    placeholder="Masukkan requirement pekerjaan">{{ $career->requirement }}</textarea>

                                                            </div>


                                                            {{-- Link Daftar --}}
                                                            <div class="form-group">

                                                                <label for="link_daftar">
                                                                    Link Daftar
                                                                </label>

                                                                <input type="text" class="form-control"
                                                                    name="link_daftar" id="link_daftar"
                                                                    value="{{ $career->link_daftar }}"
                                                                    placeholder="Masukkan link pendaftaran">

                                                            </div>


                                                            {{-- Foto --}}
                                                            <div class="form-group">

                                                                <label for="exampleFormControlTextarea1">
                                                                    Foto
                                                                </label>

                                                                @if ($career->foto)
                                                                    <div class="mb-2">

                                                                        <img src="{{ asset($career->foto) }}"
                                                                            alt="{{ $career->judul }}"
                                                                            style="width:150px;height:150px;object-fit:cover;">

                                                                    </div>
                                                                @endif

                                                                <div class="custom-file">

                                                                    <input name="foto" type="file"
                                                                        class="custom-file-input" accept="image/*">

                                                                    <label class="custom-file-label">
                                                                        Choose file
                                                                    </label>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">

                                                                Close

                                                            </button>

                                                            <button type="submit" class="btn btn-primary">

                                                                Save changes

                                                            </button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Delete --}}
                                        <form action="{{ route('career.destroy', $career->id) }}" method="POST"
                                            class="form-delete-career d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-submit-delete">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">

                                                    <path
                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7A.5.5 0 0 0 5.5 5m2.5 0a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7A.5.5 0 0 0 8 5m3 .5v7a.5.5 0 0 0 1 0v-7a.5.5 0 0 0-1 0" />

                                                </svg>

                                            </button>

                                        </form>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    </div>
    <!-- End of Main Content -->
    <script>
        // Update label filename
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('custom-file-input')) {
                e.target.nextElementSibling.innerText = e.target.files[0].name;
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('requirement');
        });
        $('#btnSavecareer').on('click', function() {
            let form = document.getElementById('formcareer');
            let formData = new FormData(form);
            if (CKEDITOR.instances[editorId]) {
                formData.set('requirement', CKEDITOR.instances[editorId].getData());
            }

            $.ajax({
                url: "{{ route('Tambah_career') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                beforeSend: function() {
                    $('#btnSavecareer')
                        .prop('disabled', true)
                        .text('Menyimpan...');
                },

                success: function(res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'career berhasil ditambahkan',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                },

                error: function(xhr) {
                    let pesan = 'Terjadi kesalahan';

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        pesan = '';
                        for (let key in errors) {
                            pesan += `• ${errors[key][0]}<br>`;
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        html: pesan
                    });
                },

                complete: function() {
                    $('#btnSavecareer')
                        .prop('disabled', false)
                        .text('Simpancareer');
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll('.editor').forEach(function(el) {

                CKEDITOR.replace(el.id);

            });

        });

        $(document).on('submit', '.editformcareer', function(e) {
            e.preventDefault();

            let form = $(this);
            let id = form.data('id');
            let formData = new FormData(this);
            let editorId = 'deskripsi2-' + id;
            $.ajax({
                url: "{{ url('/edit_career') }}/" + id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire('Sukses', response.message, 'success');
                    $('#Edit-' + id).modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Terjadi kesalahan', 'error');
                }
            });
        });

        $(document).on('submit', '.form-delete-career', function(e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');

            console.log('DELETE URL:', url);

            Swal.fire({
                title: 'Yakin?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: form.serialize(), // sudah ada _method=DELETE + _token
                        success: function(response) {
                            Swal.fire('Terhapus!', response.message, 'success')
                                .then(() => location.reload());
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            Swal.fire('Error', 'Gagal menghapus data', 'error');
                        }
                    });

                }
            });
        });
    </script>
@endsection
