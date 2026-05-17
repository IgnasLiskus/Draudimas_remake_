<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $owners = ($user->isAdmin() || $user->isViewer())
            ? Owner::with('cars')->get()
            : Owner::with('cars')->where('user_id', $user->id)->get();

        return response()->json($owners);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'phone'   => 'required|regex:/^[0-9+\-\s()]+$/|min:8|max:20',
            'email'   => 'required|email|unique:owners,email',
            'address' => 'required|min:5|max:255',
        ]);

        $data['user_id'] = $request->user()->id;

        $owner = Owner::create($data);

        return response()->json($owner, 201);
    }

    public function show(Request $request, Owner $owner)
    {
        $user = $request->user();

        if (!$user->isAdmin() && !$user->isViewer() && $owner->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden.'], 403);
        }

        return response()->json($owner->load('cars'));
    }

    public function update(Request $request, Owner $owner)
    {
        $user = $request->user();

        if (!$user->isAdmin() && $owner->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden.'], 403);
        }

        $data = $request->validate([
            'name'    => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'phone'   => 'required|regex:/^[0-9+\-\s()]+$/|min:8|max:20',
            'email'   => ['required', 'email', Rule::unique('owners')->ignore($owner->id)],
            'address' => 'required|min:5|max:255',
        ]);

        $owner->update($data);

        return response()->json($owner);
    }

    public function destroy(Request $request, Owner $owner)
    {
        if (!$request->user()->isAdmin()) {
            return response()->json(['message' => 'Forbidden.'], 403);
        }

        $owner->delete();

        return response()->json(['message' => 'Owner deleted.']);
    }
}
