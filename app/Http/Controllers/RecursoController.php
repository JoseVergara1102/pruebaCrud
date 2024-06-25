<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    public function index()
    {
        $recursos = Recurso::all();
        return view('recursos.index', compact('recursos'));
    }

    public function create()
    {
        return view('recursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:255',
            'Valor' => 'required|integer',
            'Unidad_de_medida' => 'required|string|max:255',
        ]);

        Recurso::create($request->all());

        return redirect()->route('recursos.index')->with('success', 'Recurso creado exitosamente.');
    }

    public function show(Recurso $recurso)
    {
        return view('recursos.show', compact('recurso'));
    }

    public function edit(Recurso $recurso)
    {
        return view('recursos.edit', compact('recurso'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:255',
            'Valor' => 'required|integer',
            'Unidad_de_medida' => 'required|string|max:255',
        ]);

        $recurso = Recurso::find($id);

        if (!$recurso) {
            return redirect()->route('recursos.index')->with('error', 'Recurso no encontrado.');
        }

        $recurso->update($request->all());

        return redirect()->route('recursos.index')->with('success', 'Recurso actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $recurso = Recurso::find($id);

        if (!$recurso) {
            return redirect()->route('recursos.index')->with('error', 'Recurso no encontrado.');
        }

        $recurso->delete();

        return redirect()->route('recursos.index')->with('success', 'Recurso eliminado exitosamente.');
    }
}
