@extends('backend.layouts.index')
@section('konten')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">Data Blog</h1>

            </div>
            <div class="col-lg-6" style="text-align: right !important;">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary text-right" style="text-align = right;   " data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah +
                </button>

            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="col"></div>
                <h6 class="m-0 font-weight-bold text-primary">Data Blog</h6>

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
                            <form id="formblog" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Judul</label>
                                        <input type="text" class="form-control" name="judul"
                                            id="exampleFormControlInput1" placeholder="masukkan blog">
                                    </div>
                                    {{-- Building Type --}}
                                    <div class="form-group">
                                        <label for="status">Kategori</label>

                                        <select id="building_type" name="kategori_id" class="form-control" required>

                                            <option value="" selected disabled>Choose...</option>

                                            @foreach ($k_blog as $k_blogs)
                                                <option value="{{ $k_blogs->id }}">
                                                    {{ $k_blogs->nama }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleFormControlInput1">Tahun</label>
                                        <input type="number" class="form-control" name="tahun"
                                            id="exampleFormControlInput1" placeholder="masukkan blog">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sow</label>
                                        <textarea class="form-control" id="deskripsi-sow" name="sow" placeholder="masukkan SOW blog"></textarea>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="masukkan blog"></textarea>
                                    </div>
                                    {{-- <select name="tag_id[]" id="tag_id" class="form-control" multiple="multiple"
                                        style="width:100%;">

                                        @foreach ($tag as $tags)
                                            <option value="{{ $tags->id }}">
                                                {{ $tags->nama }}
                                            </option>
                                        @endforeach

                                    </select> --}}
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
                                    <div id="items-container"></div>
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
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Thumbnail</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($blog as $key => $blog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <div class="blog-title-2-line"
                                            style=" display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;">
                                            {{ $blog->judul }}
                                        </div>
                                    </td>
                                    <td>{{ $blog->rkategori_blog->nama }}</td>

                                    <td>
                                        <div class="blog-description-2-line"
                                            style="    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;">
                                            {!! str_replace('&nbsp;', ' ', $blog->deskripsi) !!}
                                        </div>
                                    </td>
                                    <td>
                                        @if (!empty($blog->foto))
                                            <img src="{{ $blog->foto }}"
                                                style="width:80px; height:60px; object-fit:cover; cursor:pointer;"
                                                class="img-thumbnail" alt="blog" data-toggle="modal"
                                                data-target="#lightboxModal-{{ $blog->id }}">

                                            {{-- Lightbox --}}
                                            <div class="modal fade" id="lightboxModal-{{ $blog->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">

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

                                                            <img src="{{ $blog->foto }}" class="img-fluid rounded"
                                                                style="max-height:90vh;" alt="blog">

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
                                            data-target="#Edit-{{ $blog->id }}">
                                            Edit
                                        </button>


                                        {{-- modal edit --}}
                                        <!-- Modal -->
                                        <div class="modal fade" id="Edit-{{ $blog->id }}" data-backdrop="static"
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
                                                    <form class="editformblog" data-id="{{ $blog->id }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="judul">Judul</label>

                                                                <input type="text" class="form-control" name="judul"
                                                                    id="judul" placeholder="Masukkan judul blog"
                                                                    value="{{ $blog->judul }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="building_type">Kategori</label>

                                                                <select id="building_type" name="kategori_id"
                                                                    class="form-control" required>

                                                                    <option value="" disabled>Choose...</option>

                                                                    @foreach ($k_blogss as $k_blogsss)
                                                                        <option value="{{ $k_blogsss->id }}"
                                                                            {{ $blog->kategori_id == $k_blogsss->id ? 'selected' : '' }}>
                                                                            {{ $k_blogsss->nama }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>



                                                            <div class="form-group">
                                                                <label
                                                                    for="deskripsi-{{ $blog->id }}">Deskripsi</label>

                                                                <textarea class="form-control editor" id="deskripsi-{{ $blog->id }}" name="deskripsi"
                                                                    placeholder="Masukkan blog">{{ $blog->deskripsi }}</textarea>
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
                                                                    onclick="addInput1  ({{ $blog->id }})">Tambah
                                                                    +</button>

                                                            </div>
                                                            <div id="items-container1-{{ $blog->id }}"></div>

                                                            <div class="row">
                                                                @if ($blog->galeri_blog->count())
                                                                    @foreach ($blog->galeri_blog as $picture)
                                                                        <div class="position-relative d-inline-block mr-2 mb-2"
                                                                            id="picture-{{ $picture->id }}">

                                                                            <img src="{{ asset('inputan/blog/detailimg/' . $picture->image) }}"
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

                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                            class="form-delete-blog">
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
            let form = document.getElementById('formblog');
            let formData = new FormData(form);
            if (CKEDITOR.instances.deskripsi) {
                formData.set('deskripsi', CKEDITOR.instances.deskripsi.getData());
            }

            $.ajax({
                url: "{{ route('Tambah_blog') }}",
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

        function addInput1(blogId) {
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

            document.getElementById(`items-container1-${blogId}`).insertAdjacentHTML('beforeend', html);
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

            fetch(`/blog/detail-picture/${id}`, {
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
        $(document).on('submit', '.editformblog', function(e) {
            e.preventDefault();

            let form = $(this);
            let id = form.data('id');
            let formData = new FormData(this);

            let editorId = 'deskripsi2-' + id;
            if (CKEDITOR.instances[editorId]) {
                formData.set('deskripsi', CKEDITOR.instances[editorId].getData());
            }

            $.ajax({
                url: "{{ url('/edit_blog') }}/" + id,
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

        $(document).on('submit', '.form-delete-blog', function(e) {
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

        $('#tag_id').select2({
            tags: true,
            multiple: true,
            tokenSeparators: [','],
            placeholder: 'Pilih atau buat tag...',
            allowClear: true,
            width: '100%'
        });
    </script>
@endsection
