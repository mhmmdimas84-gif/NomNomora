@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h1 class="text-3xl font-extrabold text-gray-900">Produk Makanan</h1>
            <p class="text-gray-500">Kelola katalog produk, harga, ketersediaan, dan produk unggulan.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" 
           class="bg-brand-accent hover:bg-brand-accent-hover text-white px-5 py-3 rounded-xl font-bold text-sm shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 cursor-pointer">
            <i data-lucide="salad" class="w-4.5 h-4.5"></i>
            Tambah Produk
        </a>
    </div>

    <!-- Products Table Card -->
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="py-4 px-6 font-bold">Produk</th>
                        <th class="py-4 px-6 font-bold">Kategori</th>
                        <th class="py-4 px-6 font-bold">Harga</th>
                        <th class="py-4 px-6 font-bold text-center">Tersedia</th>
                        <th class="py-4 px-6 font-bold text-center">Unggulan</th>
                        <th class="py-4 px-6 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-150">
                    @forelse($products as $prod)
                        <tr class="hover:bg-gray-50/30 transition-colors">
                            <td class="py-4 px-6 font-bold text-gray-800">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl bg-gray-100 flex-shrink-0 overflow-hidden flex items-center justify-center">
                                        @if($prod->image)
                                            <img src="{{ asset('storage/' . $prod->image) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                        @else
                                            <!-- Food SVG Placeholder -->
                                            <div class="text-brand-accent">
                                                <i data-lucide="cookie" class="w-6 h-6"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800 text-sm">{{ $prod->name }}</span>
                                        <span class="text-xs text-gray-400 font-medium">{{ $prod->slug }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-600 font-medium">{{ $prod->category->name }}</td>
                            <td class="py-4 px-6 font-bold text-gray-700">Rp {{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1 {{ $prod->is_available ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $prod->is_available ? 'bg-green-550' : 'bg-red-550' }}"></span>
                                    {{ $prod->is_available ? 'Tersedia' : 'Habis' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1 {{ $prod->is_featured ? 'bg-amber-50 text-amber-700' : 'bg-gray-50 text-gray-400' }}">
                                    @if($prod->is_featured)
                                        <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                                        Ya
                                    @else
                                        Tidak
                                    @endif
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right flex items-center justify-end gap-3.5">
                                <a href="{{ route('admin.products.edit', $prod) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1">
                                    <i data-lucide="edit" class="w-4 h-4"></i> Edit
                                </a>
                                
                                <form action="{{ route('admin.products.destroy', $prod) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
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
                            <td colspan="6" class="py-12 text-center text-gray-400 font-medium">Belum ada produk. Silakan buat baru!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
