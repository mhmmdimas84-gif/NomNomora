@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-8">
    <!-- Welcome Header -->
    <div class="flex flex-col gap-2">
        <h1 class="text-3xl font-extrabold text-gray-900">Selamat Datang, Admin!</h1>
        <p class="text-gray-500">Kelola menu, ketersediaan produk, testimonial pelanggan, dan pengaturan website NomNomora.</p>
    </div>

    <!-- Statistics Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
        <!-- Card 1: Total Products -->
        <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-orange-50 text-brand-accent flex items-center justify-center">
                <i data-lucide="salad" class="w-6 h-6"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Total Produk</span>
                <span class="text-2xl font-bold text-gray-800">{{ $stats['total_products'] }}</span>
            </div>
        </div>

        <!-- Card 2: Active/Available Products -->
        <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                <i data-lucide="check-circle" class="w-6 h-6"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Tersedia</span>
                <span class="text-2xl font-bold text-gray-800">{{ $stats['available_products'] }}</span>
            </div>
        </div>

        <!-- Card 3: Categories -->
        <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i data-lucide="folder" class="w-6 h-6"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Kategori</span>
                <span class="text-2xl font-bold text-gray-800">{{ $stats['total_categories'] }}</span>
            </div>
        </div>

        <!-- Card 4: Testimonials -->
        <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                <i data-lucide="message-square" class="w-6 h-6"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Testimonial</span>
                <span class="text-2xl font-bold text-gray-800">{{ $stats['total_testimonials'] }}</span>
            </div>
        </div>

        <!-- Card 5: Gallery Items -->
        <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center">
                <i data-lucide="image" class="w-6 h-6"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Foto Galeri</span>
                <span class="text-2xl font-bold text-gray-800">{{ $stats['total_galleries'] }}</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions Panel -->
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Akses Cepat Pengelolaan</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
            <a href="{{ route('admin.products.create') }}" class="border border-gray-100 hover:border-brand-accent rounded-xl p-4 flex flex-col items-center justify-center text-center gap-2 hover:bg-gray-50 transition-all cursor-pointer">
                <i data-lucide="plus-circle" class="w-6 h-6 text-brand-accent"></i>
                <span class="text-xs font-bold text-gray-700">Tambah Produk</span>
            </a>
            <a href="{{ route('admin.categories.create') }}" class="border border-gray-100 hover:border-brand-accent rounded-xl p-4 flex flex-col items-center justify-center text-center gap-2 hover:bg-gray-50 transition-all cursor-pointer">
                <i data-lucide="folder-plus" class="w-6 h-6 text-blue-600"></i>
                <span class="text-xs font-bold text-gray-700">Tambah Kategori</span>
            </a>
            <a href="{{ route('admin.testimonials.create') }}" class="border border-gray-100 hover:border-brand-accent rounded-xl p-4 flex flex-col items-center justify-center text-center gap-2 hover:bg-gray-50 transition-all cursor-pointer">
                <i data-lucide="message-square-plus" class="w-6 h-6 text-purple-600"></i>
                <span class="text-xs font-bold text-gray-700">Tambah Testimonial</span>
            </a>
            <a href="{{ route('admin.galleries.create') }}" class="border border-gray-100 hover:border-brand-accent rounded-xl p-4 flex flex-col items-center justify-center text-center gap-2 hover:bg-gray-50 transition-all cursor-pointer">
                <i data-lucide="image-plus" class="w-6 h-6 text-pink-600"></i>
                <span class="text-xs font-bold text-gray-700">Tambah Foto</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="border border-gray-100 hover:border-brand-accent rounded-xl p-4 flex flex-col items-center justify-center text-center gap-2 hover:bg-gray-50 transition-all col-span-2 md:col-span-1 cursor-pointer">
                <i data-lucide="sliders" class="w-6 h-6 text-gray-600"></i>
                <span class="text-xs font-bold text-gray-700">Pengaturan Web</span>
            </a>
        </div>
    </div>

    <!-- Recent Data Previews Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Products -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <i data-lucide="salad" class="w-5 h-5 text-brand-accent"></i>
                    Produk Baru Ditambahkan
                </h2>
                <a href="{{ route('admin.products.index') }}" class="text-xs font-bold text-brand-accent hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-55/50 border-b border-gray-100">
                        <tr>
                            <th class="py-3 px-4 font-semibold">Nama Produk</th>
                            <th class="py-3 px-4 font-semibold">Kategori</th>
                            <th class="py-3 px-4 font-semibold">Harga</th>
                            <th class="py-3 px-4 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-150">
                        @forelse($recentProducts as $p)
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-gray-800">{{ $p->name }}</td>
                                <td class="py-3.5 px-4">{{ $p->category->name }}</td>
                                <td class="py-3.5 px-4 font-medium text-gray-700">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2 py-0.5 rounded-full text-xs font-bold {{ $p->is_available ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                        {{ $p->is_available ? 'Tersedia' : 'Habis' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-400">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Testimonials -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <i data-lucide="message-square" class="w-5 h-5 text-brand-accent"></i>
                    Testimonial Terbaru
                </h2>
                <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-bold text-brand-accent hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-55/50 border-b border-gray-100">
                        <tr>
                            <th class="py-3 px-4 font-semibold">Pelanggan</th>
                            <th class="py-3 px-4 font-semibold">Rating</th>
                            <th class="py-3 px-4 font-semibold">Pesan</th>
                            <th class="py-3 px-4 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-150">
                        @forelse($recentTestimonials as $t)
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-gray-800">{{ $t->name }}</td>
                                <td class="py-3.5 px-4 text-yellow-500 font-bold flex items-center gap-0.5">
                                    {{ $t->rating }} <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                                </td>
                                <td class="py-3.5 px-4 max-w-xs truncate">{{ $t->message }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2 py-0.5 rounded-full text-xs font-bold {{ $t->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                        {{ $t->is_active ? 'Aktif' : 'Non-aktif' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-400">Belum ada testimonial.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
