@extends('layouts.app')

@section('title', 'Ver Asignaturas')

@section('tituloContent','Asignaturas que dicta el docente '.$docs->apellido." ".$docs->nombre)

@section('content')

    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Plan</th>
            <th>Año</th>
            <th>Régimen</th>
            <th>Cargo</th>

        </tr>
        </thead>
        <tbody>

        @foreach($docs->asignaturas as $asignaturas)
            <tr>
                <td>{{$asignaturas -> nombre}}</td>
                <td>{{$asignaturas -> plan}}</td>
                <td>{{$asignaturas -> anio}}</td>
                <td>{{$asignaturas -> regimen}}</td>

                <td>{{$asignaturas -> pivot -> cargodocente}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{route('docentes.list')}}" class="btn btn-primary">Volver a la lista</a>

@endsection