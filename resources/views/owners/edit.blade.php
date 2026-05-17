@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h3>Redaguoti sąvininką</h3>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('owners.update',$owner->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Vardas</label>
                        <input type="text" name="name" value="{{ $owner->name }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pavardė</label>
                        <input type="text" name="surname" value="{{ $owner->surname }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tel. numeris</label>
                        <input type="text" name="phone" value="{{ $owner->phone }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E. paštas</label>
                        <input type="email" name="email" value="{{ $owner->email }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresas</label>
                        <input type="text" name="address" value="{{ $owner->address }}" class="form-control">
                    </div>

                    <button class="btn btn-success">
                        Atnaujinti
                    </button>

                    <a href="{{ route('owners.index') }}" class="btn btn-secondary">
                        Atgal
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
