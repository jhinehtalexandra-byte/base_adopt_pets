<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Mostrar data table de mascotas
     */
    public function mascotas()
    {
        // Aquí puedes agregar la lógica para obtener datos de mascotas
        // Por ejemplo: $mascotas = Mascota::all();
        
        return view('reportes.mascotas', [
            'title' => 'Reporte de Mascotas',
            'subtitle' => 'Listado completo de mascotas registradas'
        ]);
    }

    /**
     * Mostrar data table de adoptantes
     */
    public function adoptantes()
    {
        // Aquí puedes agregar la lógica para obtener datos de adoptantes
        // Por ejemplo: $adoptantes = User::where('role', 'adoptante')->get();
        
        return view('reportes.adoptantes', [
            'title' => 'Reporte de Adoptantes',
            'subtitle' => 'Listado completo de adoptantes registrados'
        ]);
    }

    /**
     * Mostrar data table de refugios
     */
    public function refugios()
    {
        // Aquí puedes agregar la lógica para obtener datos de refugios
        // Por ejemplo: $refugios = Refugio::all();
        
        return view('reportes.refugios', [
            'title' => 'Reporte de Refugios',
            'subtitle' => 'Listado completo de refugios afiliados'
        ]);
    }
}