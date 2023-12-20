<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SewaController extends Controller
{
    public function index(Car $car)
    {
        return view ('frontend.sewa',compact('car'));
    }

    public function store(Request $request, $carSlug)
    {
        // Validasi form
        $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string',
            'telp' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'sewa' => 'required|date',
            'kembali' => 'required|date|after:sewa',
        ]);

        // Ambil mobil berdasarkan slug
        $car = Car::where('slug', $carSlug)->firstOrFail();

        // Simpan data sewa
        $sewa = new Sewa();
        $sewa->car_id = $car->id;
        $sewa->nik = $request->nik;
        $sewa->nama = $request->nama;
        $sewa->telp = $request->telp;

        // Proses upload foto dan simpan nama file ke database
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_ktp','public');
            $sewa->foto = $fotoPath;
        }

        $sewa->price = $request->price;
        $sewa->sewa = $request->sewa;
        $sewa->kembali = $request->kembali;
        $sewa->total = $request->total; // Sesuaikan dengan perhitungan total yang sesuai
        $sewa->save();

        $car->status = 'Tidak Tersedia';
        $car->save();

        session(['nik' => $request->nik]);
        return redirect()->route('bayar',$carSlug)->with('sewa', $sewa);
    }

    public function bayar($carSlug)
    {
        $sewas = session('nik');
        $sewa = Sewa::where('nik', $sewas)->get();
        $car = Car::where('slug', $carSlug)->first();
        return view ('frontend.bayar',compact('sewa','car'));
    }

    public function proses($carSlug)
    {
        $cars = Car::where('status', 'tersedia')->latest()->get();
        $car = Car::where('slug', $carSlug)->firstOrFail();

        $newStatus = 'Pembayaran Selesai';
        // Update the status for specific rows in the Sewa table
        Sewa::where('car_id', $car->id)
            ->where('status_pembayaran', '!=', $newStatus)
            ->update(['status_pembayaran' => $newStatus]);

        return redirect()->route('home')->with('success', 'Data berhasil disimpan!');
    }

    public function laporan()
    {
        // Ambil data (asumsi Sewa adalah model Eloquent)
        $laporan = Sewa::join('cars', 'sewas.car_id', '=', 'cars.id')
        ->get();
;

        // Persiapkan data yang akan dikirimkan ke view
        $data = [
            'date' => date('d/m/Y'),
            'laporan' => $laporan
        ];

        // Muat view dengan data yang disediakan
        $pdf = PDF::loadView('frontend.laporan', compact('data'));

        // Unduh PDF
        return $pdf->download('Laporan.pdf');
    }
}

