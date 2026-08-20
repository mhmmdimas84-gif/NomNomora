@extends('layouts.app')

@section('title', 'Hubungi Kontak Kami - ' . ($globalSettings['site_name'] ?? 'NomNomora'))

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-brand-cream to-white py-16 text-center">
    <div class="max-w-4xl mx-auto px-6 flex flex-col items-center gap-4">
        <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Hubungi Kami</span>
        <h1 class="font-display text-4xl sm:text-5xl font-black text-brand-brown">Kontak NomNomora</h1>
        <div class="w-16 h-1 rounded-full bg-brand-accent mt-2"></div>
        <p class="text-brand-brown/70 text-lg leading-relaxed mt-4 max-w-2xl">
            Punya pertanyaan mengenai produk atau pemesanan? Hubungi kami langsung lewat beberapa kanal di bawah ini.
        </p>
    </div>
</section>

<!-- Contact Information details -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <!-- Contact Card Column -->
        <div class="lg:col-span-5 flex flex-col gap-8 bg-brand-cream/35 border border-brand-beige/20 p-8 sm:p-10 rounded-[2.5rem] shadow-sm">
            <div class="flex flex-col gap-2">
                <h2 class="font-display text-2xl font-black text-brand-brown">NomNomora Snack</h2>
                <p class="text-xs text-brand-brown/60 font-semibold italic">"Every Bite. Pure Delight."</p>
            </div>

            <div class="flex flex-col gap-6">
                <!-- WhatsApp -->
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-accent flex items-center justify-center flex-shrink-0">
                        <i data-lucide="phone" class="w-5 h-5"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">WhatsApp</span>
                        <span class="text-sm font-bold text-brand-brown mt-0.5">{{ $settings['whatsapp_number'] }}</span>
                    </div>
                </div>

                <!-- Instagram -->
                @if(!empty($settings['instagram']))
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-accent flex items-center justify-center flex-shrink-0">
                            <i data-lucide="instagram" class="w-5 h-5"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Instagram</span>
                            <a href="https://instagram.com/{{ ltrim($settings['instagram'], '@') }}" target="_blank" 
                               class="text-sm font-bold text-brand-brown mt-0.5 hover:text-brand-accent hover:underline transition-colors">
                                {{ $settings['instagram'] }}
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Operational Hours -->
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-accent flex items-center justify-center flex-shrink-0">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Jam Operasional</span>
                        <span class="text-sm font-bold text-brand-brown mt-0.5 leading-relaxed">{{ $settings['opening_hours'] }}</span>
                    </div>
                </div>

                <!-- Address -->
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-accent flex items-center justify-center flex-shrink-0">
                        <i data-lucide="map-pin" class="w-5 h-5"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Alamat Lengkap</span>
                        <span class="text-sm font-bold text-brand-brown mt-0.5 leading-relaxed">{{ $settings['address'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Direct WA Trigger -->
            <div class="flex flex-col gap-3 pt-2">
                <a href="{{ $whatsappUrl }}" target="_blank"
                   class="bg-brand-accent hover:bg-brand-accent-hover text-white text-center py-4 rounded-2xl font-bold shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                    Chat WhatsApp Sekarang
                </a>
            </div>
        </div>

        <!-- Google Maps Embed Column -->
        <div class="lg:col-span-7 flex flex-col gap-6 w-full">
            <h3 class="font-display text-xl font-bold text-brand-brown flex items-center gap-2">
                <i data-lucide="map" class="w-5 h-5 text-brand-accent"></i>
                Lokasi Toko Kami
            </h3>

            <div class="w-full h-96 rounded-[2.5rem] overflow-hidden border border-brand-beige/30 shadow-md bg-gray-50">
                @if(!empty($settings['google_maps_embed']))
                    <iframe src="{{ $settings['google_maps_embed'] }}" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi NomNomora Google Maps">
                    </iframe>
                @else
                    <!-- Fallback placeholder with link -->
                    <div class="w-full h-full flex flex-col items-center justify-center text-center p-8 gap-4 text-gray-400 bg-gray-50">
                        <i data-lucide="map-pin" class="w-16 h-16 text-brand-beige animate-bounce"></i>
                        <span class="text-sm font-semibold">Tautan Peta Tersedia</span>
                        <a href="https://maps.app.goo.gl/z4FxRxsJTHPhGAmr7" target="_blank" class="bg-brand-brown hover:bg-brand-accent text-white px-6 py-3 rounded-full text-xs font-bold shadow-md transition-colors">
                            Lihat di Google Maps
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
