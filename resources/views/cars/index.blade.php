@extends('layouts.app')
@php use Illuminate\Support\Facades\Storage; @endphp

@section('content')

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h2>{{ __('translation.cars') }}</h2>

            @auth
                @if(auth()->user()->role == 'admin')
                    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">
                        {{ __('translation.add_car') }}
                    </a>
                @endif
            @endauth
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-striped table-bordered">

                    <thead class="table-dark">
                    <tr>
                        <th>{{ __('translation.ID') }}</th>
                        <th>{{ __('translation.reg_number') }}</th>
                        <th>{{ __('translation.brand') }}</th>
                        <th>{{ __('translation.model') }}</th>
                        <th>{{ __('translation.owner_ID') }}</th>
                        <th>{{ __('Photos') }}</th>
                        <th>{{ __('translation.actions') }}</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->reg_number }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>

                            {{-- Photos column --}}
                            <td>
                                @if($car->photos->isNotEmpty())
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach($car->photos as $photo)
                                            <img
                                                src="{{ Storage::url($photo->path) }}"
                                                alt="Car photo"
                                                style="width:60px; height:45px; object-fit:cover; border-radius:4px;"
                                            >
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>

                            <td>
                                @auth
                                    @if(auth()->user()->role == 'admin')
                                        <a href="/cars/{{ $car->id }}/edit" class="btn btn-warning btn-sm">
                                            {{ __('translation.edit') }}
                                        </a>

                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">{{ __('translation.delete') }}</button>
                                        </form>
                                    @endif
                                @endauth
                            </td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>

    </div>

@endsection
