<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // 
    public function index(Request $request)
    {

        // Obtiene el valor de la búsqueda
        $buscar = trim($request->get('buscar'));
        
        // Se realiza la consulta con los datos de la búsqueda
        $usuarios = Usuario::where('nombre', 'LIKE', "%{$buscar}%")
        ->orWhere('apellido', 'LIKE', "%{$buscar}%")
        ->paginate(10);
        
        // Muestra la vista con una lista de usuarios según la búsqueda
        return view('usuario.index', compact('usuarios', 'buscar'));

    }


    public function store(Request $request) 
    {
        // Validar los campos requeridos y el formato del correo electrónico
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correoElectronico' => 'required|email',
            'contra' => 'required|min:8',
        ]);
    
        // Crea una instancia del modelo Usuario
        $usuario = new Usuario;
    
        // Asigna los valores recibidos a los atributos del modelo
        $usuario->nombre = $validatedData['nombre'];
        $usuario->apellido = $validatedData['apellido'];
        $usuario->correoElectronico = $validatedData['correoElectronico'];
        $usuario->contra = $validatedData['contra'];
    
        // Guarda los datos en la BD
        $usuario->save();
    
        // Envía una respuesta JSON con un mensaje de éxito
        return response()->json(['message' => 'El usuario se ha creado correctamente']);
    }
    
 
}
