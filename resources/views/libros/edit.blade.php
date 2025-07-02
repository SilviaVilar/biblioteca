@extends('plantilla')
@section('titulo', 'Editar libro')
@section('contenido')
	<h1>Editar libro</h1>
	<form action="{{ route('libros.update',$libro->id) }}" method="POST">
		@csrf
        @method('PUT')
       
			<label for="titulo">Título:</label>
			<input type="text" name="titulo"
				id="titulo" value="{{$libro->titulo}}">
		
			<label for="editorial">Editorial:</label>
			<input type="text" name="editorial"
				id="editorial" value="{{$libro->editorial}}">
		
			<label for="precio">Precio:</label>
			<input type="text" name="precio"
				id="precio" value="{{$libro->precio}}">
		
		</div>
		<input type="submit" name="enviar" value="Enviar"
			class="btn btn-dark btn-block">
	</form>
	@if ($errors->has('titulo'))
		<div><font color="red">
			{{ $errors->first('titulo') }}
		</font></div>
	@endif
	@if ($errors->has('editorial'))
		<div><font color="red">
			{{ $errors->first('editorial') }}
		</font></div>
	@endif
	@if ($errors->has('precio'))
		<div><font color="red">
			{{ $errors->first('precio') }}
		</font></div>
	@endif
@endsection