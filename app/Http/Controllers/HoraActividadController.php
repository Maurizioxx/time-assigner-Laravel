<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoraActividad;
use App\Models\Actividad;

class HoraActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = HoraActividad::all();
        return view('todos.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'activity_id' => 'required|exists:actividad,id',
            'fecha' => 'required|date',
            'horas' => 'required|numeric',
        ]);

        $actividad = Actividad::find($request->activity_id);
        $totalHoras = $actividad->horas()->sum("horas");

        if($totalHoras + $request->horas > 8){
            return redirect()->back()->with(
            'error', 'No se pueden asignar más de 8 horas a la tarea seleccionada');
        }

        $horaActividad = new HoraActividad;
        $horaActividad->actividad_id = $request->activity_id;
        $horaActividad->fecha = $request->fecha;
        $horaActividad->horas = $request->horas;
        $horaActividad->save();

        return redirect()->route('todos')->with('success', 'tiempo asignado exitosamente');
    }

    

  
   
}
