<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Requests\LibroRequest;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros=Libro::get();
        return response()->json($libros, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibroRequest $request)
    {
        //
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->editorial = $request->editorial;
        $libro->precio = $request->precio;
        $libro->autor()->associate(Autor::findOrFail($request->autor));
        $libro->save();
        return response()->json($libro, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
        return response()->json($libro, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(LibroRequest $request, Libro $libro)
    {
        //
        $libro->titulo = $request->titulo;
        $libro->editorial = $request->editorial;
        $libro->precio = $request->precio;
        $libro->autor()->associate(Autor::findOrFail($request->autor));
        $libro->save();
        return response()->json($libro, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
        $libro->delete();
        return response()->json(null, 204);
    }
}
