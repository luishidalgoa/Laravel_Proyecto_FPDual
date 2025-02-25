<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Sección de notas -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8">
                <h3 class="text-lg font-medium mb-4">Anotaciones de alumnos</h3>
                
                <!-- Formulario para guardar notas -->
                <form method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <textarea 
                        name="notes" 
                        class="w-full h-32 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Escribe tus anotaciones aquí..."
                    >{{ $notes->notes ?? '' }}</textarea>
                    
                    <!-- Botón para guardar notas -->
                    <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Guardar Anotaciones
                    </button>
                    
                    <!-- Mensaje de éxito al guardar notas -->
                    @if (session('status'))
                        <div class="mt-4 text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </form>

                <!-- Lista de notas -->
                <div class="mt-8">
                    <h4 class="text-lg font-medium mb-4">Tus anotaciones guardadas:</h4>
                    @if ($notes->count() > 0)
                        <ul class="space-y-4">
                            @foreach ($notes as $note)
                                <li class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <p class="text-gray-700">{{ $note->notes }}</p>
                                        <div class="flex space-x-2">
                                            <!-- Botón para editar nota -->
                                            <a href="{{ route('notes.edit', $note->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                            <!-- Formulario para eliminar nota -->
                                            <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No tienes anotaciones guardadas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>