@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h2>Automobilių sąvininkai</h2>

            <a href="{{ route('owners.create') }}" class="btn btn-primary">
                Pridėti sąviniką
            </a>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-striped table-bordered">

                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Tel. numeris</th>
                        <th>E. paštas</th>
                        <th>Adresas</th>
                        <th>Veiksmai</th>
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

                                <a href="{{ route('owners.edit',$owner->id) }}" class="btn btn-warning btn-sm">
                                    Redaguoti
                                </a>

                                <form action="{{ route('owners.destroy',$owner->id) }}" method="POST" style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Ištrinti
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>

    </div>

@endsection
