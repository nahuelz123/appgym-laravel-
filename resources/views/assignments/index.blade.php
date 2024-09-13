{{--  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Rutina a Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Asignar Rutina a Cliente</h3>
                    <form action="{{ route('assignments.assign') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="routine_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rutina:</label>
                            <select name="routine_id" id="routine_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @foreach ($routines as $routine)
                                    <option value="{{ $routine->id }}">{{ $routine->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente:</label>
                            <select name="client_id" id="client_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Asignar Rutina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 

 --}}
{{--  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Rutina a Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Asignar Rutina a Cliente</h3>
                    <form action="{{ route('assignments.assign') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="routine_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rutina:</label>
                            <select name="routine_id" id="routine_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @foreach ($routines as $routine)
                                    <option value="{{ $routine->id }}" {{ $selectedRoutineId == $routine->id ? 'selected' : '' }}>
                                        {{ $routine->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente:</label>
                            <select name="client_id" id="client_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $selectedClientId == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Asignar Rutina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 --}}

{{--  <form action="{{ route('assignments.assign') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="routine_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rutina:</label>
        <select name="routine_id" id="routine_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
            @foreach ($routines as $routine)
                <option value="{{ $routine->id }}" {{ $selectedRoutine && $selectedRoutine->id == $routine->id ? 'selected' : '' }}>
                    {{ $routine->title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente:</label>
        <select name="client_id" id="client_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ $selectedClient && $selectedClient->id == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
        Asignar Rutina
    </button>
</form>
 --}}

 {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Rutina a Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Asignar Rutina a Cliente</h3>
                    <form action="{{ route('assignments.assign') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="routine_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rutina:</label>
                            <select name="routine_id" id="routine_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @foreach ($routines as $routine)
                                    <option value="{{ $routine->id }}" {{ $selectedRoutine && $selectedRoutine->id == $routine->id ? 'selected' : '' }}>
                                        {{ $routine->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente:</label>
                            <select name="client_id" id="client_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $selectedClient && $selectedClient->id == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Asignar Rutina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

  --}}


  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Rutina a Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Asignar Rutina a Cliente</h3>
                    <form action="{{ route('assignments.assign') }}" method="POST">
                        @csrf

                        <!-- Selección de Rutina -->
                        <div class="mb-4">
                            <label for="routine_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rutina:</label>
                            <select name="routine_id" id="routine_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @if (isset($selectedRoutine))
                                    <!-- Mostrar la rutina seleccionada -->
                                    <option value="{{ $selectedRoutine->id }}" selected>{{ $selectedRoutine->title }}</option>
                                @else
                                    <!-- Mostrar todas las rutinas si no hay ninguna seleccionada -->
                                    @foreach ($routines as $routine)
                                        <option value="{{ $routine->id }}">{{ $routine->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <!-- Selección de Cliente -->
                        <div class="mb-4">
                            <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente:</label>
                            <select name="client_id" id="client_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @if (isset($selectedClient))
                                    <!-- Mostrar el cliente seleccionado -->
                                    <option value="{{ $selectedClient->id }}" selected>{{ $selectedClient->name }}</option>
                                @else
                                    <!-- Mostrar todos los clientes si no hay ninguno seleccionado -->
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Asignar Rutina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
