<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Car $car)
    {
        $request->validate([
            'photos'   => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('cars', 'public');

            CarPhoto::create([
                'car_id' => $car->id,
                'path'   => $path,
            ]);
        }

        return back()->with('success', 'Photos uploaded successfully.');
    }

    public function destroy(CarPhoto $photo)
    {
        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return back()->with('success', 'Photo deleted.');
    }
}
