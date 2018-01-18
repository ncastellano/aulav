@extends('template_n.main')

@section('title', 'Guías')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Guías de {{ ucfirst($asignatura[0]->descripcion) }}</h3></div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>Título</th>
   		<th>Descripción</th>
   		<th>Tipo de archivo</th>
   		<th>Observación</th>   	

      <tbody class="table">
       @foreach($guias as $guia)
       <tr>
           <td>{{ $guia->titulo }}</td>
           <td>{{ $guia->descripcion }}</td>
           <td>{{ $guia->archivo }}</td>
           <td>{{ $guia->Observacion }}</td>

            <td><a href="{{ route('guias.edit', $guia->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ route('guias.destroy', $guia->id) }}" onclick="return confirm('¿Seguro qué desea eliminar este vídeo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
        </tr>
        @endforeach
        </tbody>  	  
   	</thead>
</table>

   	<a href="{{ URL::to('/') }}/admin/guias/create/{{ ucfirst($asignatura[0]->id) }}" class="btn btn-success" >Agregar guía</a>
   	
@endsection