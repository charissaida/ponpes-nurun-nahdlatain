<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.png" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Informasi Pondok Pesantren Nurun Nahdlatain</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">{{ $abo->email}}</a>
            <i class="icofont-phone"></i> {{ $abo->telp}}
        </div>
        <div class="social-links">
            <a href="{{ $abo->twitter }}" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="{{ $abo->facebook }}" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="{{ $abo->instagram }}" class="instagram"><i class="icofont-instagram"></i></a>
        </div>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h3 class="logo mr-auto"><a href="{{ route('profile') }}">Pondok Pesantren Nurun Nahdlatain</a></h3>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class=""><a href="{{ route('profile') }}">Beranda</a></li>
                <li class="drop-down"><a href="#">Berita</a>
                    <ul>
                    @forelse ($beritaa as $beritas)
                    <li><a href="{{ route('beritaProfile',$beritas->nama_kategori) }}">{{$beritas->nama_kategori}}</a></li>
                        @empty
                        Tidak ada data...
                    @endforelse
                    </ul>
                </li>

                <li class="drop-down"><a href="">Gallery</a>
                    <ul>

                    @foreach ( $menugallery as $gallerys )

                        <li><a href="{{ route('galleryProfile',$gallerys->nama_kategori) }}">{{$gallerys->nama_kategori}}</a></li>
                    @endforeach
                    </ul>
                </li>
                <li class=""><a href="{{ route('aboutProfile') }}">About</a></li>
                {{-- <li class="drop-down"><a href="">Yayasan</a>
                    <ul>
                        <li><a href="#foto">Islamiyah Syafi'iyah</a></li>
                        <li><a href="#video">Yayasan 2</a></li>
                    </ul>
                </li> --}}
                <li>
                    <form type="get" action="{{route('search')}}" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="search" type="search" id="tbName" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-light" type="submit" id="search"><a class="fas fa-search">Search</a></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
    </header><!-- End Header -->
    @section('content')
    @show

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
        <h3>Pondok Pesantren Nurun Nahdlatain Raha</h3>
        <p>{!! Str::limit($abo->isi_bawah, 200) !!}</p>
        <div class="social-links">
            <a href="{{ $abo->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="{{ $abo->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="{{ $abo->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>2021 Pondok Pesantren Nurun Nahdlatain</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Vendor JS Files -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>
    <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>
</body>
</html>
