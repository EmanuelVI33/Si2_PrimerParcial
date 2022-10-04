<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Rules\Password;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->texto);

        $empleados = DB::table('empleados')
                    ->select('id', 'nombre', 'apellido', 'ci', 'fecha_nacimiento', 'telefono', 'estado', 'contrato_id')
                    ->where('apellido', 'LIKE', '%'.$texto.'%')
                    ->orWhere('ci', 'LIKE', '%'.$texto.'%')
                    ->orderBy('apellido', 'asc')
                    ->paginate(10);

        return view('empleado.index', ['empleados' => $empleados, 'texto' => $texto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],  
            'ci' => ['required'], 
            'fecha_nacimiento' => ['required', 'date'], 
            'telefono' => ['max:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        // Creamos el usuario
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('empleado');

        // Validar si existe imagen
        if ($imagen = $request->file('image')) {
            $rutaGuardarImagen = 'empleado-fotos/';
            $imageUser = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imageUser);   // Movemos la imagen a la carpeta
        }

        // Creamos el empleado
        Empleado::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'ci' => $request->ci,
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'image' => $imageUser,
            'estado' => 'D',   // Estado Activo por defecto
            'user_id' => $user->id,
        ]);
        
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('contrato.index');  // Redirecciones para crear contrato
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('empleado.show', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleado.edit', ['empleado' => $empleado]);
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
            'nombre' => ['string', 'max:255'],
            'apellido' => ['string', 'max:255'],  
            'ci' => ['numeric'], 
            'fecha_nacimiento' => ['date'], 
            'telefono' => ['numeric','min:7'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);
        
        $empleado = Empleado::find($id);
        $imageUser = '';
        // Validar si existe imagen
        if ($imagen = $request->file('image')) {
            $rutaGuardarImagen = 'empleado-fotos/';
            $imageUser = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imageUser);   // Movemos la imagen a la carpeta
        }
        
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->ci = $request->ci;
        $empleado->telefono = $request->telefono;
        $empleado->image = $imageUser;
        $empleado->save();

        return redirect()->route('empleado.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return back();
    }
}
