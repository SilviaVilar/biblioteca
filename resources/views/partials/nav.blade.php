<nav>
    <a href="{{ route('inicio') }}">Página de inicio </a>
    &nbsp;&nbsp;
    <a href="{{ route('libros.index') }}">Listado de libros</a>
    &nbsp;&nbsp;
    @if(auth()->check())
    <a href="{{ route('libros.create') }}">Crear libro</a>
    &nbsp;&nbsp;
    <a href="{{ route('logout') }}">Cerrar sesión</a>
    @endif
</nav>