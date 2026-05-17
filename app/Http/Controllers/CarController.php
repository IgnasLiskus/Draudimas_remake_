<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Owner;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('owner')->get();
        return view('cars.index', compact('cars'));
    }
    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }
    public function store(Request $request)
    {
        Car::create($request->all());
        return redirect('/cars');
    }
    public function edit(Car $car)
    {
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }
}
