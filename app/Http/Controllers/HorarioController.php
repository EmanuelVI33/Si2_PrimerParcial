<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horario.index', ['horarios' => $horarios]);
    }

    public function create()
    {
        return view('horario.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255', 'unique:horarios'],
            'hora_entrada' => ['required'],
            'hora_salida' => ['required'],
            'dia_libre' => ['required', 'numeric', 'between:1,7'],
        ]);

        Horario::create([
            'nombre' => $request->nombre,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'dia_libre' => $request->dia_libre,
        ]);

        return redirect()->route('horario.index');
    }

    public function edit($id) 
    {
        $horario = Horario::find($id);
        return view('horario.edit', ['horario' => $horario]);
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'nombre' => ['string', 'max:255'],
            'dia_libre' => ['numeric', 'between:1,7'],
        ]);    

        $horario = Horario::find($id);
        $horario->nombre = $request->nombre;
        $horario->hora_entrada = $request->hora_entrada;
        $horario->hora_salida = $request->hora_salida;
        $horario->dia_libre = $request->dia_libre;
        $horario->save();

        return redirect()->route('horario.index');
    }

    public function destroy($id) 
    {
        $horario = Horario::find($id);
        $horario->delete();

        return back();
    }
}
