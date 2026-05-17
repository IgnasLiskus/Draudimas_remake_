@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h3>{{ __('translation.add_owner') }}</h3>
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

                <form method="POST" action="{{ route('owners.store') }}">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.name') }}</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.surname') }}</label>
                        <input type="text" name="surname" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.phone_number') }}</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.E_mail') }}</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('translation.address') }}</label>
                        <input type="text" name="address" class="form-control">
                    </div>

                    <button class="btn btn-success">
                        {{ __('translation.save') }}
                    </button>

                    <a href="{{ route('owners.index') }}" class="btn btn-secondary">
                        {{ __('translation.back') }}
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection

