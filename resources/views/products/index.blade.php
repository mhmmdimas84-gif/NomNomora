@extends('layouts.app')

@section('title', 'Menu Terlezat - ' . ($globalSettings['site_name'] ?? 'NomNomora'))

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-brand-cream to-white py-16 text-center">
    <div class="max-w-4xl mx-auto px-6 flex flex-col items-center gap-4">
        <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Daftar Menu</span>
        <h1 class="font-display text-4xl sm:text-5xl font-black text-brand-brown">Katalog Kuliner NomNomora</h1>
        <div class="w-16 h-1 rounded-full bg-brand-accent mt-2"></div>
        <p class="text-brand-brown/70 text-lg leading-relaxed mt-4 max-w-2xl">
            Jelajahi perpaduan rasa gurih, creamy, pedas, dan lezat kekinian yang kami persiapkan spesial untuk Anda.
        </p>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-6 bg-white border-y border-brand-beige/25">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center gap-2.5 w-full md:w-auto">
            <a href="{{ route('menu.index', ['search' => request('search')]) }}" 
               class="px-5 py-2.5 rounded-full text-xs font-bold transition-all border {{ !request('category') ? 'bg-brand-brown border-brand-brown text-white shadow-md' : 'bg-brand-cream/50 border-brand-beige/30 text-brand-brown hover:bg-white' }}">
                Semua Menu
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('menu.index', ['category' => $cat->slug, 'search' => request('search')]) }}" 
                   class="px-5 py-2.5 rounded-full text-xs font-bold transition-all border {{ request('category') == $cat->slug ? 'bg-brand-brown border-brand-brown text-white shadow-md' : 'bg-brand-cream/50 border-brand-beige/30 text-brand-brown hover:bg-white' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <!-- Search Bar Form -->
        <form action="{{ route('menu.index') }}" method="GET" class="w-full md:w-80 flex items-center relative">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari camilan favoritmu..."
                   class="border border-brand-beige rounded-full px-5 py-3 pr-12 text-xs w-full focus:outline-none focus:ring-2 focus:ring-brand-accent/25 focus:border-brand-accent transition-all">
            <button type="submit" class="absolute right-4 text-brand-brown hover:text-brand-accent cursor-pointer">
                <i data-lucide="search" class="w-4 h-4"></i>
            </button>
        </form>
    </div>
</section>

<!-- Menu Products Catalog Grid -->
<section class="py-16 bg-brand-cream/15 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-12">
        @if(request('search'))
            <div class="text-sm font-semibold text-brand-brown/70 bg-white/70 border border-brand-beige/25 px-5 py-3 rounded-2xl w-max">
                Menampilkan hasil pencarian untuk: <span class="text-brand-accent font-extrabold">"{{ request('search') }}"</span>
                <a href="{{ route('menu.index', ['category' => request('category')]) }}" class="text-xs text-red-500 font-bold ml-2 underline">Hapus</a>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($products as $prod)
                <div class="bg-white border border-brand-beige/15 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col h-full group">
                    <!-- Image -->
                    <div class="h-52 bg-gray-50 relative overflow-hidden flex items-center justify-center flex-shrink-0">
                        @if($prod->image)
                            <img src="{{ asset('storage/' . $prod->image) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <i data-lucide="cookie" class="w-16 h-16 text-brand-beige"></i>
                        @endif
                        <span class="absolute top-4 left-4 bg-brand-brown text-white text-[10px] font-bold px-3 py-1 rounded-full">
                            {{ $prod->category->name }}
                        </span>
                        @if(!$prod->is_available)
                            <span class="absolute inset-0 bg-white/90 backdrop-blur-xs flex items-center justify-center text-red-600 font-bold text-sm">
                                Habis Sementara
                            </span>
                        @endif
                    </div>

                    <!-- Details -->
                    <div class="p-5 flex flex-col flex-grow justify-between gap-4">
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-between items-start gap-2">
                                <h3 class="font-display text-lg font-bold text-brand-brown leading-tight">{{ $prod->name }}</h3>
                                <span class="font-bold text-brand-accent text-sm flex-shrink-0">Rp {{ number_format($prod->price, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-xs text-brand-brown/70 line-clamp-3 leading-relaxed">{{ $prod->description }}</p>
                        </div>

                        <!-- Buttons -->
                        <div class="grid grid-cols-2 gap-2.5 mt-auto pt-2">
                            <a href="{{ route('menu.show', $prod->slug) }}" 
                               class="bg-gray-100 hover:bg-brand-beige/30 text-brand-brown font-bold py-2.5 px-3 rounded-2xl text-[11px] text-center transition-colors">
                                Detail
                            </a>
                            @if($prod->is_available)
                                <a href="{{ $prod->whatsapp_url }}" target="_blank" 
                                   class="bg-brand-accent hover:bg-brand-accent-hover text-white font-bold py-2.5 px-3 rounded-2xl text-[11px] text-center shadow-xs flex items-center justify-center gap-1 transition-colors">
                                    <i data-lucide="shopping-cart" class="w-3.5 h-3.5"></i>
                                    Pesan
                                </a>
                            @else
                                <button disabled
                                        class="bg-gray-100 text-gray-400 font-bold py-2.5 px-3 rounded-2xl text-[11px] text-center cursor-not-allowed">
                                    Habis
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-16 flex flex-col items-center justify-center gap-3">
                    <i data-lucide="salad" class="w-16 h-16 text-brand-beige animate-bounce"></i>
                    <h3 class="font-display text-xl font-bold text-brand-brown">Menu Tidak Ditemukan</h3>
                    <p class="text-brand-brown/60 text-sm max-w-md">Maaf, kami tidak dapat menemukan menu makanan yang Anda cari. Coba masukkan kata kunci pencarian yang lain.</p>
                </div>
            @endforelse
        </div>

        @if($products->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
