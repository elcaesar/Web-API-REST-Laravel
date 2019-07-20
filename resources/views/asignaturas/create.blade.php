@extends('layouts.app')

@section('title', 'Agregar Asignaturas')

@section('tituloContent','Agregar Asignatura')

@section('content')

    {!! Form::open(['route' => 'asignaturas.store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nombre: ') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nombre de la Asignatura']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('plan', 'Plan: ') !!}
            {!! Form::select('plan_id', array('2' => 'Plan 1999', 
                                           '1' => 'Plan 2009'), 1, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('anio', 'Año cursada: ') !!}
            {!! Form::select('anio', array('1' => '1er Año',
                                           '2' => '2do Año',
                                           '3' => '3er Año',
                                           '4' => '4to Año',
                                           '5' => '5to Año'), null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('regimen', 'Régimen: ') !!}
            {!! Form::select('regimen', array('Cuatrimestral' => 'Cuatrimestral', 'Anual' => 'Anual'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}

        </div>
        
{!! Form::close() !!}

@endsection
