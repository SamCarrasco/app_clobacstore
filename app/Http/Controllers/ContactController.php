<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'numero' => 'required|string|max:15',
            'mensaje' => 'required|string|max:500',
        ]);

        // Insertar los datos en la base de datos
        Contact::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'numero' => $request->input('numero'),
            'mensaje' => $request->input('mensaje'),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
