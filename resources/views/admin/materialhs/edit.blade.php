@extends('template_n.main')
@section('title', 'Modificar proyectos')

@section('content')

<h3 class="title">Editar proyectos</h3>

<div class="tabla">
{!! Form::open(['route' => ['materialhs.update', $materialh], 'method' => 'PUT']) !!}

 <div class="form-group">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',$materialh->titulo,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',$materialh->descripcion,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('observacion','Observación')!!}
    {!! Form::text('Observacion',$materialh->Observacion,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

  </div>
 
  <div align="right">
  	
  	{!! Form::submit('Editar', ['class' => 'btn btn-success'] )!!}

  </div>

 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}

 </div>

@endsection