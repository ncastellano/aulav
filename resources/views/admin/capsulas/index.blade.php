@extends('template_n.main')

@section('title', 'Cápsulas')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Cápsulas de {{ ucfirst($asignatura[0]->descripcion) }}</h3></div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>Título</th>
   		<th>Descripción</th>
   		<th>Tipo de archivo</th>
   		<th>Observación</th>   	

      <tbody class="table">
       @foreach($capsulas as $capsula)
       <tr>
           <td>{{ $capsula->titulo }}</td>
           <td>{{ $capsula->descripcion }}</td>
           <td>{{ $capsula->archivo }}</td>
           <td>{{ $capsula->Observacion }}</td>

            <td><a href="{{ route('capsulas.edit', $capsula->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ route('capsulas.destroy', $capsula->id) }}" onclick="return confirm('¿Seguro qué desea eliminar este vídeo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
        </tr>
        @endforeach
        </tbody>  	  
   	</thead>
</table>

   	<a href="{{ URL::to('/') }}/admin/capsulas/create/{{ ucfirst($asignatura[0]->id) }}" class="btn btn-success" >Agregar cápsula</a>
   	
@endsection