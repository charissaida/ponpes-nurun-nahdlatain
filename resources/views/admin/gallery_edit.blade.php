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
                    <h1>Edit Gallery</h1>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('gallerys.update',['gallery' => $gallery->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="nim">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') ?? $gallery->judul}}">
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Gambar</label>
                                <img src="{{ asset($gallery->gambar) }}" class="cover-img" style="width: 100px;">
                                <input type="file" class="form-control-file  @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ old('gambar') ?? $gallery->gambar}}" accept="image/*">
                                <label style="color: red;  font-style: italic;">*Max 1MB</label>
                                <br>
                                <label style="color: red;  font-style: italic;">*JPG, JPEG, PNG</label>
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Kategori</label>
                                <select name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror">
                                    @forelse ($kategori as $kategoris)
                                            <option value="{{$kategoris->nama_kategori}}"
                                                {{ (old('nama_kategori') ?? $kategoris->nama_kategori)== $kategoris->nama_kategori ? 'selected': '' }}>
                                                {{$kategoris->nama_kategori}}</option>
                                        @empty
                                        Tidak ada data...
                                    @endforelse
                                </select>
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Isi</label>
                                <textarea class="form-control" id="summernote" name="isi">{{ old('isi') ?? $gallery->isi}}</textarea>
                                @error('isi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Edit</button>
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
