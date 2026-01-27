<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-900 leading-tight uppercase tracking-tighter">
            Laboratory <span class="text-indigo-600">Asset Catalog</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search & Filter Card -->
            <div class="mb-12 glass-card p-8 rounded-[2.5rem] border-none shadow-2xl">
                <form action="{{ route('siswa.inventory.index') }}" method="GET" class="flex flex-wrap gap-6 items-end">
                    <div class="flex-1 min-w-[250px]">
                        <x-input-label for="search" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Find Equipment')" />
                        <x-text-input id="search" name="search" type="text" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4" :value="request('search')" placeholder="MacBook, Monitor, etc..." />
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <x-input-label for="category" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Category')" />
                        <select id="category" name="category" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4 shadow-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn-gradient px-12 py-4">Search Asset</button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('siswa.inventory.index') }}" class="px-6 py-4 text-gray-400 font-bold uppercase text-xs tracking-widest hover:text-indigo-600 transition">Reset</a>
                    @endif
                </form>
            </div>

            @if(session('success'))
                <div class="mb-8 glass-card border-l-4 border-green-500 p-6 animate-float rounded-3xl" role="alert">
                    <div class="flex items-center space-x-4">
                        <div class="p-2 bg-green-100 rounded-lg text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="font-black text-gray-800 text-lg leading-tight">Request Submitted!</p>
                            <p class="text-gray-500 text-sm font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                @forelse($items as $item)
                    <div class="group relative bg-white/40 backdrop-blur-md rounded-[2.5rem] border border-white/50 p-4 hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.05)] transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                        <div class="relative h-56 rounded-[2rem] overflow-hidden bg-gray-100 mb-6 font-bold">
                            @if($item->gambar)
                                <img src="{{ asset('images/'.$item->gambar) }}" alt="{{ $item->nama_barang }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-indigo-50 text-indigo-300">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-indigo-600 rounded-full text-[10px] font-black uppercase tracking-[0.1em] shadow-sm">{{ $item->category->nama_kategori }}</span>
                            </div>
                        </div>

                        <div class="px-3 pb-4 space-y-1">
                            <h3 class="text-xl font-black text-gray-900 tracking-tight leading-tight">{{ $item->nama_barang }}</h3>
                            <p class="text-gray-600 font-bold text-xs uppercase tracking-widest">{{ $item->merk }}</p>
                            
                            <div class="flex items-center justify-between pt-4 pb-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Available</span>
                                    <span class="text-xl font-black {{ $item->stok > 0 ? 'text-indigo-600' : 'text-red-600' }}">{{ $item->stok }} Units</span>
                                </div>
                            </div>

                            <button onclick="openPinjamModal({{ $item->id }}, '{{ $item->nama_barang }}')" 
                                    class="w-full btn-gradient py-4 flex items-center justify-center space-x-2 disabled:bg-gray-100 disabled:from-gray-100 disabled:to-gray-100 disabled:text-gray-400 disabled:shadow-none"
                                    {{ $item->stok <= 0 ? 'disabled' : '' }}>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                <span class="text-sm">Borrow Now</span>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center space-y-4 glass-card rounded-[2.5rem]">
                        <div class="text-indigo-300">
                             <svg class="mx-auto w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <p class="text-xl font-black text-gray-600 uppercase tracking-tighter">No assets found matching your criteria.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Pinjam Modal -->
    <div id="pinjamModal" class="fixed inset-0 bg-indigo-900/40 hidden items-center justify-center z-[100] backdrop-blur-md opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-[3rem] shadow-2xl max-w-md w-full mx-4 overflow-hidden transform scale-90 transition-transform duration-300">
            <div class="p-10 border-b border-gray-50 flex justify-between items-center bg-indigo-50/30">
                <div>
                    <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">Request <span class="text-indigo-600">Borrowing</span></h3>
                    <p id="modal_item_name" class="text-indigo-400 font-bold text-xs uppercase tracking-widest mt-1"></p>
                </div>
                <button onclick="closePinjamModal()" class="text-gray-300 hover:text-red-500 transition-colors bg-white p-2 rounded-full shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form action="{{ route('siswa.borrowings.store') }}" method="POST" class="p-10 space-y-8">
                @csrf
                <input type="hidden" id="modal_item_id" name="item_id">
                
                <div>
                    <x-input-label for="jumlah" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('How many units?')" />
                    <x-text-input id="jumlah" name="jumlah" type="number" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4 shadow-sm" value="1" min="1" required />
                </div>

                <div>
                    <x-input-label for="tgl_pinjam" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Borrowing Date')" />
                    <x-text-input id="tgl_pinjam" name="tgl_pinjam" type="date" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4 shadow-sm" :value="date('Y-m-d')" required />
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full btn-gradient py-5 text-lg">Send Request</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openPinjamModal(id, name) {
            const modal = document.getElementById('pinjamModal');
            const inner = modal.querySelector('div');
            document.getElementById('modal_item_id').value = id;
            document.getElementById('modal_item_name').innerText = name;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            // Animate
            setTimeout(() => {
                modal.classList.add('opacity-100');
                inner.classList.add('scale-100');
            }, 10);
        }
        function closePinjamModal() {
            const modal = document.getElementById('pinjamModal');
            const inner = modal.querySelector('div');
            modal.classList.remove('opacity-100');
            inner.classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }
    </script>
</x-app-layout>
