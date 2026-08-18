@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6 max-w-3xl">
    <div class="flex flex-col gap-1">
        <h1 class="text-3xl font-extrabold text-gray-900">Tambah Foto Galeri</h1>
        <p class="text-gray-500">Unggah dokumentasi foto baru untuk ditampilkan di halaman galeri NomNomora.</p>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column Fields -->
                <div class="flex flex-col gap-5">
                    <!-- Title/Caption -->
                    <div class="flex flex-col gap-1.5">
                        <label for="title" class="text-sm font-bold text-gray-700">Judul / Caption Foto</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required autofocus
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('title') border-red-500 @enderror"
                               placeholder="Contoh: Proses Dapur Higienis">
                        @error('title')
                            <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="flex flex-col gap-1.5">
                        <label for="description" class="text-sm font-bold text-gray-700">Keterangan / Deskripsi</label>
                        <textarea id="description" name="description" rows="3"
                                  class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('description') border-red-500 @enderror"
                                  placeholder="Keterangan singkat mengenai foto ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Active Toggle -->
                    <div class="flex flex-col gap-1.5 mt-2">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-brand-accent/20 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">Aktif (Tampilkan di Website)</span>
                        </label>
                    </div>
                </div>

                <!-- Right Column Image Upload -->
                <div class="flex flex-col gap-2" x-data="{ imageUrl: null }">
                    <label class="text-sm font-bold text-gray-700">Pilih Foto</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 flex flex-col items-center justify-center text-center gap-4 h-64 relative bg-gray-50/50 hover:bg-gray-50 transition-colors">
                        <template x-if="imageUrl">
                            <img :src="imageUrl" class="w-full h-full object-cover rounded-xl absolute inset-0">
                        </template>
                        <template x-if="!imageUrl">
                            <div class="flex flex-col items-center gap-2 text-gray-400">
                                <i data-lucide="image" class="w-12 h-12 text-brand-accent"></i>
                                <span class="text-xs font-semibold">Pilih atau Seret Foto ke Sini</span>
                                <span class="text-[10px]">JPEG, PNG, WEBP (Maksimal 2MB)</span>
                            </div>
                        </template>

                        <input type="file" name="image" accept="image/*" required
                               class="absolute inset-0 opacity-0 cursor-pointer w-full h-full"
                               @change="const file = $event.target.files[0]; if (file) { imageUrl = URL.createObjectURL(file) }">
                    </div>
                    @error('image')
                        <span class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 mt-4">
                <a href="{{ route('admin.galleries.index') }}" 
                   class="border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold px-6 py-3 rounded-xl text-sm transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-brand-brown hover:bg-brand-accent text-white font-bold px-6 py-3 rounded-xl text-sm shadow-md hover:shadow-lg transition-all cursor-pointer">
                    Simpan Foto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
