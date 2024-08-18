@extends('layouts.app')

    @section('content')
    @parent
    <section id="about" class="about">
        <div class="container mt-5 pd-5 pt-lg-3">

          <div class="section-title">
            <h2>Pondok Pesantren Nurun Nahdlatain</h2>
          </div>

          <div class="row">
            <div class="col pt-2 pt-lg-0 order-2 order-lg-1 content">
              <h3>{{ $aboutProfile->judul}}</h3>
              <p class="font-italic">
                {!! $aboutProfile->isi !!}
              </p>
            </div>
          </div>

        </div>
      </section>
      <section id="contact" class="contact">
        <div class="container">

          <div class="section-title">
            <h2>Contact</h2>
            <p>{!! $aboutProfile->isi_bawah !!}</p>
          </div>

          <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>{{ $aboutProfile->lokasi}}</p>
                </div>

                <div class="email">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{ $aboutProfile->email}}</p>
                </div>

                <div class="phone">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>{{ $aboutProfile->telp}}</p>
                </div>
               </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <div class="info">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.742008027618!2d122.71494291476269!3d-4.814301496503952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da24bfb6b385e91%3A0xbadabfffbaec1aad!2sMASJID%20NURUN%20NAHDLATAIN!5e0!3m2!1sid!2sid!4v1622798020130!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

          </div>

        </div>
      </section>
    @endsection
