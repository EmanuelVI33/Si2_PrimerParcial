<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\Vacacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::all();
        return view('contrato.index', ['contratos' => $contratos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = DB::table('cargos')
                    ->select('id', 'nombre', 'salario_min', 'salario_max')
                    ->get();

        $horarios = DB::table('horarios')
                    ->select('id', 'nombre', 'hora_entrada', 'hora_salida')
                    ->get();

        $empleados = DB::table('empleados')
                    ->select('id', 'nombre', 'apellido', 'ci')
                    ->whereNull('contrato_id')
                    ->get();
        
        return view('contrato.create', ['cargos' => $cargos, 'horarios' => $horarios, 'empleados' => $empleados]);
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
            'tipo' => ['required', 'between:1,2'],
            'fecha_inicio' => ['required', 'date'],
            'sueldo' => ['required', 'numeric'],
            'cargo_id' => ['required'],
            'horario_id' => ['required'],
            'empleado_id' => ['required'],
            'vacacion_fecha_inicio' => ['required', 'date'],
            'vacacion_fecha_fin' => ['required', 'date'],
            'vacacion_duracion' => ['required', 'numeric'],
        ]);

        $vacacion = Vacacion::create([
            'fecha_inicio' => $request->vacacion_fecha_inicio,
            'fecha_fin' => $request->vacacion_fecha_fin,
            'duracion' => $request->vacacion_duracion,
        ]);

        if ($request->tipo == 1)
            $request->duracion = null;

        $contrato = Contrato::create([
            'tipo' => $request->tipo,
            'duracion' => $request->duracion,
            'fecha_inicio' => $request->fecha_inicio,
            'sueldo' => $request->sueldo,
            'cargo_id' => $request->cargo_id,
            'horario_id' => $request->horario_id,
            'vacacion_id' => $vacacion->id,
        ]);

        $empleado = Empleado::find($request->empleado_id);
        $empleado->contrato_id = $contrato->id;
        $empleado->save();

        return redirect()->route('contrato.index');
    }

    public function contratar($id) {
        return redirect()->route('contrato.create', ['empleado_id' => $id]);
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
}
