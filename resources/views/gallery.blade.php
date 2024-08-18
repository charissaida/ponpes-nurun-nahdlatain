@extends('layouts.app')

    @section('content')
    @parent
    <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="section-title mt-5 pt-5">
            <h2>Gallery</h2>
          </div>
          <div class="row portfolio-container">
            @forelse ($galleryProfile as $gallery)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ asset($gallery->gambar) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{$gallery->judul}}</h4>
                  <p>Keterangan</p>
                  <div class="portfolio-links">
                    <a href="{{ asset($gallery->gambar) }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="{{ route('galleryProfileDetail',['gallery'=>$gallery->id]) }}" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
              <div class="portfolio-info">
                <h4><a href="{{ route('galleryProfileDetail',['gallery'=>$gallery->id]) }}">{{$gallery->judul}}</a></h4>
                <p>{!! Str::limit($gallery->isi, 20, '(...)') !!}</p>
              </div>
            </div>
            @empty
                <td colspan="6" class="text-center">Tidak ada data...</td>
            @endforelse
          </div>

        </div>
    </section>
    @endsection
