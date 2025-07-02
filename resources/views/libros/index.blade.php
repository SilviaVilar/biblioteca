@extends ('plantilla')
@section('titulo', 'inicio')
@section('contenido')
    <h1>Listado de libros</h1>
    @foreach($libros as $libro)
        <p>{{ $libro->titulo }} &nbsp ({{$libro->autor->nombre}}) 
            <a href="{{ route('libros.show', $libro) }}">Mostrar</a> &nbsp
            <form action="{{ route('libros.destroy', $libro) }}" method="POST">
                @method('DELETE')
                @csrf
                <button>Borrar</button>
            </form>
        </p>
    @endforeach
@endsection