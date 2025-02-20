<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAlumnoRequest;
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth'); // Protege todas las rutas del controlador
     }
 
    public function index()
    {
        $alumnos = Alumno::all(); // Obtiene todos los alumnos
        return view('alumnos.index', compact('alumnos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('alumnos.create');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateAlumnoRequest $request, Alumno $alumno){
    $alumno->create($request->validated());
    return redirect()->route('alumnos.create')->with('success', 'Alumno agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno){
    $alumno->update($request->validated());
    return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
    
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
    
}
