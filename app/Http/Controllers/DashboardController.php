<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recurso;
use App\Models\Persona;
use App\Models\Proyecto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRecursos = Recurso::count();
        $totalPersonas = Persona::count();
        $totalProyectos = Proyecto::count();

        $proyectosEstados = [
            'En Proceso' => Proyecto::where('Estado', 'En Proceso')->count(),
            'Entregado' => Proyecto::where('Estado', 'Entregado')->count(),
            'No Entregado' => Proyecto::where('Estado', 'No Entregado')->count(),
        ];

        $sexoLabels = ['Masculino', 'Femenino'];
        $sexoData = [
            Persona::where('Sexo', 'Masculino')->count(),
            Persona::where('Sexo', 'Femenino')->count()
        ];

        $recentActivities = $this->getRecentActivities();

        return view('dashboard', compact('totalRecursos', 'totalPersonas', 'totalProyectos', 'proyectosEstados', 'sexoLabels', 'sexoData', 'recentActivities'));
    }

    private function getRecentActivities()
    {
        $recentResources = Recurso::orderBy('created_at', 'desc')->take(3)->get();
        $recentPersons = Persona::orderBy('created_at', 'desc')->take(3)->get();
        $recentProjects = Proyecto::orderBy('created_at', 'desc')->take(3)->get();

        $recentActivities = [
            'resources' => [],
            'persons' => [],
            'projects' => []
        ];

        foreach ($recentResources as $resource) {
            $recentActivities['resources'][] = [
                'description' => "{$resource->Descripcion} añadido el {$resource->created_at->format('d M Y H:i')}",
                'date' => $resource->created_at
            ];
        }

        foreach ($recentPersons as $person) {
            $recentActivities['persons'][] = [
                'description' => "{$person->Nombre} {$person->Apellidos} registrada el {$person->created_at->format('d M Y H:i')}",
                'date' => $person->created_at
            ];
        }

        foreach ($recentProjects as $project) {
            $recentActivities['projects'][] = [
                'description' => "{$project->Descripcion} creado el {$project->created_at->format('d M Y H:i')}",
                'date' => $project->created_at
            ];
        }

        return $recentActivities;
    }
}
