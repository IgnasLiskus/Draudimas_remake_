@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h3>{{ __('translation.edit_owner') }}</h3>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('owners.update',$owner->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.name') }}</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $owner->name }}"required>
                        <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.surname') }}</label>
                        <input type="text" id="surname" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') ?? $owner->surname }}" required>
                        <div class="invalid-feedback">@error('surname') {{ $message }} @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.phone_number') }}</label>
                        <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $owner->phone }}" required>
                        <div class="invalid-feedback">@error('phone') {{ $message }} @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.E_mail') }}</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $owner->email }}" required>
                        <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.address') }}</label>
                        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $owner->address }}" required>
                        <div class="invalid-feedback">@error('address') {{ $message }} @enderror</div>
                    </div>

                    <button class="btn btn-success">
                        {{ __('translation.update') }}
                    </button>

                    <a href="{{ route('owners.index') }}" class="btn btn-secondary">
                        {{ __('translation.back') }}
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
