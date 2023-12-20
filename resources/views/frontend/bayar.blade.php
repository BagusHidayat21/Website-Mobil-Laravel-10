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
      <h1 class="mb-3 bread">Bayar Mobil</h1>
    </div>
  </div>
</div>
</section>

@if (session('sewa'))
<script>
    Swal.fire({
    title: "Sewa Berhasil",
    text: "Mohon Segera Lakukan Pembayaran",
    icon: "success"
});
</script>
@endif

<section class="ftco-section bg-light">
    <div class="container">
        <div class="text text-center mb-4">
            <h2>{{ $car->title }}</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="car-details">
                    <div class="img rounded" style="background-image: url({{ Storage::url($car->thumbnail) }}); background-size: cover; background-position: center; height: 300px;"></div>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{ route('proses.bayar', $car->slug) }}" method="POST">
                    @csrf
                    @foreach ($sewa as $s)
                    @if($s->status_pembayaran == 'Menunggu Pembayaran')
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" placeholder="Masukan NIK Anda" name="nik" value="{{ $s->nik }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Lengkap Anda" name="nama" value="{{ $s->nama }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" placeholder="Masukan Nomor Telepon Anda" name="telp" value="{{ $s->telp }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Bayar</label>
                        <input type="text" id="total" class="form-control" placeholder="Total Bayar Anda" readonly name="total" value="{{ $s->total }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Bayar</button>
                    @endif
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
