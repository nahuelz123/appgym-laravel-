<?php


use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});

// Ruta para el dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index2');

// Rutas protegidas con middleware de autenticación
Route::middleware('auth')->group(function () {

    // Rutas de rutinas
    Route::resource('/routines', RoutineController::class);
    Route::get('routines/download/{id}', [RoutineController::class, 'download'])->name('routines.download');

    // Rutas de usuarios
    Route::get('/user2', [UserController::class, 'show2'])->name('user.show2');
    Route::resource('/user', UserController::class);

    // Rutas de asignaciones de rutinas
    Route::prefix('assignments')->group(function () {
        // Ruta para asignar rutina con `routine_id`
     // Rutas ajustadas para evitar conflicto entre indexRoutine y indexClient

// Ruta para asignar rutina con `routine_id`
Route::get('/routine/{routine_id}', [AssignmentsController::class, 'indexRoutine'])->name('assignments.indexRoutine');

// Ruta para asignar cliente con `client_id`
Route::get('/client/{client_id}', [AssignmentsController::class, 'indexClient'])->name('assignments.indexClient');

        // Ruta genérica de asignaciones con `routine_id` y `client_id`
        Route::get('/{routine_id?}/{client_id?}', [AssignmentsController::class, 'index'])->name('assignments.index');

        // Ruta para asignar rutinas (POST)
        Route::post('/assign', [AssignmentsController::class, 'assign'])->name('assignments.assign');

        // Ruta para mostrar asignaciones de un cliente específico
        Route::get('/{clientId}', [AssignmentsController::class, 'showAssignments'])->name('assignments.show');

        // Ruta para eliminar asignaciones
        Route::delete('/{id}', [AssignmentsController::class, 'destroyAssignment'])->name('assignments.destroy');
    });
    
    
    // Rutas de perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';