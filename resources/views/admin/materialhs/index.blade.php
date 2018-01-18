@extends('template_n.main')

@section('title', 'Materiales complementarios')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Materiales de {{ ucfirst($asignatura[0]->descripcion) }}</h3></div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>Título</th>
   		<th>Descripción</th>
   		<th>Tipo de archivo</th>
   		<th>Observación</th>   	

      <tbody class="table">
       @foreach($materialhs as $materialh)
       <tr>
           <td>{{ $materialh->titulo }}</td>
           <td>{{ $materialh->descripcion }}</td>
           <td>{{ $materialh->archivo }}</td>
           <td>{{ $materialh->Observacion }}</td>

            <td><a href="{{ route('materialhs.edit', $materialh->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ route('materialhs.destroy', $materialh->id) }}" onclick="return confirm('¿Seguro qué desea eliminar este vídeo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
        </tr>
        @endforeach
        </tbody>  	  
   	</thead>
</table>

   	<a href="{{ URL::to('/') }}/admin/materialhs/create/{{ ucfirst($asignatura[0]->id) }}" class="btn btn-success" >Agregar material</a>
   	
@endsection