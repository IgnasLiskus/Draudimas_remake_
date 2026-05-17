@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h3>Redaguoti Automobilį</h3>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('cars.update',$car->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Reg. numeris</label>
                        <input type="text" name="reg_nimber" value="{{ $car->reg_number }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gamintojas</label>
                        <input type="text" name="brand" value="{{ $car->brand }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Modelis</label>
                        <input type="text" name="model" value="{{ $car->model }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sąvininko ID</label>
                        <input type="text" name="owner_id" value="{{ $car->owner_id }}" class="form-control">
                    </div>


                    <button class="btn btn-success">
                        Atnaujinti
                    </button>

                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                        Atgal
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
