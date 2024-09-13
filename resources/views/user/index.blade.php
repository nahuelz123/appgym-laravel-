{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios Registrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role === 'admin')
                        <h3 class="text-lg font-medium">Gestionar Roles de Usuarios</h3>
                        <table class="min-w-full mt-6">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <select name="role" class="form-select">
                                                    <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Client</option>
                                                    <option value="coach" {{ $user->role === 'coach' ? 'selected' : '' }}>Coach</option>
                                                </select>
                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">Actualizar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif(auth()->user()->role === 'coach')
                        <h3 class="text-lg font-medium">Clientes</h3>
                        <table class="min-w-full mt-6">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rutinas Asignadas</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->role === 'client')
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                @if ($user->routineAssignments && $user->routineAssignments->isNotEmpty())
                                                    <ul>
                                                        @foreach ($user->routineAssignments as $assignment)
                                                            <li>{{ $assignment->routine->title }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span>No posee rutinas asignadas</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">
                                                <a href="{{ route('assignments.index') }}" class="text-blue-500 hover:underline">Asignar Rutina</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios Registrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('user.index') }}" class="mb-4">
                        <input type="text" name="name" placeholder="Buscar por nombre"
                            value="{{ request('name') }}" class="border border-gray-300 rounded p-2 mr-2">
                        <input type="text" name="email" placeholder="Buscar por email"
                            value="{{ request('email') }}" class="border border-gray-300 rounded p-2 mr-2">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Buscar</button>
                    </form>

                    @if (auth()->user()->role === 'admin')
                        <h3 class="text-lg font-medium">Gestionar Roles de Usuarios</h3>
                        <table class="min-w-full mt-6">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rol</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {{ $user->email }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <select name="role" class="form-select">
                                                    <option value="client"
                                                        {{ $user->role === 'client' ? 'selected' : '' }}>Client</option>
                                                    <option value="coach"
                                                        {{ $user->role === 'coach' ? 'selected' : '' }}>Coach</option>
                                                </select>
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">Actualizar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif(auth()->user()->role === 'coach')
                        <h3 class="text-lg font-medium">Clientes</h3>
                        <table class="min-w-full mt-6">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rutinas Asignadas</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->role === 'client')
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $user->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                {{ $user->email }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                @if ($user->routineAssignments && $user->routineAssignments->isNotEmpty())
                                                    <ul>
                                                        @foreach ($user->routineAssignments as $assignment)
                                                            <li>{{ $assignment->routine->title }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span>No posee rutinas asignadas</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">
                                                {{--                                                 <a href="{{ route('assignments.index') }}" class="text-blue-500 hover:underline">Asignar Rutina</a> 
 --}} <!-- Enlace para asignar cliente -->
                                                <a
                                                    href="{{ route('assignments.indexClient', ['client_id' => $user->id]) }}">
                                                    Asignar Cliente
                                                </a>
                                                <a href="{{ route('user.show', $user->id) }}" class="text-blue-500 hover:text-blue-700">Ver Detalles</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
