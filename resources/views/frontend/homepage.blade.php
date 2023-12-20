 @extends('frontend.layout')

 @section('content')

 @if (session('success'))
    <script>
        Swal.fire({
        title: "Pembayaran Berhasil",
        text: "Terimakasih Telah Menyewa Mobil di CARify",
        icon: "success"
    });
    </script>
 @endif

 <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('frontend/images/bg_1.jpg') }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
        <div class="col-lg-8 ftco-animate">
          <div class="text w-100 text-center mb-md-5 pb-md-5">
            <h1 class="mb-4">Cepat &amp; Mudah Untuk Merental Mobil</h1>
            <p style="font-size: 18px;"></p>
            <a href="#"
              class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-play"></span>
              </div>
              <div class="heading-title ml-5">
                <span>Cara Mudah Untuk Merental Mobil</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-12	featured-top">
          <div class="row justify-content-center no-gutters">
            <div class="col-md-10 d-flex align-items-center">
              <div class="services-wrap rounded-right w-100">
                <h3 class="heading-section text-center mb-4">Cara Terbaik Untuk Merental Mobil</h3>
                <div class="row d-flex mb-4">
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-route"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Pilih Lokasi Penjemputan</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-handshake"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Pilih Harga Paling Sesuai</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex justify-content-center align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-rent"></span></div>
                      <div class="text w-100 text-center mx-auto m-auto">
                        <h3 class="heading mb-2 text-center">Pesan Mobil yang Anda Pilih</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="text-center mt-5"><a href="{{ route('car') }}"
                    class="btn text-center mx-auto m-auto ml-auto btn-primary py-3 px-4">Sewa Mobil Terbaik Anda</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">Apa Yang Kami Tawarkan?</span>
          <h2 class="mb-2">Mobil Yang Tersedia</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">

            @foreach ($cars as $car)
            <div class="item">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url({{ Storage::url($car->thumbnail) }});">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="#">{{ $car->title }}</a></h2>
                  <div class="d-flex mb-3">
                    <p class="price ml-auto">Rp. {{ $car->price }} <span>/day</span></p>
                  </div>
                  <p class="d-flex mb-0 d-block"><a href="{{ route('car.sewa', $car->slug) }}" class="btn btn-primary py-2 mr-1">Pesan</a> <a
                      href="{{ route('car.show', $car->slug) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-about">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
          style="background-image: url({{ asset('frontend/images/about.jpg') }});">
        </div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
            <span class="subheading">About us</span>
            <h2 class="mb-4">Selamat datang di Carfy </h2>

            <p>Destinasi Terbaik Anda untuk Rental Mobil!</p>
            <p>Carfy adalah platform inovatif yang dirancang khusus untuk memenuhi kebutuhan perjalanan Anda dengan
                menyediakan layanan rental mobil yang mudah, cepat, dan handal. Dengan komitmen kami untuk memberikan
                pengalaman berkendara yang tak terlupakan, Carify menjadi pilihan utama bagi mereka yang mencari solusi
                transportasi yang efisien dan nyaman.</p>

            <p><a href="{{ route('car') }}" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
