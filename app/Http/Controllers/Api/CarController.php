<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $cars = ($user->isAdmin() || $user->isViewer())
            ? Car::with(['owner', 'photos'])->get()
            : Car::with(['owner', 'photos'])
                ->whereHas('owner', fn($q) => $q->where('user_id', $user->id))
                ->get();

        return response()->json($cars);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'reg_number' => ['required', 'regex:/^[A-Z]{3}[0-9]{3}$/', 'unique:cars,reg_number'],
            'brand'      => 'required|min:2|max:50',
            'model'      => 'required|min:1|max:50',
            'owner_id'   => 'required|exists:owners,id',
        ]);

        // non-admin can only assign to their own owner
        if (!$user->isAdmin()) {
            $ownerBelongsToUser = Owner::where('id', $data['owner_id'])
                ->where('user_id', $user->id)
                ->exists();

            if (!$ownerBelongsToUser) {
                return response()->json(['message' => 'Forbidden.'], 403);
            }
        }

        $car = Car::create($data);

        return response()->json($car->load('owner'), 201);
    }

    public function show(Request $request, Car $car)
    {
        $user = $request->user();

        if (!$user->isAdmin() && !$user->isViewer() && $car->owner->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden.'], 403);
        }

        return response()->json($car->load(['owner', 'photos']));
    }

    public function update(Request $request, Car $car)
    {
        $user = $request->user();

        if (!$user->isAdmin() && $car->owner->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden.'], 403);
        }

        $data = $request->validate([
            'reg_number' => ['required', 'regex:/^[A-Z]{3}[0-9]{3}$/', Rule::unique('cars')->ignore($car->id)],
            'brand'      => 'required|min:2|max:50',
            'model'      => 'required|min:1|max:50',
            'owner_id'   => 'required|exists:owners,id',
        ]);

        $car->update($data);

        return response()->json($car->load('owner'));
    }

    public function destroy(Request $request, Car $car)
    {
        if (!$request->user()->isAdmin()) {
            return response()->json(['message' => 'Forbidden.'], 403);
        }

        $car->delete();

        return response()->json(['message' => 'Car deleted.']);
    }
}
