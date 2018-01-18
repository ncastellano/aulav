@extends('template_n.main')
@section('title')
Crear Usuario
@endsection

@section('content')

<div class="titulo">
<h3 >Crear Usuarios </h3>
</div>

<div class="tabla">
{!! Form::open(['route' => 'users.store', 'method' => 'POST','files' => true]) !!}


  <div class="form-group">


     {!! Form::label('name','Nombre')!!}
     {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre Completo','required'])!!}

  </div> 

  <div class="form-group">


     {!! Form::label('email','Correo Electronico')!!}
     {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'example@gmail.com','required'])!!}


  </div> 

 <div class="form-group">


     {!! Form::label('password','Contraseña')!!}
     {!! Form::password('password',['class' => 'form-control', 'placeholder' => '*********','required'])!!}


  </div> 

  <div class="form-group">

  		{!! Form::label('type','Tipo') !!}
  		{!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción..', 'required']) !!}
  	

  </div>

  <div class="form-group">
  
       {!! Form::label('image','Foto') !!}
        {!! Form::file('image') !!}
 
</div>

  

  <div align="right">
  	
  	{!! Form::submit('Registrar', ['class' => 'btn btn-success'] )!!}

  </div>

</div>
  

 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}

 

@endsection