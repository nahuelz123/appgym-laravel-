@extends('layout')

@section('content')
    <div class="container">
        <header>
            <h1>Mis Rutinas Asignadas</h1>
        </header>

        @if($routines->isEmpty())
            <p>No tienes rutinas asignadas.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Descargar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($routines as $routine)
                        <tr>
                            <td>{{ $routine->title }}</td>
                            <td>{{ $routine->description }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $routine->file_path) }}" class="btn btn-primary" download>Descargar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
