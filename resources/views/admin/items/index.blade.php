<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 leading-tight uppercase tracking-tighter">
                Daftar <span class="text-blue-600">Aset Inventaris</span>
            </h2>
            <a href="{{ route('admin.items.create') }}" class="btn-gradient">
                + Tambah Aset Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-8 glass-card border-l-4 border-green-500 p-6 animate-float rounded-3xl" role="alert">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-green-100 rounded-lg text-green-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="font-bold text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="glass-card overflow-hidden rounded-[2.5rem] border-none shadow-2xl">
                <div class="p-8 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200/30">
                            <thead>
                                <tr class="text-left font-bold">
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Asset</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Kategori</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Merk</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Stok</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em] text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/20">
                                @foreach($items as $item)
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <div class="flex items-center space-x-4">
                                                @if($item->gambar)
                                                    <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->nama_barang }}" class="h-12 w-12 rounded-xl object-cover shadow-lg group-hover:scale-110 transition-transform">
                                                @else
                                                    <div class="h-12 w-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-400 font-bold text-[10px]">TIDAK ADA</div>
                                                @endif
                                                <span class="font-bold text-gray-800">{{ $item->nama_barang }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-bold">{{ $item->category->nama_kategori }}</span>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap text-sm font-medium text-gray-500">{{ $item->merk }}</td>
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <span class="font-black text-lg {{ $item->stok > 2 ? 'text-gray-800' : 'text-red-500' }}">{{ $item->stok }}</span>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap text-right space-x-3">
                                            <a href="{{ route('admin.items.edit', $item) }}" class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all font-bold text-[10px] uppercase tracking-widest">Edit</a>
                                            <form action="{{ route('admin.items.destroy', $item) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all font-bold text-[10px] uppercase tracking-widest" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
