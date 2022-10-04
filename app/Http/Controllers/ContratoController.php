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
    public function create($id)
    {
        $cargos = DB::table('cargos')
                    ->select('id', 'nombre', 'salario_min', 'salario_max')
                    ->get();

        $horarios = DB::table('horarios')
                    ->select('id', 'nombre', 'hora_entrada', 'hora_salida')
                    ->get();

        $empleado = DB::table('empleados')
                    ->select('id', 'nombre', 'apellido')
                    ->where('id', $id)
                    ->first();

        return view('contrato.create', ['cargos' => $cargos, 
                                        'horarios' => $horarios, 
                                        'empleado' => $empleado]);
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
        $empleado->estado = 'L';
        $empleado->save();

        return redirect()->route('contrato.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargos = DB::table('cargos')
                    ->select('id', 'nombre', 'salario_min', 'salario_max')
                    ->get();

        $horarios = DB::table('horarios')
                    ->select('id', 'nombre', 'hora_entrada', 'hora_salida')
                    ->get();

        $contrato = Contrato::find($id);

        $vacacion = $contrato->vacacion(); 

        return view('contrato.show', [ 'cargos' => $cargos, 
                                                    'horarios' => $horarios,
                                                    'contrato' => $contrato,
                                                    'vacacion' => $vacacion]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargos = DB::table('cargos')
                    ->select('id', 'nombre', 'salario_min', 'salario_max')
                    ->get();

        $horarios = DB::table('horarios')
                    ->select('id', 'nombre', 'hora_entrada', 'hora_salida')
                    ->get();

        $contrato = DB::table('contratos')
                    ->select('id', 'tipo', 'fecha_inicio','sueldo', 'duracion', 'vacacion_id')
                    ->where('id', $id)
                    ->first();

        $vacacion = DB::table('vacacions')
                    ->select('id', 'fecha_inicio','fecha_fin', 'duracion')
                    ->where('id', $contrato->vacacion_id)
                    ->first();

        return view('contrato.edit', [ 'cargos' => $cargos, 
                                        'horarios' => $horarios,
                                        'contrato' => $contrato,
                                        'vacacion' => $vacacion]);  
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
        $request->validate([
            'tipo' => ['numeric', 'between:1,2'],
            'duracion' => ['nullable', 'numeric'],
            'fecha_inicio' => ['date'],
            'sueldo' => ['numeric'],
            'cargo_id' => ['numeric'],
            'horario_id' => ['numeric'],
            'vacacion_fecha_inicio' => ['date'],
            'vacacion_fecha_fin' => ['date'],
            'vacacion_duracion' => ['numeric'],
        ]);

        $contrato = Contrato::find($id);
        $contrato->tipo = $request->tipo;
        $contrato->duracion = $contrato->tipo == 2 ? $request->duracion : null;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->sueldo = $request->sueldo;  
        $contrato->cargo_id = $request->cargo_id;
        $contrato->horario_id = $request->horario_id;
        
        $vacacion = DB::table('vacacions')
                    ->select('fecha_inicio', 'fecha_fin', 'duracion')
                    ->first();

        $vacacion->fecha_inicio = $request->fecha_inicio;
        $vacacion->fecha_fin = $request->fecha_fin;
        $vacacion->duracion = $request->duracion;
        $vacacion->update();

        return redirect()->route('contrato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();

        return redirect()->route('contrato.index');
    }
}
