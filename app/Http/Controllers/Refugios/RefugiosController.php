<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Models\Refugio;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRefugioRequest; // Agregar esta importación
use App\Http\Requests\UpdateRefugioRequest;


class RefugiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $refugios=Refugio::all();
        return view('Refugios.refugios-admin',compact('refugios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Refugio $refugio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refugio $refugio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Refugio $refugio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refugio $refugio)
    {
        //
    }
}
