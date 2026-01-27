<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-900 leading-tight uppercase tracking-tighter">
            Manage <span class="text-indigo-600">Categories</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @if(session('success'))
                <div class="glass-card border-l-4 border-green-500 p-4 animate-float" role="alert">
                    <p class="font-bold text-green-700">Success!</p>
                    <p class="text-green-600 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Add Category Card -->
            <div class="glass-card p-10 rounded-[2.5rem]">
                <h3 class="text-lg font-black text-gray-800 uppercase tracking-widest mb-6">Create New Category</h3>
                <form action="{{ route('admin.categories.store') }}" method="POST" class="flex flex-col sm:flex-row gap-6">
                    @csrf
                    <div class="flex-1">
                        <x-text-input name="nama_kategori" placeholder="e.g. Perangkat Jaringan" class="w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4" required />
                        <x-input-error :messages="$errors->get('nama_kategori')" class="mt-2" />
                    </div>
                    <button type="submit" class="btn-gradient px-10">Add Category</button>
                </form>
            </div>

            <!-- List Categories Card -->
            <div class="glass-card overflow-hidden rounded-[2.5rem]">
                <div class="p-10">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200/30">
                            <thead>
                                <tr class="text-left">
                                    <th class="px-6 py-4 text-xs font-black text-gray-400 uppercase tracking-[0.2em]">Category Name</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-400 uppercase tracking-[0.2em] text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/20">
                                @foreach($categories as $category)
                                    <tr class="hover:bg-white/50 transition-colors group">
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                                                <span class="font-bold text-gray-800 text-lg">{{ $category->nama_kategori }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap text-right">
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all font-bold text-xs uppercase" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
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
    </div>
</x-app-layout>
