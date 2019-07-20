@extends('layouts.app')

@section('title', 'Editar Docentes')

@section('tituloContent','Editar Información del Docente ' . $docente->apellido." ".$docente->nombre)

@section('content')

    {!! Form::open(['route' => ['docentes.update', $docente->id], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nombre: ') !!}
        {!! Form::text('nombre',$docente->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        {!! Form::label('apellido', 'Apellido: ') !!}
        {!! Form::text('apellido', $docente->apellido, ['class' => 'form-control', 'placeholder' => 'Apellido']) !!}
        {!! Form::label('email', 'E-mail: ') !!}
        {!! Form::text('email', $docente->email, ['class' => 'form-control', 'placeholder' => 'Email del docente']) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}

    </div>
    
    {!! Form::close() !!}

@endsection