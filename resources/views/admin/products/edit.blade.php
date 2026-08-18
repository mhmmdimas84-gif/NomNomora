@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6 max-w-4xl">
    <div class="flex flex-col gap-1">
        <h1 class="text-3xl font-extrabold text-gray-900">Ubah Produk</h1>
        <p class="text-gray-500">Edit detail produk camilan atau menu NomNomora.</p>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Side Form Fields -->
                <div class="flex flex-col gap-5">
                    <!-- Product Name -->
                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-sm font-bold text-gray-700">Nama Produk</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required autofocus
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('name') border-red-500 @enderror"
                               placeholder="Contoh: Crab Puffs, Rice Bites Premium">
                        @error('name')
                            <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="flex flex-col gap-1.5">
                        <label for="category_id" class="text-sm font-bold text-gray-700">Kategori Menu</label>
                        <select id="category_id" name="category_id" required
                                class="border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('category_id') border-red-500 @enderror">
                            <option value="">Pilih Kategori...</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="flex flex-col gap-1.5">
                        <label for="price" class="text-sm font-bold text-gray-700">Harga (Rupiah)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-gray-400 text-sm font-bold">Rp</span>
                            <input type="number" id="price" name="price" value="{{ old('price', (int)$product->price) }}" required min="0" step="100"
                                   class="border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm w-full focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('price') border-red-500 @enderror"
                                   placeholder="Contoh: 18000">
                        </div>
                        @error('price')
                            <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Toggles: Available and Featured -->
                    <div class="flex flex-col md:flex-row gap-6 mt-2">
                        <!-- Available Toggle -->
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" name="is_available" value="1" {{ old('is_available', $product->is_available) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-brand-accent/20 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">Tersedia untuk Dipesan</span>
                        </label>

                        <!-- Featured Toggle -->
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-brand-accent/20 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-500"></div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">Tampilkan di Produk Unggulan</span>
                        </label>
                    </div>
                </div>

                <!-- Right Side Image Upload & Preview -->
                <div class="flex flex-col gap-2" x-data="{ imageUrl: '{{ $product->image ? asset('storage/' . $product->image) : '' }}' }">
                    <label class="text-sm font-bold text-gray-700">Foto Produk</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 flex flex-col items-center justify-center text-center gap-4 h-64 relative bg-gray-50/50 hover:bg-gray-50 transition-colors">
                        <template x-if="imageUrl">
                            <img :src="imageUrl" class="w-full h-full object-cover rounded-xl absolute inset-0">
                        </template>
                        <template x-if="!imageUrl">
                            <div class="flex flex-col items-center gap-2 text-gray-400">
                                <i data-lucide="image-up" class="w-12 h-12 text-brand-accent"></i>
                               <span class="text-xs font-semibold">Pilih atau Seret Foto ke Sini</span>
                                <span class="text-[10px]">JPEG, PNG, WEBP (Maksimal 2MB)</span>
                            </div>
                        </template>

                        <input type="file" name="image" accept="image/*"
                               class="absolute inset-0 opacity-0 cursor-pointer w-full h-full"
                               @change="const file = $event.target.files[0]; if (file) { imageUrl = URL.createObjectURL(file) }">
                    </div>
                    @error('image')
                        <span class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr class="border-gray-100 my-2">

            <!-- Full-Width Fields -->
            <!-- Description -->
            <div class="flex flex-col gap-1.5">
                <label for="description" class="text-sm font-bold text-gray-700">Deskripsi Singkat Produk</label>
                <textarea id="description" name="description" rows="3" required
                          class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('description') border-red-500 @enderror"
                          placeholder="Jelaskan produk secara singkat dan menggugah selera.">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                @enderror
            </div>

            <!-- Ingredients -->
            <div class="flex flex-col gap-1.5">
                <label for="ingredients" class="text-sm font-bold text-gray-700">Komposisi Bahan (Opsional)</label>
                <textarea id="ingredients" name="ingredients" rows="3"
                          class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('ingredients') border-red-500 @enderror"
                          placeholder="Contoh: Kulit pangsit, crab stick, mayones, keju spread... (akan ditampilkan pada halaman detail).">{{ old('ingredients', $product->ingredients) }}</textarea>
                @error('ingredients')
                    <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 mt-4">
                <a href="{{ route('admin.products.index') }}" 
                   class="border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold px-6 py-3 rounded-xl text-sm transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-brand-brown hover:bg-brand-accent text-white font-bold px-6 py-3 rounded-xl text-sm shadow-md hover:shadow-lg transition-all cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
