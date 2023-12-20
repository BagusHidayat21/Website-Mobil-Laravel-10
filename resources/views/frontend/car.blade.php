@extends('frontend.layout')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                            class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i
                        class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Pilih Mobil Anda</h1>
        </div>
    </div>
</div>
</section>


<section class="ftco-section bg-light">
<div class="container">

    <h1>Mobil Yang Tersedia Saat Ini</h1>
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4">
            <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end"
                    style="background-image: url({{ Storage::url($car->thumbnail) }});">
                </div>
                <div class="text">
                    <h2 class="mb-0"><a href="{{ route('car.show', $car->slug) }}">{{ $car->title }}</a></h2>
                    <div class="d-flex mb-3">
                        <p class="price ml-auto">Rp. {{ $car->price }} <span>/day</span></p>
                    </div>
                    <p class="d-flex mb-0 d-block"><a href="{{ route('car.sewa', $car->slug) }}" class="btn btn-primary py-2 mr-1">Pesan</a> <a
                            href="{{ route('car.show', $car->slug) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                </div>
            </div>
        </div>
        @endforeach

        <div class="services-wrap rounded-right w-100">
            <h3 class="text-center">Sudah Pernah Menyewa Mobil?</h3>
            <form action="{{ route('check') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control w-50 mx-auto" placeholder="Masukkan NIK Anda" name="nik">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Cek Sekarang</button>
                </div>
            </form>
        </div>


    </div>
    <div class="row justify-content-center mt-5">
        <div class="text-center">
            {{ $cars->links() }}
        </div>
    </div>
</div>
</section>

@endsection
