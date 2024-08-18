

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sistem Informasi Pondok Pesantren Nurun Nahdlatain</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="img/logo.png" type="image/x-icon"/>

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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
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
