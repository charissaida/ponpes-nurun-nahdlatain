@extends('layouts.admin')

    @section('content_admin')
    @parent
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Begin Page Content -->

            <div class="container-fluid">
                <div class="text-center p-4">
                    <h1>Tambah Data Berita</h1>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('beritas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nim">Judul Berita</label>
                                <input type="text" name="judul"  class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required placeholder="Masukkan Judul" >
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Gambar</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                                <label style="color: red;  font-style: italic;">*Max 1MB</label>
                                <br>
                                <label style="color: red;  font-style: italic;">*JPG, JPEG, PNG</label>
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Kategori</label>
                                <select name="nama_kategori" id="nama_kategori" class="form-control">
                                    @forelse ($kategori as $kategoris)
                                            <option value="{{$kategoris->nama_kategori}}">{{$kategoris->nama_kategori}}</option>
                                        @empty
                                        Tidak ada data...
                                    @endforelse
                                </select>
                                @error('nama_kategori')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Isi</label>
                                <textarea class="form-control" id="summernote" name="isi">{{ old('isi') }}</textarea>
                                @error('isi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
          </div>
          <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
      </div>
    <!-- summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 400
        });
    </script>
    @endsection
