@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h2>{{ __('translation.car_owners') }}</h2>

            @auth
                @if(auth()->user()->role == 'admin')
            <a href="{{ route('owners.create') }}" class="btn btn-primary">
                {{ __('translation.add_owner') }}
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
                        <th>{{ __('translation.name') }}</th>
                        <th>{{ __('translation.surname') }}</th>
                        <th>{{ __('translation.phone_number') }}</th>
                        <th>{{ __('translation.E_mail') }}</th>
                        <th>{{ __('translation.address') }}</th>
                        <th>{{ __('translation.actions') }}</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($owners as $owner)

                        <tr>

                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->surname }}</td>
                            <td>{{ $owner->phone }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->address }}</td>

                            <td>
                                @auth
                                    @if(auth()->user()->role == 'admin')
                                <a href="{{ route('owners.edit',$owner->id) }}" class="btn btn-warning btn-sm">
                                    {{ __('translation.edit') }}
                                </a>

                                <form action="{{ route('owners.destroy',$owner->id) }}" method="POST" style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        {{ __('translation.delete') }}
                                    </button>

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
