@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h3>{{ __('translation.edit_car') }}</h3>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('cars.update',$car->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.reg_number') }}</label>
                        <input type="text" name="reg_number" value="{{ $car->reg_number }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.brand') }}</label>
                        <input type="text" name="brand" value="{{ $car->brand }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.model') }}</label>
                        <input type="text" name="model" value="{{ $car->model }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.owner_ID') }}</label>
                        <input type="text" name="owner_id" value="{{ $car->owner_id }}" class="form-control">
                    </div>


                    <button class="btn btn-success">
                        {{ __('translation.update') }}
                    </button>

                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                        {{ __('translation.back') }}
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
