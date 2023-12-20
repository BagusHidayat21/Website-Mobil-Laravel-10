<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {

        $cars = Car::where('status', 'tersedia')->latest()->get();
        return view('frontend.homepage', compact('cars'));
    }
}
