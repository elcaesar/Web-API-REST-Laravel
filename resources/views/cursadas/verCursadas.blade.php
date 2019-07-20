@extends('layouts.app')

@section('title', 'Ver Cursadas')

@section('tituloContent','Cursadas de la Asignatura '.$asigs->nombre)

@section('content')

    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cargo</th>

        </tr>
        </thead>
        <tbody>

        @foreach($asigs->docentes as $docentes)
            <tr>
                <td>{{$docentes -> nombre}}</td>
                <td>{{$docentes -> apellido}}</td>
                <td>{{$docentes -> pivot -> cargodocente}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{URL::previous()}}" class="btn btn-primary">Volver a la lista</a>

@endsection