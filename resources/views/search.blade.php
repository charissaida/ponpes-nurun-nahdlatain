@extends('layouts.app')

    @section('content')
    @parent
    <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="section-title mt-5 pt-5">
            <h2>Search Result : {{ $_GET['search'] }}</h2>
          </div>
          <div class="row portfolio-container">
            @forelse ($search as $searchs)

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ asset($searchs->gambar) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{$searchs->judul}}</h4>
                  <p>Keterangan</p>
                  <div class="portfolio-links">
                    <a href="{{ asset($searchs->gambar) }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="{{ route('beritaProfileDetail',$searchs->id) }}" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
              <div class="portfolio-info">
                @if (str_contains($searchs->gambar, 'berita'))
                <h4><a href="{{ route('beritaProfileDetail',$searchs->id) }}">{{$searchs->judul}}</a></h4>
                @else
                <h4><a href="{{ route('galleryProfileDetail',$searchs->id) }}">{{$searchs->judul}}</a></h4>
                @endif
                <p>{!! Str::limit($searchs->isi, 20, '(...)') !!}</p>
              </div>
            </div>
            @empty
                <td colspan="6" class="text-center">Tidak ada data...</td>
            @endforelse
          </div>

        </div>
    </section>
    @endsection
