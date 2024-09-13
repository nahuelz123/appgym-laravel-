<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nueva Rutina') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('routines.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título:</label>
                            <input type="text" id="title" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción:</label>
                            <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:placeholder-gray-400"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="file_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Archivo PDF:</label>
                            <input type="file" id="file_path" name="file_path" accept=".pdf" required class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-medium file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:file:bg-gray-800 dark:file:text-gray-300 dark:hover:file:bg-gray-700">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-solid text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">Crear Rutina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
