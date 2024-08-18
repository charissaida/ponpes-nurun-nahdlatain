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
                    <h1>About</h1>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="nim">Judul About</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') ?? $about->judul}}">
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Isi</label>
                                <textarea class="form-control" id="summernote" name="isi">{{ old('isi') ?? $about->isi}}</textarea>
                                @error('isi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Isi Bawah</label>
                                <textarea class="form-control" id="summernote2" name="isi_bawah">{{ old('isi_bawah') ?? $about->isi_bawah}}</textarea>
                                @error('isi_bawah')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Lokasi</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') ?? $about->lokasi}}">
                                @error('lokasi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $about->email}}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Telepon</label>
                                <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp') ?? $about->telp}}">
                                @error('telp')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="nim">Sosial Media</label>
                            <div class="form-group">
                                <label for="nim">twitter</label>
                                <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ old('twitter') ?? $about->twitter}}">
                                @error('twitter')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">facebook</label>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook') ?? $about->facebook}}">
                                @error('facebook')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">instagram</label>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram') ?? $about->instagram}}">
                                @error('instagram')
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
    <script type="text/javascript">
        $('#summernote2').summernote({
            height: 400
        });
    </script>
    @endsection
