<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Autor;
use App\Http\Requests\LibroRequest;


class LibroController extends Controller
{
    //Creamos un constructor para que sólo los usuarios autenticados 
    //puedan acceder a las rutas de este controlador

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros = Libro::orderBy('titulo')->get();
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $autores = Autor::get();
        return view('libros.create', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [   //las reglas de validación
                'titulo' => 'required|min:5',
                'editorial' => 'required',
                'precio' => 'required|numeric|min:0'
            ],
            [ //los mensajes a mostrar si error
                'titulo.required' => 'El título es obligatorio',
                'titulo.min:5' => 'El título debe ser de al menos 5 caracteres',
                'editorial.required' => 'La editorial es obligatoria',
                'precio.required' => 'El precio es obligatorio',
                'precio.numeric' => 'El precio debe ser un número',
                'precio.min:0' => 'El precio debe ser igual o mayor que cero'
            ]
        );
        //
        $libro = new Libro();
        $libro->titulo = $request->get('titulo');
        $libro->editorial = $request->get('editorial');
        $libro->precio = $request->get('precio');
        $libro->autor()->associate(Autor::findOrFail($request->get('autor')));
        $libro->save();
        return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LibroRequest $request, $id)
    {
        //
        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->get('titulo');
        $libro->editorial = $request->get('editorial');
        $libro->precio = $request->get('precio');
        $libro->save();
        return view('libros.show', compact('libro'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $libro = Libro::findOrFail($id);
        $libro->delete();
        $libros = Libro::get();
        return view('libros.index', compact('libros'));
    }
}
