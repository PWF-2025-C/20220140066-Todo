<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Create New Todo</h3>

                    <form action="{{ route('todo.store') }}" method="POST">
                        @csrf
                        
                        <!-- Input Title -->
                        <div class="mb-4">
                            <label class="block text-gray-200">Title</label>
                            <input type="text" name="title" required 
                                   class="w-full p-2 border rounded-md text-black">
                        </div>

                        <!-- Select is_done -->
                        <div class="mb-4">
                            <label class="block text-gray-200">Status</label>
                            <select name="is_done" class="w-full p-2 border rounded-md text-black">
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                            Tambah Todo
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
