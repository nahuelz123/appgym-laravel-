<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoutineController extends Controller
{
    //funcion poara ver todas las rutinas
    /*   public function index()
    {
        $routines = Routine::all(); // Muestra todas las rutinas
        return view('routines.index', compact('routines'));
    } */


    public function index(Request $request)
    {
        // Obtiene el parámetro de búsqueda desde la solicitud
        $search = $request->input('search');

        // Filtra las rutinas en base al parámetro de búsqueda
        $routines = Routine::when($search, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get();

        // Retorna la vista con las rutinas filtradas
        return view('routines.index', compact('routines'));
    }



    //funcion para ver una rutina en particular
    public function show(Routine $routine)
    {
        return view('routines.show', compact('routine'));
    }
    // Muestra el formulario de creación de rutina
    public function create()
    {
        return view('routines.create'); // Muestra el formulario de creación de rutina
    }


    //funcion para crear la rutina o guardarla en la base de datos
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|file|mimes:pdf|max:2048', // Asegura que se suba un PDF
        ]);

        $filePath = $request->file('file_path')->store('routines'); // Guarda el archivo PDF

        routine::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'file_path' => $filePath,
            'coach_id' => Auth::user()->id
        ]);

        return redirect()->route('routines.index')->with('success', 'Rutina creada correctamente');
    }
    //funcion para ir a la vista que tiene el formulario para editar la rutina
    //si utilizamos la variable como una clase, nos saltamos el paso de buscar en este caso la rutina
    public function edit(Routine $routine)
    {
        // Muestra el formulario de edición
        return view('routines.edit', compact('routine'));
    }

    //funcion que guarda la actualizacion de los datos de las rutinas
    public function update(Request $request, $id)
    {
        $routine = Routine::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('routines');
            $routine->file_path = $filePath;
        }

        $routine->update($validated);

        return redirect()->route('routines.index')->with('success', 'Rutina actualizada correctamente');
    }

    //eliminar rutinas
    public function destroy(Routine $routine)
    {

        $routine->delete();

        return redirect()->route('routines.index')->with('success', 'Rutina eliminada correctamente');
    }


    public function download($id)
    {
        $routine = Routine::findOrFail($id);


        /*      // Verifica si el archivo existe
   if (!Storage::exists('public/' . $routine->file_path)) {
        abort(404, 'Archivo no encontrado');
    } 
    // Descarga el archivo
  return Storage::download('public/' . $routine->file_path); */
        // Verifica si el archivo existe
        if (!Storage::exists($routine->file_path)) {
            abort(404, 'Archivo no encontrado');
        }

        // Descarga el archivo
        //return Storage::download($routine->file_path);
        return Storage::download($routine->file_path, $routine->title . '.pdf');
    }
}
