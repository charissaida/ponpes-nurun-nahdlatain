@extends('layouts.admin')

    @section('content_admin')
    @parent
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User</h1>
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($user as $user)
                    @if ($user->level=="user")
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td><a href="{{ route('users.edit',['user'=>$user->id]) }}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->level}}</td>
                            <td>
                                <a href="{{ route('users.edit',['user'=>$user->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="" name="delete" data-name="{{ $user->name }}" class="btn btn-danger btn-sm btnAction delete-confirm" type="submit" role="button"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                        </tr>
                        @endif
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
    <form class="form-horizontal" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
      <!-- Modal content-->
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="inputPassword3" class="control-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="control-label">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="control-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="control-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
      </div>
      <!-- End of Main Content -->
    @endsection
