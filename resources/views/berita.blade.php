@extends('layouts.app')

    @section('content')
    @parent
    <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="section-title mt-5 pt-5">
            <h2>Berita</h2>
          </div>
          <div class="row portfolio-container">
            @forelse ($beritaProfile as $berita)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ asset($berita->gambar) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{$berita->judul}}</h4>
                  <p>Keterangan</p>
                  <div class="portfolio-links">
                    <a href="{{ asset($berita->gambar) }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="{{ route('beritaProfileDetail',['berita'=>$berita->id]) }}" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
              <div class="portfolio-info">
                <h4><a href="{{ route('beritaProfileDetail',['berita'=>$berita->id]) }}">{{$berita->judul}}</a></h4>
                <p>{!! Str::limit($berita->isi, 20, '(...)') !!}</p>
              </div>
            </div>
            @empty
                <td colspan="6" class="text-center">Tidak ada data...</td>
            @endforelse
          </div>

        </div>
    </section>
    @endsection
