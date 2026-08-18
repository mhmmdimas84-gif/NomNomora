@extends('layouts.app')

@section('title', 'Galeri Foto - ' . ($globalSettings['site_name'] ?? 'NomNomora'))

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-brand-cream to-white py-16 text-center">
    <div class="max-w-4xl mx-auto px-6 flex flex-col items-center gap-4">
        <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Galeri Foto</span>
        <h1 class="font-display text-4xl sm:text-5xl font-black text-brand-brown">Dokumentasi NomNomora</h1>
        <div class="w-16 h-1 rounded-full bg-brand-accent mt-2"></div>
        <p class="text-brand-brown/70 text-lg leading-relaxed mt-4 max-w-2xl">
            Tengok proses pembuatan higienis, pengemasan rapi, bahan premium, serta keseruan pelayanan kami.
        </p>
    </div>
</section>

<!-- Gallery Grid with Lightbox Modal -->
<section class="py-12 bg-white" x-data="{ lightboxOpen: false, activeImage: '', activeTitle: '', activeDesc: '' }">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleries as $gal)
                @php
                    $isSeederPlaceholder = Str::startsWith($gal->image, 'gallery_');
                    // For seeded items, we will use mock images/SVG or check if we can display beautiful card styling.
                    // If a user uploaded it, it will be in storage
                    $imageUrl = $isSeederPlaceholder ? null : asset('storage/' . $gal->image);
                @endphp
                
                <div class="bg-brand-cream/35 border border-brand-beige/20 rounded-3xl overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col group cursor-pointer"
                     @click="
                        @if($imageUrl)
                            activeImage = '{{ $imageUrl }}';
                            activeTitle = '{{ addslashes($gal->title) }}';
                            activeDesc = '{{ addslashes($gal->description) }}';
                            lightboxOpen = true;
                        @endif
                     ">
                    <!-- Image Card -->
                    <div class="h-64 bg-brand-beige/20 relative overflow-hidden flex items-center justify-center">
                        @if($imageUrl)
                            <img src="{{ $imageUrl }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <!-- Overlay icon -->
                            <div class="absolute inset-0 bg-brand-brown/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-white/95 flex items-center justify-center text-brand-brown shadow-lg">
                                    <i data-lucide="zoom-in" class="w-5 h-5"></i>
                                </div>
                            </div>
                        @else
                            <!-- Illustrative fallback for seeder default placeholders before upload -->
                            <div class="flex flex-col items-center gap-3 p-8 text-center text-brand-brown/50">
                                <i data-lucide="cookie" class="w-12 h-12 text-brand-accent animate-pulse"></i>
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-brown/70">{{ $gal->title }}</span>
                                <p class="text-[10px] text-brand-brown/50 max-w-[200px] leading-relaxed italic">"{{ $gal->description }}"</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Caption details -->
                    @if($imageUrl)
                        <div class="p-5 flex flex-col gap-1 border-t border-brand-beige/10 bg-white">
                            <h3 class="font-bold text-brand-brown text-base leading-tight">{{ $gal->title }}</h3>
                            @if($gal->description)
                                <p class="text-xs text-brand-brown/65 line-clamp-2 leading-relaxed">{{ $gal->description }}</p>
                            @endif
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-3 text-center py-16 text-gray-400 font-medium">Belum ada foto galeri yang diaktifkan.</div>
            @endforelse
        </div>
    </div>

    <!-- Lightbox Modal Component -->
    <div x-show="lightboxOpen" 
         class="fixed inset-0 bg-brand-brown/90 backdrop-blur-md z-50 flex items-center justify-center p-4"
         x-transition:opacity
         @click="lightboxOpen = false"
         x-cloak>
        
        <button class="absolute top-6 right-6 text-white/80 hover:text-white cursor-pointer focus:outline-none">
            <i data-lucide="x" class="w-8 h-8"></i>
        </button>

        <div class="max-w-4xl w-full flex flex-col gap-4" @click.stop>
            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl flex flex-col lg:flex-row max-h-[85vh]">
                <!-- Modal Image -->
                <div class="lg:w-2/3 bg-black flex items-center justify-center overflow-hidden">
                    <img :src="activeImage" :alt="activeTitle" class="max-w-full max-h-[50vh] lg:max-h-[75vh] object-contain">
                </div>
                <!-- Modal Text -->
                <div class="lg:w-1/3 p-8 flex flex-col justify-center gap-4 bg-white border-t lg:border-t-0 lg:border-l border-gray-100">
                    <h2 class="font-display text-2xl font-black text-brand-brown" x-text="activeTitle"></h2>
                    <div class="w-12 h-1 bg-brand-accent rounded-full"></div>
                    <p class="text-brand-brown/70 text-sm leading-relaxed" x-text="activeDesc"></p>
                    <button @click="lightboxOpen = false" class="bg-brand-brown hover:bg-brand-accent text-white font-bold py-3 rounded-xl text-xs shadow-md transition-colors mt-4 cursor-pointer">
                        Tutup Galeri
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
