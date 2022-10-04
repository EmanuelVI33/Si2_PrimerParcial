<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    


    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed')],
        ]);

        // Creamos el usuario
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('cliente');
        $this->storeCliente($request, $user->id);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    // Crea un CLiente
    public function storeCliente(Request $request, int $id) {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'ci' => ['required'],
            'telefono' => ['max:9'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],    
        ]);

         // Validar si existe imagen
         if ($imagen = $request->file('image')) {
            $rutaGuardarImagen = 'cliente-fotos/';
            $imageUser = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imageUser);   // Movemos la imagen a la carpeta
        }

        // Creamos el cliente
        Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'ci' => $request->ci,
            'telefono' => $request->telefono,
            'image' => $imageUser,
            'user_id' => $id,
        ]);
    }

    // Crea un CLiente
    public function storeEmpleado(Request $request, int $id) {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'ci' => ['required'],
            'telefono' => ['max:9'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],    
        ]);

        // Validar si existe imagen
         if ($imagen = $request->file('image')) {
            $rutaGuardarImagen = 'empleado-fotos/';
            $imageUser = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imageUser);   // Movemos la imagen a la carpeta
        }

        // Creamos el Empleado
        Empleado::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'ci' => $request->ci,
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'image' => $imageUser,
            'user_id' => $id,
        ]);

    }

    

    



}
