@extends('template_n.main')
@section('title', 'Modificar')

@section('content')

<h3 class="title">Editar</h3>

<div class="tabla">
{!! Form::open(['route' => ['materialcs.update', $materialc], 'method' => 'PUT']) !!}

 <div class="form-group">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',$materialc->titulo,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',$materialc->descripcion,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('observacion','Observación')!!}
    {!! Form::text('Observacion',$materialc->Observacion,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

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