<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
            'Sexo' => 'required|string|max:20',
            'Profesion' => 'required|string|max:255',
        ]);

        Persona::create($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
            'Sexo' => 'required|string|max:20',
            'Profesion' => 'required|string|max:255',
        ]);

        $persona = Persona::find($id);

        if (!$persona) {
            return redirect()->route('personas.index')->with('error', 'Persona no encontrada.');
        }

        $persona->update($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            return redirect()->route('personas.index')->with('error', 'Persona no encontrada.');
        }

        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
