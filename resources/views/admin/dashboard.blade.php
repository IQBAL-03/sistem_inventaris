<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-gray-900 leading-tight tracking-tighter uppercase">
            {{ __('Admin') }} <span class="text-indigo-600">Dashboard</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Total Items Card -->
                <div class="relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-[2rem] transform transition-transform group-hover:scale-[1.02] duration-500 shadow-2xl"></div>
                    <div class="relative p-10 flex items-center justify-between">
                        <div>
                            <p class="text-indigo-100 text-sm font-bold uppercase tracking-widest mb-1 opacity-80">Total Inventory</p>
                            <h3 class="text-6xl font-black text-white leading-none">{{ $totalItems }}</h3>
                            <p class="text-indigo-100 text-xs mt-4 font-medium">Items currently in lab</p>
                        </div>
                        <div class="p-6 bg-white/10 backdrop-blur-xl rounded-[2.5rem] border border-white/20 text-white shadow-inner transform group-hover:rotate-12 transition-transform duration-500">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Borrowings Card -->
                <div class="relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-r from-fuchsia-600 to-purple-500 rounded-[2rem] transform transition-transform group-hover:scale-[1.02] duration-500 shadow-2xl"></div>
                    <div class="relative p-10 flex items-center justify-between">
                        <div>
                            <p class="text-fuchsia-100 text-sm font-bold uppercase tracking-widest mb-1 opacity-80">Active Lending</p>
                            <h3 class="text-6xl font-black text-white leading-none">{{ $activeBorrowings }}</h3>
                            <p class="text-fuchsia-100 text-xs mt-4 font-medium">Pending or Approved requests</p>
                        </div>
                        <div class="p-6 bg-white/10 backdrop-blur-xl rounded-[2.5rem] border border-white/20 text-white shadow-inner transform group-hover:-rotate-12 transition-transform duration-500">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-10">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">Quick <span class="text-indigo-600">Commands</span></h3>
                        <p class="text-gray-500 text-sm mt-1 font-medium">Direct access to core management features.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-900">
                    <a href="{{ route('admin.items.index') }}" class="group p-8 rounded-[2rem] bg-indigo-50 border border-indigo-100 hover:bg-indigo-600 transition-all duration-300">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-white transition-colors">Kelola Barang</h4>
                        <p class="text-gray-600 group-hover:text-indigo-100 transition-colors mt-2 text-sm font-medium">Add, edit, or remove lab equipment items.</p>
                    </a>

                    <a href="{{ route('admin.categories.index') }}" class="group p-8 rounded-[2rem] bg-purple-50 border border-purple-100 hover:bg-purple-600 transition-all duration-300">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-white transition-colors">Kelola Kategori</h4>
                        <p class="text-gray-600 group-hover:text-purple-100 transition-colors mt-2 text-sm font-medium">Organize items into efficient categories.</p>
                    </a>

                    <a href="{{ route('admin.borrowings.index') }}" class="group p-8 rounded-[2rem] bg-pink-50 border border-pink-100 hover:bg-pink-600 transition-all duration-300">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-white transition-colors">Peminjaman</h4>
                        <p class="text-gray-600 group-hover:text-pink-100 transition-colors mt-2 text-sm font-medium">Approve, reject, or manage active loans.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
