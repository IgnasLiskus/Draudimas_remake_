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
                        <input type="text" id="reg_number" name="reg_number" class="form-control @error('reg_number') is-invalid @enderror" value="{{ old('reg_number') ?? $car->reg_number }}" required>
                        <div class="invalid-feedback">@error('reg_number') {{ $message }} @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.brand') }}</label>
                        <input type="text" id="brand" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand') ?? $car->brand }}" required>
                        <div class="invalid-feedback">@error('brand') {{ $message }} @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.model') }}</label>
                        <input type="text" id="model" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model') ?? $car->model }}" required>
                        <div class="invalid-feedback">@error('model') {{ $message }} @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.owner_ID') }}</label>
                        <select id="owner_id" name="owner_id" class="form-control @error('owner_id') is-invalid @enderror">
                            <option value=""></option>
                        @foreach($owners as $owner)
                                <option value="{{ $owner->id }}" {{ old('owner_id', $car->owner_id ?? '') == $owner->id ? 'selected' : '' }}>
                                    {{ $owner->name }} {{ $owner->surname }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('owner_id') {{ $message }} @enderror</div>
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
