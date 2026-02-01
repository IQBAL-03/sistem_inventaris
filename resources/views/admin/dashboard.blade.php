<x-app-layout>
    <x-slot:title>Dashboard Admin</x-slot:title>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <!-- Welcome Section -->
            <div class="relative overflow-hidden group rounded-[2.5rem]">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-[2.5rem] transform transition-transform group-hover:scale-[1.02] duration-500 shadow-2xl"></div>
                <div class="relative p-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <p class="text-indigo-100 text-sm font-bold uppercase tracking-widest mb-2 opacity-80">Dashboard Administrator</p>
                        <h3 class="text-4xl font-black text-white leading-tight">Halo, {{ Auth::user()->name }}!</h3>
                        <p class="text-indigo-100 text-base mt-2 font-medium">Kelola inventaris dan pantau aktivitas laboratorium dalam satu tempat.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="p-4 bg-white/10 backdrop-blur-xl rounded-full border border-white/20 text-white shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Items -->
                <div class="glass-card p-6 rounded-[2rem] flex items-center justify-between group hover:border-indigo-200 transition-colors">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-1">Total Barang</p>
                        <h3 class="text-4xl font-black text-indigo-600 leading-none">{{ $totalItems }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-500 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                </div>

                <!-- Pending Borrowings -->
                <div class="glass-card p-6 rounded-[2rem] flex items-center justify-between group hover:border-amber-200 transition-colors">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-1">Perlu Persetujuan</p>
                        <h3 class="text-4xl font-black text-amber-500 leading-none">{{ $pendingBorrowings }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-500 group-hover:bg-amber-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <!-- Active Borrowings -->
                <div class="glass-card p-6 rounded-[2rem] flex items-center justify-between group hover:border-green-200 transition-colors">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-1">Sedang Dipinjam</p>
                        <h3 class="text-4xl font-black text-green-600 leading-none">{{ $activeBorrowings }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-500 group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <!-- Student Count -->
                <div class="glass-card p-6 rounded-[2rem] flex items-center justify-between group hover:border-purple-200 transition-colors">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-1">Total Siswa</p>
                        <h3 class="text-4xl font-black text-purple-600 leading-none">{{ $studentCount }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-500 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Items Management -->
                <a href="{{ route('admin.items.index') }}" class="group relative overflow-hidden rounded-[2rem] glass-card border border-gray-100 p-8 transition-all hover:shadow-lg">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-indigo-50/50 rounded-bl-[100px] -mr-8 -mt-8 transition-all group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors uppercase tracking-tighter">Kelola Barang</h4>
                        <p class="text-gray-500 text-sm mt-2 font-medium">Manajemen aset, stok, dan gambar inventaris.</p>
                    </div>
                </a>

                <!-- Borrowing Approvals -->
                <a href="{{ route('admin.borrowings.index') }}" class="group relative overflow-hidden rounded-[2rem] glass-card border border-gray-100 p-8 transition-all hover:shadow-lg">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-amber-50/50 rounded-bl-[100px] -mr-8 -mt-8 transition-all group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-amber-500 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-amber-600 transition-colors uppercase tracking-tighter">Verifikasi</h4>
                        <p class="text-gray-500 text-sm mt-2 font-medium">Setujui atau tolak permintaan dari siswa.</p>
                    </div>
                </a>

                <!-- Categories Management -->
                <a href="{{ route('admin.categories.index') }}" class="group relative overflow-hidden rounded-[2rem] glass-card border border-gray-100 p-8 transition-all hover:shadow-lg">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-purple-50/50 rounded-bl-[100px] -mr-8 -mt-8 transition-all group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors uppercase tracking-tighter">Kategori</h4>
                        <p class="text-gray-500 text-sm mt-2 font-medium">Atur klasifikasi barang untuk kemudahan pencarian.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
