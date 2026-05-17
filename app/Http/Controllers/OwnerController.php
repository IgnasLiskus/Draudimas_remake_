<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        // admin & viewer see all, plain user sees only own
        if ($user->isAdmin() || $user->isViewer()) {
            $owners = Owner::all();
        } else {
            $owners = Owner::where('user_id', $user->id)->get();
        }

        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        $this->authorize('create', Owner::class);
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Owner::class);

        $request->validate([
            'name'    => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'phone'   => 'required|regex:/^[0-9+\-\s()]+$/|min:8|max:20',
            'email'   => 'required|email|unique:owners,email',
            'address' => 'required|min:5|max:255',
        ], [
            'name.required'    => __('Name is required'),
            'name.min'         => __('Name must be at least 2 characters'),
            'name.max'         => __('Name must be less than 50 characters'),
            'surname.required' => __('Surname is required'),
            'surname.min'      => __('Surname must be at least 2 characters'),
            'surname.max'      => __('Surname must be less than 50 characters'),
            'phone.required'   => __('Phone is required'),
            'phone.regex'      => __('Please enter a valid phone number'),
            'phone.min'        => __('Phone must be at least 8 characters'),
            'phone.max'        => __('Phone must be less than 20 characters'),
            'email.required'   => __('Email is required'),
            'email.email'      => __('Please enter a valid email address'),
            'email.unique'     => __('Email address already exists'),
            'address.required' => __('Address is required'),
            'address.min'      => __('Address must be at least 5 characters'),
            'address.max'      => __('Address must be less than 255 characters'),
        ]);

        Owner::create([
            ...$request->all(),
            'user_id' => auth()->id(), // always assign creator as administrator
        ]);

        return redirect('/owners');
    }

    public function edit(Owner $owner)
    {
        $this->authorize('update', $owner);
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $this->authorize('update', $owner);

        $request->validate([
            'name'    => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'phone'   => 'required|regex:/^[0-9+\-\s()]+$/|min:8|max:20',
            'email'   => ['required', 'email', Rule::unique('owners')->ignore($owner->id)],
            'address' => 'required|min:5|max:255',
        ], [
            'name.required'    => __('Name is required'),
            'name.min'         => __('Name must be at least 2 characters'),
            'name.max'         => __('Name must be less than 50 characters'),
            'surname.required' => __('Surname is required'),
            'surname.min'      => __('Surname must be at least 2 characters'),
            'surname.max'      => __('Surname must be less than 50 characters'),
            'phone.required'   => __('Phone is required'),
            'phone.regex'      => __('Please enter a valid phone number'),
            'phone.min'        => __('Phone must be at least 8 characters'),
            'phone.max'        => __('Phone must be less than 20 characters'),
            'email.required'   => __('Email is required'),
            'email.email'      => __('Please enter a valid email address'),
            'email.unique'     => __('Email address already exists'),
            'address.required' => __('Address is required'),
            'address.min'      => __('Address must be at least 5 characters'),
            'address.max'      => __('Address must be less than 255 characters'),
        ]);

        $owner->update($request->all());
        return redirect('/owners');
    }

    public function destroy(Owner $owner)
    {
        $this->authorize('delete', $owner);
        $owner->delete();
        return redirect('/owners');
    }
}
