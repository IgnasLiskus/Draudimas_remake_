@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h3>Pridėti automobilį</h3>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('cars.store') }}">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Reg. numeris</label>
                        <input type="text" name="reg_number" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gamintojas</label>
                        <input type="text" name="brand" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Modelis</label>
                        <input type="text" name="model" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sąvininko ID</label>
                        <input type="text" name="owner_id" class="form-control">
                    </div>

                    <button class="btn btn-success">
                        Išsaugoti
                    </button>

                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                        Atgal
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection

