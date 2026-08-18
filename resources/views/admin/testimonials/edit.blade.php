@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6 max-w-3xl">
    <div class="flex flex-col gap-1">
        <h1 class="text-3xl font-extrabold text-gray-900">Ubah Testimonial</h1>
        <p class="text-gray-500">Edit detail testimonial kepuasan pelanggan NomNomora.</p>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column Fields -->
                <div class="flex flex-col gap-5">
                    <!-- Customer Name -->
                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-sm font-bold text-gray-700">Nama Pelanggan</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required autofocus
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('name') border-red-500 @enderror"
                               placeholder="Contoh: Budi Santoso">
                        @error('name')
                            <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Rating -->
                    <div class="flex flex-col gap-1.5">
                        <label for="rating" class="text-sm font-bold text-gray-700">Rating Bintang</label>
                        <select id="rating" name="rating" required
                                class="border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('rating') border-red-500 @enderror">
                            <option value="5" {{ old('rating', $testimonial->rating) == '5' ? 'selected' : '' }}>5 Bintang (Sangat Puas)</option>
                            <option value="4" {{ old('rating', $testimonial->rating) == '4' ? 'selected' : '' }}>4 Bintang (Puas)</option>
                            <option value="3" {{ old('rating', $testimonial->rating) == '3' ? 'selected' : '' }}>3 Bintang (Cukup)</option>
                            <option value="2" {{ old('rating', $testimonial->rating) == '2' ? 'selected' : '' }}>2 Bintang (Kurang)</option>
                            <option value="1" {{ old('rating', $testimonial->rating) == '1' ? 'selected' : '' }}>1 Bintang (Sangat Kurang)</option>
                        </select>
                        @error('rating')
                            <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Active Toggle -->
                    <div class="flex flex-col gap-1.5 mt-2">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-brand-accent/20 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">Aktif (Tampilkan di Website)</span>
                        </label>
                    </div>
                </div>

                <!-- Right Column Photo Upload -->
                <div class="flex flex-col gap-2" x-data="{ photoUrl: '{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : '' }}' }">
                    <label class="text-sm font-bold text-gray-700">Foto Pelanggan (Opsional)</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 flex flex-col items-center justify-center text-center gap-4 h-56 relative bg-gray-50/50 hover:bg-gray-50 transition-colors">
                        <template x-if="photoUrl">
                            <img :src="photoUrl" class="w-full h-full object-cover rounded-xl absolute inset-0">
                        </template>
                        <template x-if="!photoUrl">
                            <div class="flex flex-col items-center gap-2 text-gray-400">
                                <i data-lucide="camera" class="w-10 h-10 text-brand-accent"></i>
                                <span class="text-xs font-semibold">Pilih Foto Profil Pelanggan</span>
                                <span class="text-[10px]">JPEG, PNG, WEBP (Maksimal 2MB)</span>
                            </div>
                        </template>

                        <input type="file" name="photo" accept="image/*"
                               class="absolute inset-0 opacity-0 cursor-pointer w-full h-full"
                               @change="const file = $event.target.files[0]; if (file) { photoUrl = URL.createObjectURL(file) }">
                    </div>
                    @error('photo')
                        <span class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr class="border-gray-100 my-2">

            <!-- Message / Review Text -->
            <div class="flex flex-col gap-1.5">
                <label for="message" class="text-sm font-bold text-gray-700">Isi Testimonial / Ulasan</label>
                <textarea id="message" name="message" rows="4" required
                          class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('message') border-red-500 @enderror"
                          placeholder="Tulis ulasan pelanggan mengenai produk dan pelayanan NomNomora...">{{ old('message', $testimonial->message) }}</textarea>
                @error('message')
                    <span class="text-xs text-red-500 font-semibold mt-0.5">{{ $message }}</span>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 mt-4">
                <a href="{{ route('admin.testimonials.index') }}" 
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
