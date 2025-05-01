<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-hidden">

            <div class="p-6 space-y-4">
                <!-- Formulir Pencarian -->
                <form method="GET" action="{{ route('user.index') }}" class="flex space-x-3">
                    <input type="text" name="search" placeholder="Cari pengguna..."
                        class="w-full px-4 py-2 text-gray-700 bg-gray-100 rounded-lg focus:outline-none"
                        value="{{ request('search') }}" />
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Cari
                    </button>
                </form>

                <!-- Flash Message (sebelah kanan) -->
                @if (session('success'))
                    <div class="text-green-600 text-right">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-300">
                    <thead class="text-xs uppercase bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4 text-center">ID</th>
                            <th class="px-6 py-4">NAMA</th>
                            <th class="px-6 py-4 text-center">TODO</th>
                            <th class="px-6 py-4 text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @forelse ($users as $data)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-6 py-4 text-center text-blue-600 dark:text-blue-400">
                                    {{ $data->id }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 dark:text-white">
                                    {{ $data->name }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-600 dark:text-blue-300">
                                        {{ $data->todos->where('is_done', true)->count() }} ({{ $data->todos->count() }})
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        @if ($data->is_admin)
                                            <form action="{{ route('user.removeadmin', $data) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-blue-500 hover:underline">
                                                    Remove Admin
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.makeadmin', $data) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-red-500 hover:underline">
                                                    Make Admin
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('user.destroy', $data) }}" method="Post">
    @csrf
    @method('delete')
    <button type="submit" class="text-red-600 dark:text-red-400 whitespace-nowrap">
        Delete
    </button>
</form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400">
                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        Menampilkan {{ $users->firstItem() ?? 0 }} hingga {{ $users->lastItem() ?? 0 }} dari {{ $users->total() }} hasil
                    </div>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>