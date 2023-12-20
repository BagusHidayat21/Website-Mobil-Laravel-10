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
            <h1 class="mb-3 bread">Mobil Yang Pernah Anda Sewa</h1>
        </div>
    </div>
</div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">NIK</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Total Pembayaran</th>
                    <th class="text-center" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sewa as $s)
                <tr class="text-center">
                    <td>{{ $s->nik }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>Rp. {{ number_format($s->total, 0, ',', '.') }}</td>
                    <td>
                        @if($s->status_pembayaran == 'Menunggu Pembayaran')
                            <a href="{{ route('bayar', $s->slug) }}" class="btn-primary">Bayar</a>
                        @else
                            <span class="text-success">Sudah Dibayar</span>
                        @endif
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="services-wrap rounded-right w-100">
            <h3 class="text-center">Ingin Mencari Yang lain?</h3>
            <form action="{{ route('check') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control w-50 mx-auto" placeholder="Masukan NIK Anda" name="nik">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Cek Sekarang</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</section>


@endsection
