<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with(['owner', 'photos'])->get();
        return view('cars.index', compact('cars'));
    }
    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'reg_number' => [
                'required',
                'regex:/^[A-Z]{3}[0-9]{3}$/',
                'unique:cars,reg_number'
            ],
            'brand' => 'required|min:2|max:50',
            'model' => 'required|min:1|max:50',
            'owner_id' => 'required|exists:owners,id'
            ],[
                'reg_number.required' => __('Reg number is required'),
                'reg_number.regex' => __('Reg number is not in correct format'),
                'reg_number.unique' => __('Reg number is already registered'),
                'brand.required' => __('Brand is required'),
                'brand.min' => __('Brand must be at least 2 characters'),
                'brand.max' => __('Brand must be less than 50 characters'),
                'model.required' => __('Model is required'),
                'model.min' => __('Model must be at least 1 characters'),
                'model.max' => __('Model must be less than 50 characters'),
                'owner_id.required' => __('Owner is required'),
                'owner_id.exists' => __('Owner not found')
            ]);

        Car::create($request->all());
        return redirect('/cars');
    }
    public function edit(Car $car)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $car->load('photos');
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }
    public function update(Request $request, Car $car)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'reg_number' => [
                'required',
                'regex:/^[A-Z]{3}[0-9]{3}$/',
                Rule::unique('cars')->ignore($car->id)
            ],
            'brand' => 'required|min:2|max:50',
            'model' => 'required|min:1|max:50',
            'owner_id' => 'required|exists:owners,id'
        ],[
            'reg_number.required' => __('Reg number is required'),
            'reg_number.regex' => __('Reg number is not in correct format'),
            'reg_number.unique' => __('Reg number is already registered'),
            'brand.required' => __('Brand is required'),
            'brand.min' => __('Brand must be at least 2 characters'),
            'brand.max' => __('Brand must be less than 50 characters'),
            'model.required' => __('Model is required'),
            'model.min' => __('Model must be at least 1 characters'),
            'model.max' => __('Model must be less than 50 characters'),
            'owner_id.required' => __('Owner is required'),
            'owner_id.exists' => __('Owner not found')
        ]);

        $car->update($request->all());

        return redirect('/cars');
    }
    public function destroy(Car $car)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $car->delete();

        return redirect('/cars');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
