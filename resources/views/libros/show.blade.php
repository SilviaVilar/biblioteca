@extends ('plantilla')
@section('titulo', 'inicio')
@section('contenido')
    <h1>Ficha de libro {{$libro->id}}</h1>
    <p>Titulo: {{$libro->titulo}}</p>
    <p>Editorial: {{$libro->editorial}}</p>
    <p>PVP: {{$libro->precio}}</p>
    <p>Autor: {{$libro->autor->nombre}}</p>
    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Eliminar post" />
    </form>
    <div>
        <a class="btn btn-primary" href="{{ route('libros.edit', $libro->id) }}">Editar libro</a>
    </div>
    


@endsection