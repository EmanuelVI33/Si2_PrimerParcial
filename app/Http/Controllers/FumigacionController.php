<?php

namespace App\Http\Controllers;

use App\Models\Fumigacion;
use Illuminate\Http\Request;

class FumigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fumigacion = Fumigacion::all();
        return view('fumi.index', ['fumigaciones' => $fumigacion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fumi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric'],
            'imagen' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $imageFum = '';
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImagen = 'fumigacion/';
            $imageFum = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imageFum);   // Movemos la imagen a la carpeta
        }

        $fumi = Fumigacion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $imageFum,
        ]);

        return redirect()->route('fumi.show', $fumi->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fumi = Fumigacion::find($id);
        return view('fumi.show', ['fumigacion' => $fumi]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fumigacion = Fumigacion::find($id);
        $fumigacion->delete();

        return back();
    }
}
