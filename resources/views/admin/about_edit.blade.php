@extends('layouts.admin')

    @section('content_admin')
    @parent
      <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Begin Page Content -->

            <div class="container-fluid">
                <div class="text-center p-4">
                    <h1>Edit About</h1>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('abouts.update',['about' => $about->id]) }}" method="POST" enctype="multipart/form-data">
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
                                <label for="nim">Gambar</label>
                                <img src="{{ asset($about->gambar) }}" class="cover-img" style="width: 100px;">
                                <input type="file" class="form-control-file  @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ old('gambar') ?? $about->gambar}}">

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
                                <textarea class="form-control" id="isi" rows="3" name="isi">{{ old('isi') ?? $about->isi}}</textarea>
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
    @endsection
