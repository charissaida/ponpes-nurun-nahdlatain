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
                    <h1>Edit User</h1>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('users.update',['user' => $user->id]) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="nim">{{ __('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $user->name}}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $user->email}}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="nim">{{ __('Password') }}</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') ?? Hash::check($user->password)}}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
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
