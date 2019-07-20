@extends('layouts.app')

@section('title', 'Cursadas')
@section('tituloContent','Lista de Cursadas')

@section('content')
    
    <div class="card-header">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
          <ul class="navbar-nav mr-auto">
            <h3>{{$asig->nombre.' - '}}</h3>
            <h3>{{'Plan '.$plan->nombre}}</h3>  
          </ul>
          @if(Auth::check())
            <a href="{{route('cursadas.create')}}" class="btn btn-primary">Nueva Cursada</a>
          @endif   
        </nav>
    </div>
     <div class="card">
       <div class="card-body">
          <table id="{{$asig->id}}" class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Año</th>
                <th>Estado</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($cursadas as $cursada)
                <tr data-id="{{$cursada->id}}">
                  <td>{{$cursada->anio}}</td>
                  @switch($cursada -> estado)
                    @case(1)
                      <td class="badge badge-success">En curso</td>
                      @break
                    @case(0)
                      <td class="badge badge-secondary">Finalizado</td>
                      @break
                  @endswitch
                  <td class="badge badge-primary"><a class="verdetalles" href="">Detalles</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {!! $cursadas->render() !!}
          <a href="{{URL::previous()}}" class="btn btn-primary">Volver a la lista</a>
       </div>

@endsection

@section("scripts")
  <script type="text/javascript">
    $(document).ready(function(){
      $(".verdetalles").click(function(){
        var asig = $("table").attr("id");
        var row = $(this).parents("tr");
        var idanio = row.data("id");
        alert("asignatura: "+asig+" Año: "+idanio);
      });
    });
  </script>
@endsection