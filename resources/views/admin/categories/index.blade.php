@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h1 class="text-3xl font-extrabold text-gray-900">Kategori Menu</h1>
            <p class="text-gray-500">Kelola kategori menu makanan & minuman NomNomora.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" 
           class="bg-brand-accent hover:bg-brand-accent-hover text-white px-5 py-3 rounded-xl font-bold text-sm shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 cursor-pointer">
            <i data-lucide="folder-plus" class="w-4.5 h-4.5"></i>
            Tambah Kategori
        </a>
    </div>

    <!-- Categories Card List / Table -->
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="py-4 px-6 font-bold">Nama Kategori</th>
                        <th class="py-4 px-6 font-bold">Slug (URL)</th>
                        <th class="py-4 px-6 font-bold">Deskripsi</th>
                        <th class="py-4 px-6 font-bold text-center">Jumlah Produk</th>
                        <th class="py-4 px-6 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-150">
                    @forelse($categories as $cat)
                        <tr class="hover:bg-gray-50/30 transition-colors">
                            <td class="py-4 px-6 font-bold text-gray-800">{{ $cat->name }}</td>
                            <td class="py-4 px-6 text-gray-500">{{ $cat->slug }}</td>
                            <td class="py-4 px-6 max-w-sm truncate">{{ $cat->description ?? '-' }}</td>
                            <td class="py-4 px-6 text-center font-semibold text-gray-700">
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                                    {{ $cat->products_count }} Produk
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right flex items-center justify-end gap-3.5">
                                <a href="{{ route('admin.categories.edit', $cat) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1">
                                    <i data-lucide="edit" class="w-4 h-4"></i> Edit
                                </a>
                                
                                <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Seluruh produk di dalam kategori ini juga akan terpengaruh.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-sm flex items-center gap-1 cursor-pointer">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-400 font-medium">Belum ada kategori menu. Silakan buat baru!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
