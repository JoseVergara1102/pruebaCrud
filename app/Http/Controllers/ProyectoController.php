<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Persona;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('proyectos.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required',
            'Fecha_inicio' => 'required|date',
            'Fecha_entrega' => 'required|date',
            'Valor' => 'required|integer',
            'Lugar' => 'required|string|max:255',
            'Estado' => 'required|string|max:50',
            'Responsable' => 'nullable|exists:personas,Id_persona',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function show(Proyecto $proyecto)
    {
        $proyecto->load('responsable');
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit(Proyecto $proyecto)
    {
        $personas = Persona::all();
        return view('proyectos.edit', compact('proyecto', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Descripcion' => 'required',
            'Fecha_inicio' => 'required|date',
            'Fecha_entrega' => 'required|date',
            'Valor' => 'required|integer',
            'Lugar' => 'required|string|max:255',
            'Estado' => 'required|string|max:50',
            'Responsable' => 'nullable|exists:personas,Id_persona',
        ]);

        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado.');
        }

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado.');
        }

        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
}
