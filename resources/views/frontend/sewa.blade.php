@extends('frontend.layout')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');"
data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
    <div class="col-md-9 ftco-animate pb-5">
      <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
              class="ion-ios-arrow-forward"></i></a></span> <span>Services <i
            class="ion-ios-arrow-forward"></i></span></p>
      <h1 class="mb-3 bread">Sewa Mobil</h1>
    </div>
  </div>
</div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <!-- Image on the left -->
            <div class="col-md-6">
                <div class="car-details">
                    <div class="text text-center">
                        <h2>{{ $car->title }}</h2>
                    </div>
                    <div class="img rounded" style="background-image: url({{ Storage::url($car->thumbnail) }}); background-size: cover; background-position: center; height: 300px;"></div>
                </div>
            </div>

            <!-- Form on the right -->
            <div class="col-md-6">
                <form action="{{ route('store', $car->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" placeholder="Masukan NIK Anda" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Lengkap Anda" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" placeholder="Masukan Nomor Telepon Anda" name="telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto KTP</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" id="price" class="form-control" value="{{ $car->price }}" readonly name="price" >
                    </div>
                    <div class="mb-3">
                        <label for="sewa" class="form-label">Tanggal Mulai Sewa</label>
                        <input type="date" id="sewa" class="form-control" name="sewa" required>
                    </div>
                    <div class="mb-3">
                        <label for="kembali" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" id="kembali" class="form-control" name="kembali" required>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Bayar</label>
                        <input type="text" id="total" class="form-control" placeholder="Total Bayar Anda" readonly name="total">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sewa</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
