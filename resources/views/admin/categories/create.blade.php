@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6 max-w-2xl">
    <div class="flex flex-col gap-1">
        <h1 class="text-3xl font-extrabold text-gray-900">Tambah Kategori</h1>
        <p class="text-gray-500">Buat kategori baru untuk menu makanan & minuman NomNomora.</p>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="flex flex-col gap-6">
            @csrf

            <!-- Category Name -->
            <div class="flex flex-col gap-2">
                <label for="name" class="text-sm font-bold text-gray-700">Nama Kategori</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                       class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('name') border-red-500 @enderror"
                       placeholder="Contoh: Rice Bites, Dessert, Minuman">
                @error('name')
                    <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="flex flex-col gap-2">
                <label for="description" class="text-sm font-bold text-gray-700">Deskripsi (Opsional)</label>
                <textarea id="description" name="description" rows="4"
                          class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all @error('description') border-red-500 @enderror"
                          placeholder="Jelaskan kategori ini secara singkat...">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-xs text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 mt-2">
                <a href="{{ route('admin.categories.index') }}" 
                   class="border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold px-6 py-3 rounded-xl text-sm transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-brand-brown hover:bg-brand-accent text-white font-bold px-6 py-3 rounded-xl text-sm shadow-md hover:shadow-lg transition-all cursor-pointer">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
