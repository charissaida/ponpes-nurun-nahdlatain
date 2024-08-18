
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sistem Informasi Pondok Pesantren Nurun Nahdlatain</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="images/logo.png" type="image/x-icon"/>

  <!-- Fonts and icons -->
  <script src="js/plugin/webfont/webfont.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    WebFont.load({
      google: {"families":["Lato:300,400,700,900"]},
      custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["assets/css/fonts.min.css"]},
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/atlantis.min2.css">
</head>
<body class="login">
  <div class="wrapper wrapper-login wrapper-login-full p-0">
    <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
    <div class="border-slate-300 text-slate-300"><img src="img/logo.png" alt="User Image" style="width:100px"></div>
      <h1 class="title fw-bold text-white mt-3 mb-3">Pondok Pesantren Nurun Nahdlatain</h1>
      <p class="subtitle text-white op-7">Sistem Informasi Pondok Pesantren</p>
    </div>
    <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
      <div class="container container-login container-transparent animated fadeIn">
        <h3 class="text-center">Sign In</h3>
        <form method="post" action="{{ route('loginProses') }}">
            @csrf
        <div class="login-form">
          <div class="form-group">
            <label for="email" class="placeholder"><b>{{ __('E-Mail Address') }}</b></label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
          <div class="form-group">
            <label for="password" class="placeholder"><b>{{ __('Password') }}</b></label>
            <div class="position-relative">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              <div class="show-password">
                <i class="fa fa-eye"></i>
              </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
          <div class="form-group form-action-d-flex mb-3">
                <button type="submit" name="submit" value="login" class="btn btn-primary col-md-12 float-right mt-3 mt-sm-0 fw-bold" style="background-color: '#372eb3'">{{ __('Login') }}</button>
          </div>
          <div class="login-account">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
          </div>
          <br>
          <div class="login-account">
            <span class="msg">&copy; Pondok Pesantren Nurun Nahdlatain - 2021</span>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</body>
  <script src="js/jquery.3.2.1.min.js"></script>
  <script src="js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/atlantis.min.js"></script>
</html>
