<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-900 leading-tight uppercase tracking-tighter">
            Edit <span class="text-blue-600">Aset</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card p-10 rounded-[2.5rem] border-none shadow-2xl">
                <form id="itemForm" action="{{ route('admin.items.update', $item) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cropped_image" id="cropped_image">
                    
                    <div class="flex items-center space-x-6 mb-8 p-6 bg-blue-50/50 rounded-[2rem] border border-blue-100/50">
                        <div class="relative h-24 w-24 shrink-0">
                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" class="h-full w-full rounded-2xl object-cover shadow-xl border-4 border-white">
                            @else
                                <div class="h-full w-full rounded-2xl bg-blue-100 flex items-center justify-center text-blue-400 font-black text-[10px]">TANPA FOTO</div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-gray-800 uppercase tracking-tighter">{{ $item->nama_barang }}</h3>
                            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest">Sedang Diedit</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="md:col-span-2">
                            <x-input-label for="nama_barang" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" value="Nama Aset" />
                            <x-text-input id="nama_barang" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-blue-500 py-4" type="text" name="nama_barang" :value="old('nama_barang', $item->nama_barang)" required />
                            <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="category_id" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" value="Kategori" />
                            <select id="category_id" name="category_id" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-blue-500 py-4 shadow-sm" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="merk" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" value="Merk" />
                            <x-text-input id="merk" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-blue-500 py-4" type="text" name="merk" :value="old('merk', $item->merk)" required />
                            <x-input-error :messages="$errors->get('merk')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="stok" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" value="Stok Saat Ini" />
                            <x-text-input id="stok" class="block w-full border-none bg-gray-50/50 rounded-2xl focus:ring-2 focus:ring-blue-500 py-4" type="number" name="stok" :value="old('stok', $item->stok)" required />
                            <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label for="gambar_input" class="uppercase tracking-widest text-[10px] font-black text-gray-400 mb-2" value="Ganti Foto (Opsional)" />
                            <div id="imageUploadContainer" class="relative group">
                                <!-- Upload Area (Hidden if image exists) -->
                                <label for="gambar_input" id="uploadPlaceholder" class="{{ $item->gambar ? 'hidden' : '' }} flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-blue-200 rounded-[2.5rem] cursor-pointer bg-blue-50/50 hover:bg-blue-100/50 transition-all overflow-hidden group-hover:border-blue-400">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-blue-400">
                                        <div class="p-4 bg-white rounded-2xl shadow-sm mb-4 group-hover:scale-110 transition-transform">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        </div>
                                        <p class="text-sm font-bold uppercase tracking-widest text-center px-4">Klik untuk ganti & potong foto</p>
                                    </div>
                                    <input id="gambar_input" type="file" accept="image/*" class="hidden" name="gambar">
                                </label>

                                <!-- Preview Area (Shown if image exists) -->
                                <div id="previewCard" class="{{ $item->gambar ? '' : 'hidden' }} relative rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white aspect-square max-w-[300px] mx-auto group/preview transition-all duration-500 transform">
                                    <img id="previewImage" src="{{ $item->gambar ? asset('storage/'.$item->gambar) : '' }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-slate-900/40 flex items-center justify-center opacity-0 group-hover/preview:opacity-100 transition-opacity backdrop-blur-sm">
                                        <label for="gambar_input" class="cursor-pointer bg-white text-slate-900 px-6 py-3 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-blue-600 hover:text-white transition-all transform translate-y-4 group-hover/preview:translate-y-0 duration-300">
                                            Ganti Foto
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                        <a href="{{ route('admin.items.index') }}" class="px-6 py-3 text-gray-400 font-bold uppercase text-xs tracking-widest hover:text-gray-600 transition">Batal</a>
                        <button type="submit" class="btn-gradient px-12 py-4">
                            Perbarui Aset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Crop Modal -->
    <div id="cropModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/80 backdrop-blur-md p-4" style="display: none;">
        <div id="cropModalInner" class="bg-white rounded-[2.5rem] w-full max-w-2xl overflow-hidden shadow-2xl transform scale-95 transition-all duration-300">
            <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-blue-50/30">
                <h3 class="text-xl font-black text-gray-900 uppercase tracking-tighter">Potong <span class="text-blue-600">Foto</span></h3>
                <button type="button" onclick="closeCropModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="p-8">
                <div class="max-h-[50vh] overflow-hidden rounded-2xl bg-gray-100 flex items-center justify-center">
                    <img id="croppingImage" class="max-w-full block" style="max-height: 50vh;">
                </div>
            </div>
            <div class="p-8 bg-gray-50 flex justify-end gap-3">
                <button type="button" onclick="closeCropModal()" class="px-6 py-3 text-gray-400 font-bold uppercase text-xs tracking-widest hover:text-gray-600 transition">Batal</button>
                <button type="button" id="cropButton" class="btn-gradient px-10 py-3 text-sm">Terapkan Potongan</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cropper;
            const input = document.getElementById('gambar_input');
            const modal = document.getElementById('cropModal');
            const modalInner = document.getElementById('cropModalInner');
            const image = document.getElementById('croppingImage');
            const preview = document.getElementById('previewImage');
            const placeholder = document.getElementById('uploadPlaceholder');
            const croppedInput = document.getElementById('cropped_image');

            if (!input) return;

            input.addEventListener('change', function(e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        image.src = event.target.result;
                        
                        modal.style.display = 'flex';
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        
                        setTimeout(() => {
                            modalInner.classList.remove('scale-95');
                            modalInner.classList.add('scale-100');
                        }, 50);

                        if (cropper) {
                            cropper.destroy();
                        }
                        
                        image.onload = function() {
                            cropper = new Cropper(image, {
                                aspectRatio: 1,
                                viewMode: 2,
                                dragMode: 'move',
                                guides: true,
                                center: true,
                                highlight: false,
                                cropBoxMovable: true,
                                cropBoxResizable: true,
                                toggleDragModeOnDblclick: false,
                            });
                        };
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            document.getElementById('cropButton').addEventListener('click', function() {
                if (!cropper) return;
                
                const canvas = cropper.getCroppedCanvas({
                    width: 800,
                    height: 800,
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high',
                });
                
                const base64Image = canvas.toDataURL('image/jpeg', 0.9);
                croppedInput.value = base64Image;
                preview.src = base64Image;
                
                // Show Card, Hide Placeholder
                document.getElementById('previewCard').classList.remove('hidden');
                placeholder.classList.add('hidden');
                
                closeCropModal();
            });

            window.closeCropModal = function() {
                modalInner.classList.remove('scale-100');
                modalInner.classList.add('scale-95');
                setTimeout(() => {
                    modal.style.display = 'none';
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 300);
                if (!croppedInput.value) {
                    input.value = '';
                }
            };
        });
    </script>
</x-app-layout>
