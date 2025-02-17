<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
     */public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'dni' => 'required|string|size:9|unique:alumnos,dni',
        'email' => 'required|email|unique:alumnos,email',
        'fechaNacimiento' => 'required|date',
        'idiomas' => 'nullable|string',
    ]);

    Alumno::create($request->all());

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
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => ['required', 'string', 'size:9', function ($attribute, $value, $fail) {
                $numero = substr($value, 0, 8);
                $letra = strtoupper(substr($value, -1));
                $letrasDni = "TRWAGMYFPDXBNJZSQVHLCKE";
                if ($letra !== $letrasDni[$numero % 23]) {
                    $fail("El DNI no es válido.");
                }
            }],
            'email' => 'required|email|max:255',
            'fechaNacimiento' => 'required|date|before:1980-01-01',
            'idiomas' => 'nullable|string',
        ]);
    
        $alumno->update($request->all());
    
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
