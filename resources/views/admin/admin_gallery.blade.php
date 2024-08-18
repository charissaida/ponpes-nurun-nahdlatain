@extends('layouts.admin')

    @section('content_admin')
    @parent
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Gallery</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!--<h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>-->
              <div class="pull-right">
                <a href="{{ route('gallerys.tambah') }}" class="btn btn-success btn-sm">Tambah</i></a>
                {{-- <button class="btn btn-success" data-target="#tambahModal" data-toggle="modal">Tambah</button> --}}
                  <!-- <a class="btn btn-info text-light" target="_blank" href="cetak-beras.html" >Print</a> -->
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Judul</th>
                      <th>Gambar</th>
                      <th>Isi</th>
                      <th>Kategori</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($gallery as $gallery)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td><a href="{{ route('gallerys.edit',['gallery'=>$gallery->id]) }}">{{$gallery->judul}}</a></td>
                            <td><img src="{{ asset($gallery->gambar) }}" class="cover-img" style="width: 100px;"></td>
                            <td>{!! Str::limit($gallery->isi, 50) !!}</td>
                            <td>{{$gallery->nama_kategori}}</td>
                            <td>
                                <a href="{{ route('gallerys.edit',['gallery'=>$gallery->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{route('gallerys.destroy', $gallery->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="" name="delete" data-name="{{ $gallery->judul }}" class="btn btn-danger btn-sm btnAction delete-confirm" type="submit" role="button"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6" class="text-center">Tidak ada data...</td>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <!-- Modal Tambah -->
        <div id="tambahModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form class="form-horizontal" action="{{ route('gallerys.store') }}" method="POST" enctype="multipart/form-data">
                <!-- Modal content-->
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Tambah Data </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputPassword3" class="control-label">Judul</label>
                                <input type="text" name="judul"  class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required placeholder="Masukkan Judul" >
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="control-label">Gambar</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                    @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="control-label">Kategori</label>
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
                                <label for="inputPassword3" class="control-label">Isi</label>
                                <textarea class="form-control" id="isi" rows="3"
                                name="isi">{{ old('isi') }}</textarea>
                                @error('isi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                            <button type="submit" class="btn btn-warning" name="tambahData"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal -->
      </div>
      <!-- End of Main Content -->
    @endsection
