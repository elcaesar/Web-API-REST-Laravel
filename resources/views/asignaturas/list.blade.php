@extends('layouts.app')

@section('title', 'Lista de Asignaturas')
@section('tituloContent','Lista de Asignaturas - Plan de estudios '.$plan->nombre)

@section('content')
    
    <div class="card-header">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <!-- Buscador -->
            {!! Form::open(['route' => 'asignaturas.list', 'method' => 'GET', 'class' => 'form-inline my-2 my-lg-0']) !!}
                
            {!! Form::text('nombre', null, ['class' => 'form-control mr-sm-2', 'placeholder' => 'Buscar..', 'aria-label' => 'search']) !!}
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button> 
            {!! Form::close() !!}
            <!-- Fin Buscador -->
        </ul> 
        @if(Auth::check())
            <a href="{{route('asignaturas.create')}}" class="btn btn-primary">Nueva Asignatura</a>   
        @endif
        
        </nav>
    </div>
     <div class="card">
       <div class="card-body">
          <div id="mensaje"></div>
          <table id="listArticulos" class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Nombre</th>
                <th>Año</th>
                <th>Régimen</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              @foreach($asigs as $asig)
                <tr data-id="{{$asig->id}}">
                  <td>{{$asig -> nombre}}</td>
                  @switch($asig -> anio)
                    @case(1)
                      <td>{{'1er. Año'}}</td>
                      @break
                    @case(2)
                      <td>{{'2do. Año'}}</td>
                      @break
                    @case(3)
                      <td>{{'3er. Año'}}</td>
                      @break
                    @case(4)
                      <td>{{'4to. Año'}}</td>
                      @break
                    @case(5)
                      <td>{{'5to. Año'}}</td>
                      @break
                  @endswitch
                  <td>{{$asig -> regimen}}</td>
                  <td>
                    @if(Auth::check())
                        <a href="{{route('asignaturas.edit', $asig->id)}}"><i class="fas fa-edit fa-lg" data-toggle="tooltip" data-placement="top" title="Editar"></i></a>
                    @endif
                    <a href="{{route('asignaturas.verdocentes', $asig->id)}}"><i class="far fa-user fa-lg" data-toggle="tooltip" data-placement="top" title="Equipo docente"></i></a>

                    <a class="vercursada" href=""><i class="fas fa-chalkboard-teacher fa-lg" data-toggle="tooltip" data-placement="top" title="Ver cursadas"></i></a>
                  </td>
                  
                </tr>
                
              @endforeach
            </tbody>
          </table>
          {!! $asigs->render() !!}
       </div>
      </div>    
@endsection



