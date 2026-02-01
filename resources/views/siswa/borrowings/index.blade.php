<x-app-layout>
    <x-slot:title>Riwayat</x-slot:title>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card overflow-hidden rounded-[2.5rem] border-none shadow-2xl">
                <div class="p-10 text-gray-900 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200/30">
                        <thead>
                            <tr class="text-left">
                                <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Nama Barang</th>
                                <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Jumlah</th>
                                <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Tgl Pinjam</th>
                                <th class="px-6 py-4 text-xs font-black text-gray-600 uppercase tracking-[0.2em]">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100/20">
                            @forelse($borrowings as $borrowing)
                                <tr class="hover:bg-blue-50/50 transition-all duration-300 group">
                                    <td class="px-6 py-8 whitespace-nowrap">
                                        <div class="flex items-center space-x-4">
                                            <div class="h-10 w-10 bg-blue-50 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                            </div>
                                            <span class="font-bold text-gray-800 text-lg">{{ $borrowing->item->nama_barang }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-8 whitespace-nowrap">
                                        <div class="inline-flex items-center px-4 py-1.5 bg-gray-100 rounded-full">
                                            <span class="font-black text-blue-600">{{ $borrowing->jumlah }} Unit</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-8 whitespace-nowrap text-sm text-gray-400 font-medium tracking-tight">
                                        {{ \Carbon\Carbon::parse($borrowing->tgl_pinjam)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-8 whitespace-nowrap">
                                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm
                                            @if($borrowing->status == 'pending') bg-amber-50 text-amber-500 border border-amber-100
                                            @elseif($borrowing->status == 'approved') bg-blue-50 text-blue-500 border border-blue-100
                                            @elseif($borrowing->status == 'rejected') bg-red-50 text-red-500 border border-red-100
                                            @else bg-green-50 text-green-500 border border-green-100 @endif">
                                            @if($borrowing->status == 'pending') Menunggu
                                            @elseif($borrowing->status == 'approved') Disetujui
                                            @elseif($borrowing->status == 'rejected') Ditolak
                                            @else Dikembalikan @endif
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center">
                                        <div class="space-y-4">
                                            <div class="text-blue-200">
                                                <svg class="mx-auto w-16 h-16 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                            <p class="text-gray-400 font-black uppercase tracking-tighter">Riwayat peminjaman Anda masih kosong.</p>
                                            <a href="{{ route('siswa.inventory.index') }}" class="inline-block text-blue-600 font-bold hover:underline">Lihat Katalog</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
