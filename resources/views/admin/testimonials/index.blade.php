@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h1 class="text-3xl font-extrabold text-gray-900">Testimonial Pelanggan</h1>
            <p class="text-gray-500">Kelola testimoni, ulasan pelanggan, rating bintang, dan status keaktifan.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" 
           class="bg-brand-accent hover:bg-brand-accent-hover text-white px-5 py-3 rounded-xl font-bold text-sm shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 cursor-pointer">
            <i data-lucide="message-square-plus" class="w-4.5 h-4.5"></i>
            Tambah Testimonial
        </a>
    </div>

    <!-- Testimonials List Card -->
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="py-4 px-6 font-bold">Pelanggan</th>
                        <th class="py-4 px-6 font-bold">Rating</th>
                        <th class="py-4 px-6 font-bold">Ulasan / Pesan</th>
                        <th class="py-4 px-6 font-bold text-center">Status Aktif</th>
                        <th class="py-4 px-6 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-150">
                    @forelse($testimonials as $test)
                        <tr class="hover:bg-gray-50/30 transition-colors">
                            <td class="py-4 px-6 font-bold text-gray-800">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-brand-beige flex-shrink-0 overflow-hidden flex items-center justify-center">
                                        @if($test->photo)
                                            <img src="{{ asset('storage/' . $test->photo) }}" alt="{{ $test->name }}" class="w-full h-full object-cover">
                                        @else
                                            <i data-lucide="user" class="w-5 h-5 text-brand-brown"></i>
                                        @endif
                                    </div>
                                    <span class="font-bold text-gray-800 text-sm">{{ $test->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-0.5 text-yellow-500 font-bold">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i data-lucide="star" class="w-4 h-4 {{ $i <= $test->rating ? 'fill-current' : 'text-gray-200' }}"></i>
                                    @endfor
                                </div>
                            </td>
                            <td class="py-4 px-6 max-w-md truncate">{{ $test->message }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1 {{ $test->is_active ? 'bg-green-550/10 text-green-700' : 'bg-gray-100 text-gray-400' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $test->is_active ? 'bg-green-500' : 'bg-gray-450' }}"></span>
                                    {{ $test->is_active ? 'Aktif' : 'Non-aktif' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right flex items-center justify-end gap-3.5">
                                <a href="{{ route('admin.testimonials.edit', $test) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center gap-1">
                                    <i data-lucide="edit" class="w-4 h-4"></i> Edit
                                </a>
                                
                                <form action="{{ route('admin.testimonials.destroy', $test) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
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
                            <td colspan="5" class="py-12 text-center text-gray-400 font-medium">Belum ada ulasan pelanggan. Silakan buat baru!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($testimonials->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
