<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 leading-tight uppercase tracking-tighter">
                Inventory <span class="text-indigo-600">Assets</span>
            </h2>
            <a href="{{ route('admin.items.create') }}" class="btn-gradient">
                + Add New Asset
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-8 glass-card border-l-4 border-green-500 p-4 animate-float" role="alert">
                    <p class="font-bold text-green-700">Success!</p>
                    <p class="text-green-600 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <div class="glass-card overflow-hidden rounded-[2rem]">
                <div class="p-8 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200/30">
                            <thead>
                                <tr class="text-left font-bold">
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Asset</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Category</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Brand/Merk</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Stock</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em] text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/20">
                                @foreach($items as $item)
                                    <tr class="hover:bg-white/50 transition-colors group">
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <div class="flex items-center space-x-4">
                                                @if($item->gambar)
                                                    <img src="{{ asset('images/'.$item->gambar) }}" alt="{{ $item->nama_barang }}" class="h-12 w-12 rounded-2xl object-cover shadow-lg group-hover:scale-110 transition-transform">
                                                @else
                                                    <div class="h-12 w-12 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-400 font-bold text-xs">NO</div>
                                                @endif
                                                <span class="font-bold text-gray-800">{{ $item->nama_barang }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-xs font-bold">{{ $item->category->nama_kategori }}</span>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap text-sm font-medium text-gray-500">{{ $item->merk }}</td>
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <span class="font-black text-lg {{ $item->stok > 2 ? 'text-gray-800' : 'text-red-500' }}">{{ $item->stok }}</span>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap text-right space-x-3">
                                            <a href="{{ route('admin.items.edit', $item) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition-all font-bold text-xs uppercase">Edit</a>
                                            <form action="{{ route('admin.items.destroy', $item) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all font-bold text-xs uppercase" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
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
