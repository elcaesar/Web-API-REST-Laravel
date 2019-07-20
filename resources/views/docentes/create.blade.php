@extends('layouts.app')

@section('title', 'Agregar Docentes')

@section('tituloContent','Agregar Docente')

@section('content')

    <!-- si personalizamos el objeto $request en un formulario para validar, cuando se pasa a la vista -->
    <!-- también pasa una variable $errors con o sin contenido -->

    @if(count($errors) > 0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

    {!! Form::open(['route' => 'docentes.store' , 'class' => 'form-inline']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nombre: ') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Docente']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apellido', 'Apellido: ') !!}
            {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido del Docente']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email de contacto: ') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email del docente']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tel1', 'Tel. Principal: ') !!}
            {!! Form::text('tel1', null, ['class' => 'form-control', 'placeholder' => 'Código de área + número']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tel2', 'Tel. Secundario: ') !!}
            {!! Form::text('tel2', null, ['class' => 'form-control', 'placeholder' => 'Código de área + número']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('emailsis', 'Email para login: ') !!}
            {!! Form::text('emailsistema', null, ['class' => 'form-control', 'placeholder' => 'Email del formato nombre@mail']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('passsis', 'Password: ') !!}
            {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una contraseña']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
        </div>

{!! Form::close() !!}

@endsection
