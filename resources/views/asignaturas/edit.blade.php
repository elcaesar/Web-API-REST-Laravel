@extends('layouts.app')

@section('title', 'Editar Asignaturas')



@section('tituloContent','Editar Asignatura ' . $asignatura->nombre. ' - Plan: '.$plan->nombre)

@section('content')
    
    {!! Form::open(['route' => ['asignaturas.update', $asignatura->id], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nombre: ') !!}
        {!! Form::text('nombre',$asignatura->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre de la Asignatura']) !!}
        {!! Form::label('plan', 'Plan: ') !!}
        
        {!! Form::select('plan_id',['1' => '2009','2'=>'1999'],'1',['class'=>'form-control','placeholder'=>'Año de plan de estudios']) !!}

        {!! Form::label('anio', 'Año cursada: ') !!}
        {!! Form::select('anio', array('1' => '1er Año',
                                           '2' => '2do Año',
                                           '3' => '3er Año',
                                           '4' => '4to Año',
                                           '5' => '5to Año'), null, ['class' => 'form-control']) !!}
        
        {!! Form::label('regimen', 'Régimen: ') !!}
        {!! Form::text('regimen', $asignatura->regimen, ['class' => 'form-control', 'placeholder' => 'Régimen']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        <a href="{{URL::previous()}}" class="btn btn-primary">Volver a la lista</a>
    </div>
    
    {!! Form::close() !!}

@endsection