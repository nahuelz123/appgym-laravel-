{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Rutinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('routines.create') }}" class="text-blue-500 underline">Crear Nueva Rutina</a>

                    <table class="min-w-full mt-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routines as $routine)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $routine->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $routine->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                        <a href="{{ asset('storage/' . $routine->file_path) }}" target="_blank" class="text-blue-500 underline">Ver PDF</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium flex space-x-2">
                                        <a href="{{ route('routines.edit', $routine->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <!-- Icono de lápiz -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L8.586 8.586a1 1 0 00-.293.707v2.121a1 1 0 001 1h2.121a1 1 0 00.707-.293l6-6a2 2 0 000-2.828zM6.707 11.293a1 1 0 01-.293-.707v-2.121a1 1 0 01.293-.707l1-1L12.414 12l-1 1a1 1 0 01-.707.293H8.828a1 1 0 01-.707-.293l-1.414-1.414z"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('routines.destroy', $routine->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <!-- Icono de cruz -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6.293 4.293a1 1 0 011.414 0L10 6.586l2.293-2.293a1 1 0 111.414 1.414L11.414 8l2.293 2.293a1 1 0 01-1.414 1.414L10 9.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 8 6.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 --}}

 {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Rutinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('routines.create') }}" class="text-blue-500 underline">Crear Nueva Rutina</a>

                    <table class="min-w-full mt-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routines as $routine)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $routine->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $routine->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                        <a href="{{ route('routines.download', $routine->id) }}" class="text-blue-500 underline">Descargar PDF</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium flex space-x-2">
                                        <a href="{{ route('routines.edit', $routine->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <!-- Icono de lápiz -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L8.586 8.586a1 1 0 00-.293.707v2.121a1 1 0 001 1h2.121a1 1 0 00.707-.293l6-6a2 2 0 000-2.828zM6.707 11.293a1 1 0 01-.293-.707v-2.121a1 1 0 01.293-.707l1-1L12.414 12l-1 1a1 1 0 01-.707.293H8.828a1 1 0 01-.707-.293l-1.414-1.414z"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('routines.destroy', $routine->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <!-- Icono de cruz -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6.293 4.293a1 1 0 011.414 0L10 6.586l2.293-2.293a1 1 0 111.414 1.414L11.414 8l2.293 2.293a1 1 0 01-1.414 1.414L10 9.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 8 6.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 --}}

{{-- ESTO ESTA FUNCIONANDO 
 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Rutinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('routines.create') }}" class="text-blue-500 underline">Crear Nueva Rutina</a>

                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('routines.index') }}" class="mb-4 mt-4">
                        <input type="text" name="search" placeholder="Buscar rutina..." value="{{ request('search') }}" class="border-gray-300 rounded-md shadow-sm">
                        <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                            Buscar
                        </button>
                    </form>

                    <table class="min-w-full mt-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routines as $routine)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $routine->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $routine->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                        <a href="{{ route('routines.download', $routine->id) }}" class="text-blue-500 underline">Ver PDF</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium flex space-x-2">
                                        <a href="{{ route('routines.edit', $routine->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                        <form action="{{ route('routines.destroy', $routine->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 --}}



 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Rutinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('routines.create') }}" class="text-blue-500 underline">Crear Nueva Rutina</a>

                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('routines.index') }}" class="mb-4 mt-4">
                        <input type="text" name="search" placeholder="Buscar rutina..." value="{{ request('search') }}" class="border-gray-300 rounded-md shadow-sm">
                        <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                            Buscar
                        </button>
                    </form>

                    <table class="min-w-full mt-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routines as $routine)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $routine->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $routine->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                        <a href="{{ route('routines.download', $routine->id) }}" class="text-blue-500 underline">Ver PDF</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium flex space-x-2">
                                        <a href="{{ route('routines.edit', $routine->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                        <form action="{{ route('routines.destroy', $routine->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                        </form>
                                        <!-- Botón para asignar la rutina -->
                                        <a href="{{ route('assignments.indexRoutine', ['routine_id' => $routine->id]) }}" class="text-green-500 hover:text-green-700">
                                            Asignar Rutina
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
