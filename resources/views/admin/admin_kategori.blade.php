@extends('layouts.admin')

    @section('content_admin')
    @parent
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Kategori</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!--<h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>-->
              <div class="pull-right">
                <button class="btn btn-success" data-target="#tambahModal" data-toggle="modal">Tambah</button>
                  <!-- <a class="btn btn-info text-light" target="_blank" href="cetak-beras.html" >Print</a> -->
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if (session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session()->get('pesan')}}
                </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Menu</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($kategori as $kategori)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td><a href="{{ route('kategoris.edit',['kategori'=>$kategori->id]) }}">{{$kategori->nama_kategori}}</a></td>
                            <td>{{$kategori->id_menu}}</td>
                            <td>
                                <a href="{{ route('kategoris.edit',['kategori'=>$kategori->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{route('kategoris.destroy', $kategori->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="" name="delete" data-name="{{ $kategori->name }}" class="btn btn-danger btn-sm btnAction delete-confirm" type="submit" role="button"><i class="fas fa-trash"></i></button>
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
                <form class="form-horizontal" action="{{ route('kategoris.store') }}" method="POST" enctype="multipart/form-data">
                <!-- Modal content-->
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Tambah Data </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputPassword3" class="control-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori"  class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required placeholder="Masukkan Nama Kategori" >
                                @error('nama_kategori')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="control-label">Menu</label>
                                <select class="form-control" name="id_menu" id="id_menu">
                                    <option value="Berita"
                                    {{ old('id_menu')=='Berita' ? 'selected': '' }} >
                                    Berita
                                    </option>
                                    <option value="Gallery"
                                    {{ old('id_menu')=='Gallery' ? 'selected': '' }} >
                                    Gallery
                                    </option>
                                    {{-- <option value="About"
                                    {{ old('id_menu')=='About' ? 'selected': '' }} >
                                    About
                                    </option> --}}
                                </select>
                                @error('id_menu')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
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
