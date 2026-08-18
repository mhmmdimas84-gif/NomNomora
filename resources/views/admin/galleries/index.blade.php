@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h1 class="text-3xl font-extrabold text-gray-900">Galeri Foto</h1>
            <p class="text-gray-500">Kelola dokumentasi foto produk, proses pengemasan, dan dapur NomNomora.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" 
           class="bg-brand-accent hover:bg-brand-accent-hover text-white px-5 py-3 rounded-xl font-bold text-sm shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 cursor-pointer">
            <i data-lucide="image-plus" class="w-4.5 h-4.5"></i>
            Tambah Foto
        </a>
    </div>

    <!-- Galleries List Card -->
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="py-4 px-6 font-bold">Foto</th>
                        <th class="py-4 px-6 font-bold">Judul / Caption</th>
                        <th class="py-4 px-6 font-bold">Deskripsi</th>
                        <th class="py-4 px-6 font-bold text-center">Status Aktif</th>
                        <th class="py-4 px-6 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-150">
                    @forelse($galleries as $gal)
                        <tr class="hover:bg-gray-50/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="w-16 h-12 rounded-xl bg-gray-100 overflow-hidden flex items-center justify-center border border-gray-200/50">
                                    @if(Str::startsWith($gal->image, 'gallery_'))
                                        <!-- Placeholder seeder logic -->
                                        <div class="text-brand-accent font-bold text-[9px] text-center px-1">Placeholder</div>
                                    @else
                                        <img src="{{ asset('storage/' . $gal->image) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6 font-bold text-gray-800 text-sm">{{ $gal->title }}</td>
                            <td class="py-4 px-6 max-w-xs truncate">{{ $gal->description ?? '-' }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1 {{ $gal->is_active ? 'bg-green-550/10 text-green-700' : 'bg-gray-100 text-gray-400' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $gal->is_active ? 'bg-green-500' : 'bg-gray-450' }}"></span>
                                    {{ $gal->is_active ? 'Aktif' : 'Non-aktif' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right flex items-center justify-end gap-3.5">
                                <a href="{{ route('admin.galleries.edit', $gal) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1">
                                    <i data-lucide="edit" class="w-4 h-4"></i> Edit
                                </a>
                                
                                <form action="{{ route('admin.galleries.destroy', $gal) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto galeri ini?')">
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
                            <td colspan="5" class="py-12 text-center text-gray-400 font-medium">Belum ada foto di galeri. Silakan buat baru!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($galleries->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
