<x-app-layout>
    <x-slot:title>Daftar Peminjaman</x-slot:title>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-8 glass-card border-l-4 border-green-500 p-4 animate-float">
                    <p class="font-bold text-green-700">Aksi Berhasil</p>
                    <p class="text-green-600 text-sm">{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-8 glass-card border-l-4 border-red-500 p-4 animate-float">
                    <p class="font-bold text-red-700">Gagal</p>
                    <p class="text-red-600 text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <div class="glass-card overflow-hidden rounded-[2.5rem]">
                <div class="p-10">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200/30">
                            <thead>
                                <tr class="text-left font-bold">
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Siswa</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Barang</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Jml</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Tanggal</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Status</th>
                                    <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em] text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/20">
                                @foreach($borrowings as $borrowing)
                                    <tr class="hover:bg-white/50 transition-colors">
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-black text-[10px] uppercase">
                                                    {{ substr($borrowing->user->name, 0, 2) }}
                                                </div>
                                                <span class="font-bold text-gray-800">{{ $borrowing->user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <span class="text-gray-600 font-medium">{{ $borrowing->item->nama_barang }}</span>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <span class="font-black text-indigo-600">{{ $borrowing->jumlah }}</span>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap text-sm text-gray-400">{{ \Carbon\Carbon::parse($borrowing->tgl_pinjam)->format('d M Y') }}</td>
                                        <td class="px-6 py-6 whitespace-nowrap">
                                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest
                                                @if($borrowing->status == 'pending') bg-amber-100 text-amber-600 
                                                @elseif($borrowing->status == 'approved') bg-blue-100 text-blue-600 
                                                @elseif($borrowing->status == 'rejected') bg-red-100 text-red-600 
                                                @else bg-green-100 text-green-600 @endif">
                                                @if($borrowing->status == 'pending') Menunggu
                                                @elseif($borrowing->status == 'approved') Disetujui
                                                @elseif($borrowing->status == 'rejected') Ditolak
                                                @elseif($borrowing->status == 'returned') Dikembalikan
                                                @else {{ $borrowing->status }}
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-6 py-6 whitespace-nowrap text-right space-x-2">
                                            @if($borrowing->status == 'pending')
                                                <form action="{{ route('admin.borrowings.approve', $borrowing) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 bg-green-50 text-green-600 rounded-xl hover:bg-green-600 hover:text-white transition-all font-bold text-[10px] uppercase">Setujui</button>
                                                </form>
                                                <form action="{{ route('admin.borrowings.reject', $borrowing) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all font-bold text-[10px] uppercase">Tolak</button>
                                                </form>
                                            @elseif($borrowing->status == 'approved')
                                                <form action="{{ route('admin.borrowings.returned', $borrowing) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all font-bold text-[10px] uppercase">Tandai Kembali</button>
                                                </form>
                                            @endif
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
