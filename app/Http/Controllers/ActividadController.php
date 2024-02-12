<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $todos = Actividad::all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function consultarTiempo()
    {
        $actividades = Actividad::with('horas')->get();
        return view('tiempo.show', compact('actividades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
        ]);
    
        $actividad = new Actividad;
        $actividad->title = $request->title;
        $actividad->save();

        return redirect()->route('todos')->with('success', 'Activity created successfully');
    }  

}
