@extends('backend.layouts.index')
@section('konten')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">Tables</h1>

            </div>
            <div class="col-lg-6" style="text-align: right !important;">
                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary text-right" style = "text-align = right;   " data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah +
                </button> --}}

            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="col"></div>
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

                <!-- Modal -->
                {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formabout" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Judul</label>
                                        <input type="text" class="form-control" name="judul"
                                            id="exampleFormControlInput1" placeholder="masukkan about">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="masukkan about"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Visi</label>
                                        <textarea class="form-control" id="visi" name="visi" placeholder="masukkan visi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Misi</label>
                                        <textarea class="form-control" id="misi" name="misi" placeholder="masukkan misi"></textarea>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btnSaveProgram">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Visi</th>
                                <th>Misi</th>

                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($abouts as $about)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $about->judul }}</td>
                                    <td>{!! str_replace('&nbsp;', ' ', $about->deskripsi) !!}</td>
                                    <td>{!! str_replace('&nbsp;', ' ', $about->visi) !!}</td>
                                    <td>{!! str_replace('&nbsp;', ' ', $about->misi) !!}</td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#Edit-{{ $about->id }}">
                                            Edit
                                        </button>


                                        {{-- modal edit --}}
                                        <!-- Modal -->
                                        <div class="modal fade" id="Edit-{{ $about->id }}" data-backdrop="static"
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
                                                    <form class="editformabout" data-id="{{ $about->id }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Judul</label>
                                                                <input type="text" class="form-control" name="judul"
                                                                    id="exampleFormControlInput1"
                                                                    value="{{ $about->judul }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Deskripsi</label>
                                                                <textarea class="form-control" id="deskripsi2-{{ $about->id }}" name="deskripsi" placeholder="masukkan about">{!! str_replace('&nbsp;', ' ', $about->deskripsi) !!}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Visi</label>
                                                                <textarea class="form-control" id="visi-{{ $about->id }}" name="visi" placeholder="masukkan visi">{!! str_replace('&nbsp;', ' ', $about->visi) !!}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Misi</label>
                                                                <textarea class="form-control" id="misi-{{ $about->id }}" name="misi" placeholder="masukkan misi">{!! str_replace('&nbsp;', ' ', $about->misi) !!}</textarea>
                                                            </div>



                                                            <div class="row">

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


                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <script>
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
            CKEDITOR.replace('visi');
        });
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('misi');
        });
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll('.editor').forEach(function(el) {

                CKEDITOR.replace(el.id);

            });

        });

        $(document).on('submit', '.editformabout', function(e) {
            e.preventDefault();

            let form = $(this);
            let id = form.data('id');
            let formData = new FormData(this);
            let editorId = 'deskripsi2-' + id;
            let editorVisi = 'visi' + id;
            let editorMisi = 'misi' + id;
            if (CKEDITOR.instances[editorId]) {
                formData.set('deskripsi', CKEDITOR.instances[editorId].getData());
            }
            // Visi
            if (CKEDITOR.instances[editorVisi]) {
                formData.set(
                    'visi',
                    CKEDITOR.instances[editorVisi].getData()
                );
            }

            // Misi
            if (CKEDITOR.instances[editorMisi]) {
                formData.set(
                    'misi',
                    CKEDITOR.instances[editorMisi].getData()
                );
            }

            $.ajax({
                url: "{{ url('/edit_about') }}/" + id,
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

        $(document).on('submit', '.form-delete-about', function(e) {
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


        // $(document).ready(function() {
        //     $('#dataTable').DataTable();
        // });
    </script>
@endsection
