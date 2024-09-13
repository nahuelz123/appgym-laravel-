<!-- resources/views/profile/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mi Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Información del Usuario</h3>
                    <p>Nombre: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>

                    @if ($routine)
                        <h3 class="text-lg font-medium mt-6">Rutina Asignada</h3>
                        <p>Título: {{ $routine->title }}</p>
                        <p>Descripción: {{ $routine->description }}</p>
                        <a href="{{ route('routines.download', $routine->id) }}" class="text-blue-500 underline">Ver PDF</a>

                        @if ($coach)
                            <h3 class="text-lg font-medium mt-4">Coach</h3>
                            <p>Nombre: {{ $coach->name }}</p>
                            <p>Email: {{ $coach->email }}</p>
                        @endif
                    @else
                        <p>No tienes ninguna rutina asignada.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
