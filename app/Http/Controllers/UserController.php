<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query();
    
        // Filtra los usuarios basados en el rol del usuario logueado
        if (Auth::user()->role === 'coach') {
            $query->where('role', 'client');
        }
    
        // Aplicar filtros de búsqueda
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
    
        $users = $query->get();
    
        return view('user.index', compact('users'));
    }
    




    //funcion que muestra un listado de todos los usuarios 
    public function index2(): View
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Cargar todos los usuarios y sus asignaciones de rutinas
            $users = User::with('routineAssignments.routine')->get();
        } elseif ($user->role === 'coach') {
            // Cargar solo los clientes con sus asignaciones de rutinas
            $users = User::where('role', 'client')
                ->with('routineAssignments.routine')
                ->get();
        } else {
            // Si el rol no es 'admin' ni 'coach', devolver una colección vacía
            $users = collect();
        }

        return view('user.index', compact('users'));
        /*    $user = Auth::user();

    if ($user->role === 'admin') {
        $users = User::all();
    } elseif ($user->role === 'coach') {
        $users = User::where('role', 'client')->get();
    } else {
        $users = collect(); // Si es otro rol o no está autenticado, no mostrar usuarios.
    }

    return view('user.index', compact('users'));
 */
        //original 
        /*    $users = User::all();
        return view('user.index', compact('users')); */
    }

    // Muestra el formulario de creación de usuarios
    public function create(): View
    {
        return view('user.create');
    }

    //funcion para cambiar el role de los usuarios 
    public function updateRole(Request $request, User $user)
    {
        /*  $user = User::findOrFail($id); */
        $user->role = $request->input('role'); // Cambia el rol del usuario
        $user->save();

        return redirect()->route('user.index')->with('success', 'Rol actualizado correctamente');
    }


    //funcion para crear un nuevo usuario
    public function store(Request $request): RedirectResponse
    {

        User::create($request->all());
        /* 
       $note = new Note;
       $note->title = $request->title;
       $note->description = $request->description;
       $note->save(); */
        //note::create es si solo voy a guardar el dato y no operar con él 
        /*        Note::create([
           'title'=>$request->title,
           'description'=>$request->description
       ]); */
        /* para guardar todos los datos si el nombre de las variables en el formulario es igual que en las notas
       Note::create($request->all());
*/
        return  redirect()->route('user.index')->with('success', 'Note created');
    }
    //funcion para ir a la vista que tiene el formulario para editar el usuario
    //si utilizamos la variable como una clase, nos saltamos el paso de buscar en este caso la nota
    public function edit(User $user): View
    {

        return view('user.edit', compact('user'));
    }

    //funcion que guarda la actualizacion de los datos de los usuarios
    public function update(request $request, User $user): RedirectResponse
    {
        /* una forma de validar 
      $request->validate([
           'title'=>'required|max:255|min:3',
           'description'=>'required|max:255|min:3'
       ]); */
        $user->update($request->all());
        return  redirect()->route('user.index')->with('success', 'Note update');
    }

    //funcion para ver un usuario en particular
  /*   public function show(User $user): View
    {
        return view('user.show', compact('user'));
    } */

    //funcion para eliminar un usauario
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return  redirect()->route('user.index')->with('danger', 'Note delete');
    }

    public function show2()
    {
        // Obtener el usuario autenticado
    
        $user = Auth::user();
        $routineAssignment = $user->routineAssignments()->first();
        $routine = $routineAssignment ? $routineAssignment->routine : null;
        $coach = $routine ? $routine->coach : null;

        return view('profile.show', compact('user', 'routine', 'coach'));
    }

// UserController.php

public function show( $id)
{
    // Obtener el cliente por su ID
    $user = User::findOrFail($id);
    
    $routineAssignment = $user->routineAssignments()->first();
    $routine = $routineAssignment ? $routineAssignment->routine : null;
    $coach = $routine ? $routine->coach : null;

    return view('profile.show', compact('user', 'routine', 'coach'));

}


}
