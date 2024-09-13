<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Rutina') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('routines.update', $routine->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título:</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $routine->title) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción:</label>
                            <textarea id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">{{ old('description', $routine->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="file_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Archivo PDF:</label>
                            <input type="file" id="file_path" name="file_path" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 dark:bg-gray-900">
                            @if ($routine->file_path)
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Archivo actual: <a href="{{ asset('storage/' . $routine->file_path) }}" target="_blank" class="text-blue-500 underline">Ver PDF</a></p>
                            @endif
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid border-gray-500 text-sm font-medium rounded-md text-black bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Actualizar Rutina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
