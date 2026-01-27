<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-900 leading-tight uppercase tracking-tighter">
            Add <span class="text-indigo-600">New Asset</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card p-10 rounded-[2.5rem]">
                <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="md:col-span-2">
                            <x-input-label for="nama_barang" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Asset Name')" />
                            <x-text-input id="nama_barang" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4" type="text" name="nama_barang" :value="old('nama_barang')" required placeholder="e.g. MacBook Pro M3" />
                            <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="category_id" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Category')" />
                            <select id="category_id" name="category_id" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4 shadow-sm" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="merk" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Brand')" />
                            <x-text-input id="merk" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4" type="text" name="merk" :value="old('merk')" required placeholder="Apple, Asus, etc." />
                            <x-input-error :messages="$errors->get('merk')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="stok" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Current Stock')" />
                            <x-text-input id="stok" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-indigo-500 py-4" type="number" name="stok" :value="old('stok')" required placeholder="0" />
                            <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label for="gambar" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" :value="__('Asset Image')" />
                            <div class="flex items-center justify-center w-full">
                                <label for="gambar" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-indigo-200 rounded-2xl cursor-pointer bg-indigo-50 hover:bg-indigo-100 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-indigo-400">
                                        <svg class="w-8 h-8 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="text-sm font-bold">Click to upload image</p>
                                    </div>
                                    <input id="gambar" type="file" name="gambar" class="hidden" />
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                        <a href="{{ route('admin.items.index') }}" class="px-6 py-3 text-gray-400 font-bold uppercase text-xs tracking-widest hover:text-gray-600 transition">Cancel</a>
                        <button type="submit" class="btn-gradient px-12 py-4">
                            Save Asset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
