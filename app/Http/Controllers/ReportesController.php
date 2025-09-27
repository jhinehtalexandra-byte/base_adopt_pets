<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Adoptante;
use App\Models\Mascota;
use App\Models\Refugio;

class ReportesController extends Controller
{
    public function index()
    {
        // Traer todos los datos de las tablas
        $adoptantes = Usuario::all();
        $mascotas = Mascota::all();
        $refugios = Refugio::all();

        return view('reportes.index', compact('adoptantes', 'mascotas', 'refugios'));
    }
}
