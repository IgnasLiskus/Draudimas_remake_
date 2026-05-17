@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h2>Automobiliai</h2>

            <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">
                Pridėti automobilį
            </a>

        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-striped table-bordered">

                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Reg. numeris</th>
                        <th>Gamintojas</th>
                        <th>Modelis</th>
                        <th>Savininko ID</th>
                        <th>Veiksmai</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cars as $car)

                        <tr>

                            <td>{{ $car->id }}</td>
                            <td>{{ $car->reg_number }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->owner_id }}</td>

                            <td>

                                <a href="/cars/{{ $car->id }}/edit" class="btn btn-warning btn-sm">
                                    Redaguoti
                                </a>

                                <form action="{{ route('cars.destroy',$car->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
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
