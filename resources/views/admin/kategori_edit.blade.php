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
                    <h1>Edit Kategori</h1>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('kategoris.update',['kategori' => $kategori->id]) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="nim">Nama Kategori</label>
                                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') ?? $kategori->nama_kategori}}">
                                @error('nama_kategori')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Menu</label>
                                <select class="form-control" name="id_menu" id="id_menu">
                                    <option value="Berita"
                                    {{ (old('id_menu') ?? $kategori->id_menu)==
                                    'Berita' ? 'selected': '' }} >
                                    Berita
                                    </option>
                                    <option value="Gallery"
                                    {{ (old('id_menu') ?? $kategori->id_menu)==
                                    'Gallery' ? 'selected': '' }} >
                                    Gallery
                                    </option>
                                    {{-- <option value="About"
                                    {{ (old('id_menu') ?? $kategori->id_menu)==
                                    'About' ? 'selected': '' }} >
                                    About
                                    </option> --}}
                                </select>
                                  @error('id_menu')
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
