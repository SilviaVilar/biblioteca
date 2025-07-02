@extends('plantilla')
@section('titulo', 'Nuevo libro')
@section('contenido')
	<h1>Nuevo libro</h1>
	<form action="{{ route('libros.store') }}" method="POST">
		@csrf
		
			<label for="titulo">Título:</label>
			<input type="text" name="titulo"
				id="titulo" value="{{old('titulo')}}">

			<label for="editorial">Editorial:</label>
			<input type="text" name="editorial"
				id="editorial" value="{{old('editorial')}}">
		
			<label for="precio">Precio:</label>
			<input type="text" name="precio"
				id="precio" value="{{old('precio')}}">
		
			<label for="autor">Autor:</label>
			<select name="autor" id="autor" value="{{old('autor')}}">
				@foreach ($autores as $autor)
					<option value="{{ $autor->id }}">
						{{ $autor->nombre }}
					</option>
				@endforeach
			</select>

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
		</div>
		<input type="submit" name="enviar" value="Enviar"
			class="btn btn-dark btn-block">
	</form>
@endsection