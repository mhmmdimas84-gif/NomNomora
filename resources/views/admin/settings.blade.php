@extends('layouts.admin')

@section('content')
<div class="flex flex-col gap-6 max-w-4xl">
    <div class="flex flex-col gap-1">
        <h1 class="text-3xl font-extrabold text-gray-900">Pengaturan Website</h1>
        <p class="text-gray-500">Sesuaikan informasi bisnis, nomor WhatsApp pemesanan, jam operasional, dan akun media sosial.</p>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="flex flex-col gap-6">
            @csrf

            <!-- Section 1: Identitas Bisnis -->
            <div>
                <h3 class="text-md font-bold text-brand-brown border-b border-gray-100 pb-2 mb-4 flex items-center gap-2">
                    <i data-lucide="store" class="w-5 h-5 text-brand-accent"></i>
                    Identitas Bisnis & Tampilan Utama
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-1.5">
                        <label for="site_name" class="text-sm font-bold text-gray-700">Nama Bisnis</label>
                        <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name']) }}" required
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                               placeholder="NomNomora">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="tagline" class="text-sm font-bold text-gray-700">Tagline Bisnis</label>
                        <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $settings['tagline']) }}" required
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                               placeholder="Every Bite. Pure Delight.">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5 mt-4">
                    <label for="description" class="text-sm font-bold text-gray-700">Deskripsi Singkat Bisnis (Tentang Kami)</label>
                    <textarea id="description" name="description" rows="3" required
                              class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                              placeholder="Deskripsikan NomNomora...">{{ old('description', $settings['description']) }}</textarea>
                </div>
            </div>

            <!-- Section 2: Kontak & Media Sosial -->
            <div class="mt-4">
                <h3 class="text-md font-bold text-brand-brown border-b border-gray-100 pb-2 mb-4 flex items-center gap-2">
                    <i data-lucide="phone" class="w-5 h-5 text-brand-accent"></i>
                    Kontak & Integrasi WhatsApp
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="flex flex-col gap-1.5">
                        <label for="whatsapp_number" class="text-sm font-bold text-gray-700">Nomor WhatsApp Pemesanan</label>
                        <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}" required
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                               placeholder="Contoh: 6281234567890">
                        <span class="text-[10px] text-gray-400 font-medium">Gunakan kode negara (misal: 628123...) tanpa tanda '+' atau spasi.</span>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="instagram" class="text-sm font-bold text-gray-700">Username Instagram (Opsional)</label>
                        <input type="text" id="instagram" name="instagram" value="{{ old('instagram', $settings['instagram']) }}"
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                               placeholder="Contoh: @nomnomora.id">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="tiktok" class="text-sm font-bold text-gray-700">Username TikTok (Opsional)</label>
                        <input type="text" id="tiktok" name="tiktok" value="{{ old('tiktok', $settings['tiktok']) }}"
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                               placeholder="Contoh: @nomnomora.id">
                    </div>
                </div>
            </div>

            <!-- Section 3: Informasi Operasional & Lokasi -->
            <div class="mt-4">
                <h3 class="text-md font-bold text-brand-brown border-b border-gray-100 pb-2 mb-4 flex items-center gap-2">
                    <i data-lucide="map-pin" class="w-5 h-5 text-brand-accent"></i>
                    Operasional & Lokasi Google Maps
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-1.5">
                        <label for="opening_hours" class="text-sm font-bold text-gray-700">Jam Operasional Toko</label>
                        <input type="text" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $settings['opening_hours']) }}" required
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                               placeholder="Senin - Minggu: 10:00 - 21:00 WIB">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="address" class="text-sm font-bold text-gray-700">Alamat Lengkap Bisnis</label>
                        <input type="text" id="address" name="address" value="{{ old('address', $settings['address']) }}" required
                               class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                               placeholder="Jl. Kuliner Kekinian No. 45...">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5 mt-4">
                    <label for="google_maps_embed" class="text-sm font-bold text-gray-700">URL Embed Google Maps Iframe (Opsional)</label>
                    <textarea id="google_maps_embed" name="google_maps_embed" rows="3"
                              class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                              placeholder="Masukkan tautan src dari tag iframe Google Maps...">{{ old('google_maps_embed', $settings['google_maps_embed']) }}</textarea>
                    <span class="text-[10px] text-gray-400 font-medium">Buka Google Maps > Bagikan > Sematkan Peta > Copy URL src di dalam tag iframe tersebut.</span>
                </div>
            </div>

            <!-- Section 4: Footer Copyright -->
            <div class="mt-4">
                <h3 class="text-md font-bold text-brand-brown border-b border-gray-100 pb-2 mb-4 flex items-center gap-2">
                    <i data-lucide="copyright" class="w-5 h-5 text-brand-accent"></i>
                    Informasi Kaki Halaman (Footer)
                </h3>
                
                <div class="flex flex-col gap-1.5">
                    <label for="footer_text" class="text-sm font-bold text-gray-700">Teks Hak Cipta (Copyright Text)</label>
                    <input type="text" id="footer_text" name="footer_text" value="{{ old('footer_text', $settings['footer_text']) }}" required
                           class="border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent transition-all"
                           placeholder="© 2026 NomNomora. All Rights Reserved.">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-4 mt-6">
                <button type="submit" 
                        class="bg-brand-brown hover:bg-brand-accent text-white font-bold px-8 py-3.5 rounded-xl text-sm shadow-md hover:shadow-lg transition-all cursor-pointer">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
