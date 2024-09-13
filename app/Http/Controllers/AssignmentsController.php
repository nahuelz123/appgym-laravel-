<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Routine;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
/*     public function index(Request $request)
    {
        // Obtiene todas las rutinas y clientes (solo clientes)
        $routines = Routine::all();
        $users = User::where('role', 'client')->get();
        
        return view('assignments.index', compact('routines', 'users')); 

    } *///funciona 

    //FUNCION DE INDEX MEJORADA 
public function index2(Request $request, $client_id = null, $routine_id = null)
{
    $routines = Routine::all(); // Obtener todas las rutinas
    $users = User::where('role', 'client')->get(); // Obtener todos los clientes
//dd('hola');
     return view('assignments.index', [
        'routines' => $routines,
        'users' => $users,
        'selectedClientId' => $client_id, // Pasar el ID del cliente seleccionado a la vista
        'selectedRoutineId' => $routine_id, // Pasar el ID de la rutina seleccionada a la vista
    ]); 
}

public function indexfuncionasolopararutinas($routine_id = null, $client_id = null)
{
    // Verifica si se pasó un routine_id, y selecciona esa rutina
    $selectedRoutine = $routine_id ? Routine::find($routine_id) : null;
    $selectedClient = $client_id ? User::find($client_id) : null;

    // Obtiene todas las rutinas y clientes para los selectores
    $routines = Routine::all();
    $clients = User::where('role', 'client')->get();

    return view('assignments.index', compact('routines', 'clients', 'selectedRoutine', 'selectedClient'));
}

public function index($routine_id , $client_id)
{
    // Verifica si el cliente existe
    if ($client_id) {
        $selectedClient = User::find($client_id);
        if (!$selectedClient) {
            abort(404, 'Cliente no encontrado');
        }
    } else {
        $selectedClient = null;
    }

    // Verifica si la rutina existe
    if ($routine_id) {
        $selectedRoutine = Routine::find($routine_id);
        if (!$selectedRoutine) {
            abort(404, 'Rutina no encontrada');
        }
    } else {
        $selectedRoutine = null;
    }

    $routines = Routine::all(); // Obtén todas las rutinas disponibles
    $clients = User::where('role', 'client')->get(); // Obtén todos los clientes

    return view('assignments.index', compact('routines', 'clients', 'selectedRoutine', 'selectedClient'));
}

// AsignmentsController.php

public function indexRoutine($routine_id)
{
    // Obtener la rutina seleccionada y todos los clientes
    $selectedRoutine = Routine::findOrFail($routine_id);
    $clients = User::where('role', 'client')->get();

    // Pasar la rutina seleccionada y los clientes a la vista
    return view('assignments.index', compact('selectedRoutine', 'clients'));
}

public function indexClient($client_id)
{
    // Obtener el cliente seleccionado y todas las rutinas
    $selectedClient = User::where('role', 'client')->findOrFail($client_id);
    $routines = Routine::all();

    // Pasar el cliente seleccionado y las rutinas a la vista
    return view('assignments.index', compact('selectedClient', 'routines'));
}







    public function assign(Request $request)
    {
   /*      $validated = $request->validate([
            'routine_id' => 'required|exists:routines,id',
            'client_id' => 'required|exists:users,id',
        ]);

        Assignment::create([
            'routine_id' => $validated['routine_id'],
            'client_id' => $validated['client_id'],
            'assigned_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Rutina asignada correctamente'); */

  // Validar los datos de entrada
  $validated = $request->validate([
    'routine_id' => 'required|exists:routines,id',
    'client_id' => 'required|exists:users,id',
]);

// Obtener el cliente
$client = User::find($validated['client_id']);

// Eliminar cualquier rutina asignada previamente
$client->routineAssignments()->delete();

// Crear la nueva asignación de rutina
Assignment::create([
    'routine_id' => $validated['routine_id'],
    'client_id' => $validated['client_id'],
    'assigned_at' => now(),
]);

// Redirigir a la lista de clientes con un mensaje de éxito
return redirect()->route('user.index')->with('success', 'Rutina asignada correctamente.');


    }

    public function showAssignments($clientId)
    {
        $assignments = Assignment::where('client_id', $clientId)->get(); // Muestra todas las asignaciones del cliente
        return view('assignments.index', compact('assignments'));
    }

    public function destroyAssignment($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        return redirect()->back()->with('success', 'Asignación eliminada correctamente');
    }
}
