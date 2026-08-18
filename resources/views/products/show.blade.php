@extends('layouts.app')

@section('title', $product->name . ' - ' . ($globalSettings['site_name'] ?? 'NomNomora'))
@section('meta_description', $product->description)

@section('content')
<!-- Back Link -->
<div class="max-w-7xl mx-auto px-6 pt-10">
    <a href="{{ route('menu.index') }}" class="text-brand-brown/70 hover:text-brand-accent font-bold text-sm flex items-center gap-1.5 w-max transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Kembali ke Semua Menu
    </a>
</div>

<!-- Product Detail Details -->
<section class="py-10 bg-white mt-4">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <!-- Photo Container -->
        <div class="lg:col-span-5 flex justify-center">
            <div class="w-full max-w-md aspect-square rounded-[2.5rem] bg-gray-50 border border-brand-beige/45 overflow-hidden shadow-md flex items-center justify-center relative">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                @else
                    <i data-lucide="cookie" class="w-24 h-24 text-brand-beige"></i>
                @endif
                
                @if($product->is_featured)
                    <span class="absolute top-6 right-6 bg-brand-accent text-white text-xs font-black uppercase tracking-wider px-3.5 py-1.5 rounded-full shadow-lg flex items-center gap-1.5">
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i> Rekomendasi
                    </span>
                @endif
            </div>
        </div>

        <!-- Info Description Column -->
        <div class="lg:col-span-7 flex flex-col gap-6">
            <div class="flex flex-col gap-3">
                <span class="bg-brand-beige text-brand-brown text-xs font-extrabold uppercase px-3 py-1 rounded-full w-max">
                    {{ $product->category->name }}
                </span>
                <h1 class="font-display text-3xl sm:text-4xl font-black text-brand-brown">{{ $product->name }}</h1>
                <div class="flex items-center gap-4">
                    <span class="text-2xl font-black text-brand-accent">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <span class="px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1 {{ $product->is_available ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $product->is_available ? 'bg-green-500' : 'bg-red-500' }}"></span>
                        {{ $product->is_available ? 'Tersedia' : 'Habis Sementara' }}
                    </span>
                </div>
            </div>

            <hr class="border-gray-100">

            <div class="flex flex-col gap-2">
                <h3 class="font-bold text-brand-brown">Tentang Menu Ini</h3>
                <p class="text-brand-brown/70 text-sm leading-relaxed">
                    {{ $product->description }}
                </p>
            </div>

            @if($product->ingredients)
                <div class="flex flex-col gap-2 bg-brand-cream/35 border border-brand-beige/20 p-5 rounded-2xl">
                    <h3 class="font-bold text-brand-brown text-sm flex items-center gap-1.5">
                        <i data-lucide="egg" class="w-4 h-4 text-brand-accent"></i>
                        Komposisi / Bahan Baku:
                    </h3>
                    <p class="text-brand-brown/75 text-xs leading-relaxed italic">
                        {{ $product->ingredients }}
                    </p>
                </div>
            @endif

            <!-- Order Trigger Button -->
            <div class="pt-4 flex flex-col sm:flex-row items-center gap-4">
                @if($product->is_available)
                    <a href="{{ $whatsappUrl }}" target="_blank" 
                       class="w-full sm:w-auto bg-brand-accent hover:bg-brand-accent-hover text-white font-bold px-10 py-4.5 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2 transform hover:-translate-y-0.5 cursor-pointer">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                        Pesan Sekarang via WhatsApp
                    </a>
                @else
                    <button disabled 
                            class="w-full sm:w-auto bg-gray-100 text-gray-400 font-bold px-10 py-4.5 rounded-full cursor-not-allowed">
                        Stok Sedang Habis
                    </button>
                @endif
                <span class="text-xs text-gray-400 font-medium">Klik tombol di atas untuk membuka chat WhatsApp pemesanan secara otomatis.</span>
            </div>
        </div>
    </div>
</section>

<!-- Related Products Section -->
@if($relatedProducts->count() > 0)
    <section class="py-20 bg-brand-cream/25">
        <div class="max-w-7xl mx-auto px-6 flex flex-col gap-10">
            <div class="flex flex-col gap-2">
                <h2 class="font-display text-2xl font-black text-brand-brown">Menu Rekomendasi Lainnya</h2>
                <div class="w-12 h-1 bg-brand-accent rounded-full mt-1"></div>
            </div>

            <!-- Related Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $rp)
                    <div class="bg-white border border-brand-beige/15 rounded-3xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col h-full group">
                        <div class="h-48 bg-gray-50 overflow-hidden flex items-center justify-center relative flex-shrink-0">
                            @if($rp->image)
                                <img src="{{ asset('storage/' . $rp->image) }}" alt="{{ $rp->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <i data-lucide="cookie" class="w-12 h-12 text-brand-beige"></i>
                            @endif
                        </div>
                        <div class="p-4 flex flex-col justify-between flex-grow gap-4">
                            <div class="flex flex-col gap-1">
                                <h3 class="font-display font-bold text-brand-brown text-base line-clamp-1">{{ $rp->name }}</h3>
                                <span class="font-bold text-brand-accent text-sm">Rp {{ number_format($rp->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2 mt-auto pt-1">
                                <a href="{{ route('menu.show', $rp->slug) }}" 
                                   class="bg-gray-100 hover:bg-brand-beige/30 text-brand-brown font-bold py-2 px-2.5 rounded-xl text-[10px] text-center transition-colors">
                                    Detail
                                </a>
                                <a href="{{ $rp->whatsapp_url }}" target="_blank" 
                                   class="bg-brand-accent hover:bg-brand-accent-hover text-white font-bold py-2 px-2.5 rounded-xl text-[10px] text-center shadow-xs flex items-center justify-center gap-1 transition-colors">
                                    Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
