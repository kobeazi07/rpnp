@extends('backend.layouts.index')
@section('konten')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">Data Portfolio</h1>

            </div>
            <div class="col-lg-6" style="text-align: right !important;">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary text-right" style = "text-align = right;   " data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah +
                </button>

            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="col"></div>
                <h6 class="m-0 font-weight-bold text-primary">Data Portfolio</h6>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formportfolio" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Judul</label>
                                        <input type="text" class="form-control" name="judul"
                                            id="exampleFormControlInput1" placeholder="masukkan portfolio">
                                    </div>
                                    {{-- Building Type --}}
                                    <div class="form-group">
                                        <label for="status">Building Type</label>

                                        <select id="building_type" name="buildingtype_id" class="form-control" required>

                                            <option value="" selected disabled>Choose...</option>

                                            @foreach ($b_type as $b_types)
                                                <option value="{{ $b_types->id }}">
                                                    {{ $b_types->nama }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    {{-- Kategori --}}
                                    <div class="form-group">
                                        <label for="status">Kategori Services</label>

                                        <select id="building_type" name="kategori_portfolio_id" class="form-control"
                                            required>

                                            <option value="" selected disabled>Choose...</option>

                                            @foreach ($kategori as $kategoris)
                                                <option value="{{ $kategoris->id }}">
                                                    {{ $kategoris->nama }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tahun</label>
                                        <input type="number" class="form-control" name="tahun"
                                            id="exampleFormControlInput1" placeholder="masukkan portfolio">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sow</label>
                                        <textarea class="form-control" id="deskripsi-sow" name="sow" placeholder="masukkan SOW portfolio"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="masukkan portfolio"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Foto </span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto">
                                            <label class="custom-file-label">Choose
                                                file</label>
                                        </div>
                                    </div>
                                    <label>Detail Gambar</label>
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-primary" onclick="addInput()">Tambah
                                            +</button>

                                    </div>
                                    <div id = "items-container"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btnSaveProgram">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Building Type</th>
                                <th>Kategori</th>
                                <th>Tahun</th>
                                <th>Deskripsi</th>
                                <th>Thumbnail</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($portfolio as $key => $portfolio)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $portfolio->judul }}</td>
                                    <td>{{ $portfolio->rbuilding_type->nama }}</td>
                                    <td>{{ $portfolio->rkategori_portfolio->nama }}</td>
                                    <td>{{ $portfolio->tahun }}</td>
                                    <td>{!! str_replace('&nbsp;', ' ', $portfolio->deskripsi) !!}</td>
                                    <td>
                                        @if (!empty($portfolio->foto))
                                            <img src="{{ $portfolio->foto }}"
                                                style="width:80px; height:60px; object-fit:cover; cursor:pointer;"
                                                class="img-thumbnail" alt="Portfolio" data-toggle="modal"
                                                data-target="#lightboxModal-{{ $portfolio->id }}">

                                            {{-- Lightbox --}}
                                            <div class="modal fade" id="lightboxModal-{{ $portfolio->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

                                                    <div class="modal-content bg-transparent border-0">

                                                        <div class="modal-body text-center position-relative p-0">

                                                            <button type="button" class="close position-absolute"
                                                                style="
                                            right: 10px;
                                            top: 5px;
                                            z-index: 10;
                                            color: white;
                                            font-size: 35px;
                                        "
                                                                data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>

                                                            </button>

                                                            <img src="{{ $portfolio->foto }}" class="img-fluid rounded"
                                                                style="max-height:90vh;" alt="Portfolio">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @else
                                            <p class="mb-0">Gambar Kosong</p>
                                        @endif
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#Edit-{{ $portfolio->id }}">
                                            Edit
                                        </button>


                                        {{-- modal edit --}}
                                        <!-- Modal -->
                                        <div class="modal fade" id="Edit-{{ $portfolio->id }}" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="editformportfolio" data-id="{{ $portfolio->id }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="judul">Judul</label>

                                                                <input type="text" class="form-control" name="judul"
                                                                    id="judul" placeholder="Masukkan judul portfolio"
                                                                    value="{{ $portfolio->judul }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="building_type">Building Type</label>

                                                                <select id="building_type" name="buildingtype_id"
                                                                    class="form-control" required>

                                                                    <option value="" disabled>Choose...</option>

                                                                    @foreach ($b_typess as $b_typesss)
                                                                        <option value="{{ $b_typesss->id }}"
                                                                            {{ $portfolio->buildingtype_id == $b_typesss->id ? 'selected' : '' }}>
                                                                            {{ $b_typesss->nama }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="building_type">Kategori Services</label>

                                                                <select id="building_type" name="kategori_portfolio_id"
                                                                    class="form-control" required>

                                                                    <option value="" disabled>Choose...</option>

                                                                    @foreach ($kategoriss as $kategorisss)
                                                                        <option value="{{ $kategorisss->id }}"
                                                                            {{ $portfolio->kategori_portfolio_id == $kategorisss->id ? 'selected' : '' }}>
                                                                            {{ $kategorisss->nama }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tahun">Tahun</label>

                                                                <input type="number" class="form-control" name="tahun"
                                                                    id="tahun" placeholder="Masukkan tahun"
                                                                    value="{{ $portfolio->tahun }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label
                                                                    for="deskripsi-sow-{{ $portfolio->id }}">SOW</label>

                                                                <textarea class="form-control editor" id="deskripsi-sow-{{ $portfolio->id }}" name="sow"
                                                                    placeholder="Masukkan SOW portfolio">{{ $portfolio->sow }}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label
                                                                    for="deskripsi-{{ $portfolio->id }}">Deskripsi</label>

                                                                <textarea class="form-control editor" id="deskripsi-{{ $portfolio->id }}" name="deskripsi"
                                                                    placeholder="Masukkan portfolio">{{ $portfolio->deskripsi }}</textarea>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Foto </span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        name="foto">
                                                                    <label class="custom-file-label">Choose
                                                                        file</label>
                                                                </div>
                                                            </div>
                                                            <label>Detail Gambar</label>
                                                            <div class="input-group mb-3">
                                                                <button type="button" class="btn btn-primary"
                                                                    onclick="addInput1  ({{ $portfolio->id }})">Tambah
                                                                    +</button>

                                                            </div>
                                                            <div id = "items-container1-{{ $portfolio->id }}"></div>

                                                            <div class="row">
                                                                @if ($portfolio->galeri_portfolio->count())
                                                                    @foreach ($portfolio->galeri_portfolio as $picture)
                                                                        <div class="position-relative d-inline-block mr-2 mb-2"
                                                                            id="picture-{{ $picture->id }}">

                                                                            <img src="{{ asset('inputan/portfolio/detailimg/' . $picture->image) }}"
                                                                                style="
                                                                                width:80px;
                                                                                height:80px;
                                                                                object-fit:cover;
                                                                                border-radius:6px;
                                                                            ">

                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm position-absolute"
                                                                                style="top:2px; right:2px; padding:2px 6px;"
                                                                                onclick="deletePicture({{ $picture->id }})">
                                                                                ×
                                                                            </button>

                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <p>Gambar Kosong</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- akhir modal edit --}}

                                        <form action="{{ route('Portfolio.destroy', $portfolio->id) }}" method="POST"
                                            class="form-delete-portfolio">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-submit-delete">Hapus
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

        {{-- lightbox --}}


        {{-- akhir lightbox --}}
    </div>


    <script>
        $('#btnSaveProgram').on('click', function() {
            let form = document.getElementById('formportfolio');
            let formData = new FormData(form);
            if (CKEDITOR.instances.deskripsi) {
                formData.set('deskripsi', CKEDITOR.instances.deskripsi.getData());
            }

            $.ajax({
                url: "{{ route('Tambah_Portfolio') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                beforeSend: function() {
                    $('#btnSaveProgram')
                        .prop('disabled', true)
                        .text('Menyimpan...');
                },

                success: function(res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Program berhasil ditambahkan',
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
                    $('#btnSaveProgram')
                        .prop('disabled', false)
                        .text('Simpan Program');
                }
            });
        });

        function addInput() {
            let uniqueId = Date.now();

            let html = `
        <div class="input-group mb-3" id="item-${uniqueId}">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>

            <div class="custom-file">
                <input type="file" 
                       name="files[]" 
                       class="custom-file-input" 
                       id="file-${uniqueId}">
                <label class="custom-file-label" for="file-${uniqueId}">
                    Choose file
                </label>
            </div>
      
            <div class="input-group-append">
                <button type="button" 
                        class="btn btn-danger"
                        onclick="removeInput('${uniqueId}')">
                    Hapus
                </button>
            </div>
        </div>
        `;

            document.getElementById('items-container').insertAdjacentHTML('beforeend', html);
        }

        function addInput1(portfolioId) {
            let uniqueId = Date.now();

            let html = `
        <div class="input-group mb-3" id="items1-${uniqueId}">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>

            <div class="custom-file">
                <input type="file"
                       name="files[]"
                       class="custom-file-input"
                       id="file-${uniqueId}">
                <label class="custom-file-label" for="file-${uniqueId}">
                    Choose file
                </label>
            </div>

            <div class="input-group-append">
                <button type="button"
                        class="btn btn-danger"
                        onclick="removeInput1('${uniqueId}')">
                    Hapus
                </button>
            </div>
        </div>
    `;

            document.getElementById(`items-container1-${portfolioId}`).insertAdjacentHTML('beforeend', html);
        }

        function removeInput(id) {
            document.getElementById(`item-${id}`).remove();
        }

        function removeInput1(id) {
            document.getElementById(`items1-${id}`)?.remove();
        }

        // Update label filename
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('custom-file-input')) {
                e.target.nextElementSibling.innerText = e.target.files[0].name;
            }
        });



        // Optional: destroy editor saat modal ditutup
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('deskripsi');
        });
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll('.editor').forEach(function(el) {

                CKEDITOR.replace(el.id);

            });

        });

        function deletePicture(id) {
            if (!confirm('Hapus gambar ini?')) return;

            fetch(`/portfolio/detail-picture/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('picture-' + id).remove();
                    } else {
                        alert('Gagal menghapus gambar');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Terjadi kesalahan');
                });
        }
        $(document).on('submit', '.editformportfolio', function(e) {
            e.preventDefault();

            let form = $(this);
            let id = form.data('id');
            let formData = new FormData(this);

            let editorId = 'deskripsi2-' + id;
            if (CKEDITOR.instances[editorId]) {
                formData.set('deskripsi', CKEDITOR.instances[editorId].getData());
            }

            $.ajax({
                url: "{{ url('/edit_portfolio') }}/" + id,
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

        $(document).on('submit', '.form-delete-portfolio', function(e) {
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
