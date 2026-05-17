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
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <h5 class="mt-3">{{ __('Photos') }}</h5>

                @if($car->photos->isNotEmpty())
                    <div class="d-flex flex-wrap gap-3 mb-3">

                        @foreach($car->photos as $photo)
                            <div class="text-center">

                                <img
                                    src="{{ Storage::url($photo->path) }}"
                                    alt="Car photo"
                                    style="width:150px; height:100px; object-fit:cover; border-radius:6px;"
                                >

                                <form
                                    action="{{ route('cars.photos.destroy', $photo) }}"
                                    method="POST"
                                    class="mt-1"
                                    onsubmit="return confirm('Delete this photo?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑 {{ __('Delete') }}
                                    </button>
                                </form>

                            </div>
                        @endforeach

                    </div>
                @else
                    <p class="text-muted">{{ __('No photos yet.') }}</p>
                @endif

                <form
                    action="{{ route('cars.photos.store', $car) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="mt-2"
                >
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{ __('Upload Photos') }}</label>
                        <input
                            type="file"
                            name="photos[]"
                            class="form-control @error('photos.*') is-invalid @enderror"
                            multiple
                            accept="image/*"
                        >
                        @error('photos.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        ⬆ {{ __('Upload') }}
                    </button>

                </form>

            </div>
        </div>

    </div>

@endsection
