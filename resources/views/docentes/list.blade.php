@extends('layouts.app')

@section('title', 'Lista de Docentes')

@section('tituloContent','Lista de Docentes')

@section('content')

    <div class="table-responsive">
        <div class="card-header">
            <!-- Buscador por apellidos -->
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <ul class="navbar-nav mr-auto">
                    {!! Form::open(['route' => 'docentes.list', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                        <div class="form-inline navbar-form pull-right">
                            <label for="buscar">Buscar por apellido: </label>
                            {!! Form::text('apellido', null, ['class' => 'form-control mr-sm-2', 'placeholder' => 'Buscar..', 'aria-label' => 'search']) !!}
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </div>
                    {!! Form::close() !!}
                    <!-- Fin Buscador -->
                </ul>
                @if(Auth::check())
                    <a href="{{route('docentes.create')}}" class="btn btn-primary">Nuevo Docente</a>
                @endif
            </nav>
            
            
        </div>
        

       <table class="table table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Acción</th>
                </tr>
            </thead>
           <tbody>
                @foreach($docs as $doc)
                    <tr>
                        <td>{{$doc -> apellido}}</td>
                        <td>{{$doc -> nombre}}</td>
                        <td>{{$doc -> email}}</td>

                        <td>
                            @if(Auth::check())
                                <a href="{{route('docentes.edit', $doc->id)}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Editar info"></i></a>
                            @endif
                            <a href="{{route('docentes.verasignaturas', $doc->id)}}"><i class="far fa-user" data-toggle="tooltip" data-placement="top" title="Ver Asignaturas"></i></a>
                        </td>

                    </tr>
                @endforeach
           </tbody>
       </table>
        {!! $docs->render() !!}
        
   </div>

@endsection
