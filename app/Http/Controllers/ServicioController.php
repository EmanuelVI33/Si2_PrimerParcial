<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Servicio;
use App\Models\Fumigacion;
use Illuminate\Http\Request;
use App\Models\DireccionServicio;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = DB::table('servicios')
                    ->get();

        return view('servi.index', ['servicios' => $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $servicios = Fumigacion::all();
        return view('servi.create', ['servicios' => $servicios]);
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
            'fecha' => ['required', 'date'],
            'estado' => ['required', 'numeric', 'between:1,3'],
            'total' => ['numeric'],
            'cliente_id' => ['required', 'numeric'],
            'direccion_servicio_id' => ['numeric'],
            'nota_servicio_id' => ['numeric'],
            'descripcion' => ['string'],
            'latitud' => ['required', 'string'],
            'longitud' => ['required', 'string'],
        ]);

        $direccion = DireccionServicio::create([
            'descripcion' => $request->descripcion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);

        $servicio = Servicio::create([
            'fecha' => $request->fecha,
            'estado' => $request->estado,
            'total' => 0,
            'cliente_id' => $request->cliente_id,
            'direccion_servicio_id' => $direccion->id,
        ]);

        return redirect()->route('servicio.index');


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
        //
    }

    public function espera()
    {
        $servicios = DB::table('servicios')
            ->where('estado',  1)
            ->get();

        return view('servi.index' , ['servicios' => $servicios]);
    }

    public function aceptar($id)
    {
        $empleados = DB::table('empleados')
            ->get();

        return view('servi.aceptar' , ['empleados' => $empleados, 'id' => $id]);
    }

    public function aceptarStore(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->estado = 2; // Aceptado
        $control = Control::create([
            'hora' => '17:00:00:00',
            'estado' => 1, 
            ''
        ]);

        return redirect()->route('servicio.index');
    }

}
