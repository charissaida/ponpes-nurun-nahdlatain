@extends('layouts.app')

@section('content')
    @parent
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Gallery Detail</h2>
            <ol>
              <li>Gallery</li>
              <li>Gallery Detail</li>
            </ol>
          </div>

        </div>
    </section>
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

          <div class="portfolio-details-container">


              <img src="{{ asset($gallery->gambar) }}" class="img-fluid" alt="">

          </div>

          <div class="portfolio-description">
            <h2>{{ $gallery->judul }}</h2>
            <p>
                {!! $gallery->isi !!}
            </p>
          </div>

        </div>
      </section>
@endsection
