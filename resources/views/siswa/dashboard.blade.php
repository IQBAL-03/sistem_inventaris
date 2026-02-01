<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <!-- Welcome Section -->
            <div class="relative overflow-hidden group rounded-[2.5rem]">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[2.5rem] transform transition-transform group-hover:scale-[1.02] duration-500 shadow-2xl"></div>
                <div class="relative p-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <p class="text-blue-100 text-sm font-bold uppercase tracking-widest mb-2 opacity-80">Selamat Datang Kembali</p>
                        <h3 class="text-4xl font-black text-white leading-tight">{{ Auth::user()->name }}</h3>
                        <p class="text-blue-100 text-base mt-2 font-medium">Akses layanan laboratorium dengan mudah dan cepat.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="p-4 bg-white/10 backdrop-blur-xl rounded-full border border-white/20 text-white shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Active Borrowings -->
                <div class="glass-card p-8 rounded-[2rem] flex items-center justify-between group hover:border-indigo-200 transition-colors">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-1">Peminjaman Aktif</p>
                        <h3 class="text-5xl font-black text-indigo-600 leading-none">{{ $activeBorrowings }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-500 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>

                <!-- Returned History -->
                <div class="glass-card p-8 rounded-[2rem] flex items-center justify-between group hover:border-green-200 transition-colors">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-1">Riwayat Kembali</p>
                        <h3 class="text-5xl font-black text-green-600 leading-none">{{ $returnedBorrowings }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-500 group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>

                <!-- Catalog Items -->
                <div class="glass-card p-8 rounded-[2rem] flex items-center justify-between group hover:border-purple-200 transition-colors">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-1">Total Aset Lab</p>
                        <h3 class="text-5xl font-black text-purple-600 leading-none">{{ $totalItems }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-500 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Catalog Link -->
                <a href="{{ route('siswa.inventory.index') }}" class="group relative overflow-hidden rounded-[2rem] glass-card border border-gray-100 p-8 transition-all hover:shadow-lg">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-indigo-50/50 rounded-bl-[100px] -mr-8 -mt-8 transition-all group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Lihat Katalog</h4>
                        <p class="text-gray-500 text-sm mt-2 font-medium">Jelajahi peralatan dan ajukan peminjaman baru.</p>
                    </div>
                </a>

                <!-- History Link -->
                <a href="{{ route('siswa.borrowings.index') }}" class="group relative overflow-hidden rounded-[2rem] glass-card border border-gray-100 p-8 transition-all hover:shadow-lg">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-green-50/50 rounded-bl-[100px] -mr-8 -mt-8 transition-all group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-green-600 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-green-600 transition-colors">Riwayat Peminjaman</h4>
                        <p class="text-gray-500 text-sm mt-2 font-medium">Cek status pengajuan dan riwayat peminjaman Anda.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
