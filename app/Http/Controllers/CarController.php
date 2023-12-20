<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Sewa;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('status', 'tersedia')->paginate(3);
        return view('frontend.car',compact('cars'));
    }
    public function show(Car $car)
    {
        $related_cars = Car::where('status', 'tersedia')->get();
        return view('frontend.detail', compact('car','related_cars'));
    }
    public function check(Request $request)
    {
        $request->nik;
        session(['nik' => $request->nik]);
        $nik = session('nik');
        $sewa = Sewa::where('nik', $nik)
                ->join('cars', 'sewas.car_id', '=', 'cars.id')
                ->get();
        return view('frontend.check', compact('sewa'));
    }
}
