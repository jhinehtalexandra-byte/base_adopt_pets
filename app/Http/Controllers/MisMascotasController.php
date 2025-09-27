<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MisMascotasController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        try {
            // Obtener adopciones del usuario autenticado
            $adopciones = DB::table('adopciones')
                ->where('id_adoptante', $userId)
                ->orderBy('fecha_solicitud', 'desc')
                ->get()
                ->toArray();
            
            // Si no hay adopciones, retornar arrays vacíos
            if (empty($adopciones)) {
                return view('mis-mascotas', [
                    'adopciones' => [],
                    'mascotas' => [],
                    'refugios' => [],
                    'seguimientos' => []
                ]);
            }
            
            // Obtener IDs de mascotas de las adopciones
            $mascotaIds = collect($adopciones)->pluck('id_mascota')->unique()->toArray();
            
            // Obtener datos de mascotas relacionadas
            $mascotas = DB::table('mascotas')
                ->whereIn('id_mascota', $mascotaIds)
                ->get()
                ->keyBy('id_mascota')
                ->toArray();
            
            // Obtener IDs de refugios de las mascotas
            $refugioIds = collect($mascotas)->pluck('id_refugio')->unique()->filter()->toArray();
            
            // Obtener datos de refugios
            $refugios = [];
            if (!empty($refugioIds)) {
                $refugios = DB::table('refugios')
                    ->whereIn('id_refugio', $refugioIds)
                    ->get()
                    ->keyBy('id_refugio')
                    ->toArray();
            }
            
            // Obtener seguimientos del usuario
            $seguimientos = DB::table('seguimientos')
                ->where('id_adoptante', $userId)
                ->orderBy('fecha_seguimiento', 'desc')
                ->limit(5)
                ->get()
                ->toArray();

            return view('mis-mascotas', compact('adopciones', 'mascotas', 'refugios', 'seguimientos'));
            
        } catch (\Exception $e) {
            // Log del error para debugging
            \Log::error('Error en MisMascotasController: ' . $e->getMessage());
            
            // Retornar vista con arrays vacíos en caso de error
            return view('mis-mascotas', [
                'adopciones' => [],
                'mascotas' => [],
                'refugios' => [],
                'seguimientos' => []
            ])->with('error', 'Error al cargar las mascotas. Por favor intenta más tarde.');
        }
    }
}