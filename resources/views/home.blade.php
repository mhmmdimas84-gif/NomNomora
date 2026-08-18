@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[85vh] flex items-center bg-gradient-to-br from-brand-cream via-brand-cream/60 to-brand-beige/25 pt-6 pb-16 overflow-hidden">
    <!-- Decorative Blobs -->
    <div class="absolute top-1/4 -left-20 w-80 h-80 rounded-full bg-brand-beige/35 blur-3xl -z-10"></div>
    <div class="absolute bottom-10 -right-20 w-96 h-96 rounded-full bg-brand-accent/5 blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto px-6 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Hero Text -->
        <div class="lg:col-span-6 flex flex-col items-start gap-6 max-w-xl">
            <span class="bg-brand-beige text-brand-brown text-xs font-extrabold uppercase tracking-widest px-4 py-1.5 rounded-full flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-accent animate-ping"></span>
                NomNomora Snack Kekinian
            </span>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-black text-brand-brown leading-tight">
                Every Bite. <br>
                <span class="text-brand-accent">Pure Delight.</span>
            </h1>
            <p class="text-brand-brown/70 text-lg leading-relaxed">
                Temukan sensasi camilan lezat dengan perpaduan rasa gurih, creamy, pedas, dan menggugah selera bersama NomNomora. Camilan pas di setiap momen berharga Anda.
            </p>
            
            <div class="flex flex-wrap gap-4 mt-2">
                <a href="{{ route('menu.index') }}" 
                   class="bg-brand-brown hover:bg-brand-brown-light text-white font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                    Lihat Menu
                    <i data-lucide="arrow-right" class="w-4.5 h-4.5"></i>
                </a>
                
                @php
                    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $globalSettings['whatsapp_number'] ?? '6281234567890');
                    $orderNowUrl = "https://wa.me/" . $cleanWhatsapp . "?text=" . urlencode("Halo NomNomora\n\nSaya ingin memesan menu lezat yang tersedia di NomNomora.");
                @endphp
                <a href="{{ $orderNowUrl }}" target="_blank"
                   class="bg-white hover:bg-gray-50 border border-brand-beige text-brand-brown font-bold px-8 py-4 rounded-full shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i data-lucide="phone" class="w-4.5 h-4.5 text-brand-accent"></i>
                    Pesan Sekarang
                </a>
            </div>
        </div>

        <!-- Hero Visual/Image Placeholder -->
        <div class="lg:col-span-6 flex justify-center relative">
            <div class="relative w-72 sm:w-96 h-72 sm:h-96 rounded-[3rem] bg-brand-beige/40 p-4 border border-brand-beige/50 overflow-hidden shadow-2xl flex items-center justify-center transform rotate-3 hover:rotate-0 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-tr from-brand-accent/20 to-transparent mix-blend-overlay"></div>
                <!-- Beautiful illustrative food container -->
                <div class="flex flex-col items-center justify-center text-center gap-4 p-8 text-brand-brown">
                    <i data-lucide="cookie" class="w-20 h-20 text-brand-accent animate-pulse"></i>
                    <span class="font-display text-2xl font-black text-brand-brown uppercase tracking-wide">NomNomora</span>
                    <p class="text-xs text-brand-brown/60 max-w-[200px] font-semibold italic">"Perpaduan Crab Puffs creamy & Chikki Rice Bites gurih kekinian"</p>
                </div>
            </div>
            <!-- Decorative Accent Elements -->
            <div class="absolute -top-4 right-12 bg-white px-4 py-2.5 rounded-2xl shadow-lg border border-brand-beige/30 flex items-center gap-2 animate-bounce">
                <span class="text-yellow-500 font-bold text-sm">⭐ 5.0 Rating</span>
            </div>
            <div class="absolute -bottom-4 left-10 bg-white px-4 py-2.5 rounded-2xl shadow-lg border border-brand-beige/30 flex items-center gap-2">
                <span class="text-brand-accent font-black text-sm">🌶️ Pedas Gurih Creamy</span>
            </div>
        </div>
    </div>
</section>

<!-- Keunggulan Section (Poster Style 4 Columns) -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-12">
        <div class="text-center flex flex-col items-center gap-3">
            <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Mengapa Kami?</span>
            <h2 class="font-display text-3xl sm:text-4xl font-black text-brand-brown">Kenapa Pilih NomNomora?</h2>
            <div class="w-16 h-1 rounded-full bg-brand-accent"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-brand-cream/40 border border-brand-beige/20 p-8 rounded-3xl flex flex-col items-center text-center gap-4 hover:shadow-xl hover:bg-white hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i data-lucide="award" class="w-8 h-8"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-brand-brown">Bahan Pilihan Berkualitas</h3>
                <p class="text-sm text-brand-brown/70 leading-relaxed">
                    Setiap produk diolah menggunakan bahan baku premium yang segar dan terjamin kualitas kebersihannya.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-brand-cream/40 border border-brand-beige/20 p-8 rounded-3xl flex flex-col items-center text-center gap-4 hover:shadow-xl hover:bg-white hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-red-50 text-brand-accent flex items-center justify-center">
                    <i data-lucide="flame" class="w-8 h-8"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-brand-brown">Rasa Lezat & Nampol</h3>
                <p class="text-sm text-brand-brown/70 leading-relaxed">
                    Perpaduan bumbu gurih, tekstur renyah, sensasi creamy, dan pedas yang berpadu seimbang memanjakan lidah.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-brand-cream/40 border border-brand-beige/20 p-8 rounded-3xl flex flex-col items-center text-center gap-4 hover:shadow-xl hover:bg-white hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-pink-50 text-pink-600 flex items-center justify-center">
                    <i data-lucide="heart" class="w-8 h-8"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-brand-brown">Dibuat dengan Cinta</h3>
                <p class="text-sm text-brand-brown/70 leading-relaxed">
                    Dibuat fresh to order dengan penuh kehati-hatian demi menghadirkan cita rasa masakan rumah yang otentik.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-brand-cream/40 border border-brand-beige/20 p-8 rounded-3xl flex flex-col items-center text-center gap-4 hover:shadow-xl hover:bg-white hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="party-popper" class="w-8 h-8"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-brand-brown">Cocok untuk Semua Momen</h3>
                <p class="text-sm text-brand-brown/70 leading-relaxed">
                    Baik untuk ganjel lapar siang hari, kumpul keluarga, maupun sebagai camilan nobar santai Anda.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-20 bg-brand-cream/35">
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div class="flex flex-col gap-3">
                <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Katalog Terlaris</span>
                <h2 class="font-display text-3xl sm:text-4xl font-black text-brand-brown">Menu Unggulan Rekomendasi</h2>
                <div class="w-16 h-1 rounded-full bg-brand-accent"></div>
            </div>
            <a href="{{ route('menu.index') }}" 
               class="text-brand-accent hover:text-brand-accent-hover font-bold text-sm flex items-center gap-1.5 group">
                Lihat Semua Menu
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProducts as $prod)
                <div class="bg-white border border-brand-beige/15 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col h-full group">
                    <!-- Image Box -->
                    <div class="h-60 bg-gray-50 relative overflow-hidden flex items-center justify-center flex-shrink-0">
                        @if($prod->image)
                            <img src="{{ asset('storage/' . $prod->image) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <i data-lucide="cookie" class="w-16 h-16 text-brand-beige"></i>
                        @endif
                        <span class="absolute top-4 left-4 bg-brand-brown text-white text-xs font-bold px-3 py-1 rounded-full">
                            {{ $prod->category->name }}
                        </span>
                        @if($prod->is_featured)
                            <span class="absolute top-4 right-4 bg-brand-accent text-white text-[10px] font-extrabold uppercase tracking-wide px-2.5 py-1 rounded-full shadow-md flex items-center gap-1">
                                <i data-lucide="star" class="w-3 h-3 fill-current"></i> Unggulan
                            </span>
                        @endif
                    </div>

                    <!-- Details Box -->
                    <div class="p-6 flex flex-col flex-grow justify-between gap-5">
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-between items-start gap-2">
                                <h3 class="font-display text-xl font-bold text-brand-brown leading-tight">{{ $prod->name }}</h3>
                                <span class="font-bold text-brand-accent text-lg flex-shrink-0">Rp {{ number_format($prod->price, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-xs text-brand-brown/70 line-clamp-3 leading-relaxed">{{ $prod->description }}</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-3 mt-auto">
                            <a href="{{ route('menu.show', $prod->slug) }}" 
                               class="bg-gray-100 hover:bg-brand-beige/30 text-brand-brown font-bold py-3 px-4 rounded-2xl text-xs text-center transition-colors">
                                Detail Produk
                            </a>
                            <a href="{{ $prod->whatsapp_url }}" target="_blank" 
                               class="bg-brand-accent hover:bg-brand-accent-hover text-white font-bold py-3 px-4 rounded-2xl text-xs text-center shadow-sm flex items-center justify-center gap-1 transition-colors">
                                <i data-lucide="shopping-cart" class="w-3.5 h-3.5"></i>
                                Pesan WA
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Visual Column -->
        <div class="lg:col-span-5 flex justify-center relative">
            <div class="w-80 h-80 rounded-full bg-brand-cream/60 absolute -z-10 blur-2xl"></div>
            <!-- Food illustration / display layout -->
            <div class="w-80 h-[28rem] rounded-[2.5rem] bg-brand-cream border border-brand-beige overflow-hidden p-3 shadow-xl transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                <div class="w-full h-full rounded-[2rem] bg-brand-brown text-white p-8 flex flex-col justify-between items-start gap-6">
                    <span class="bg-brand-accent text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full">Dibuat Segar Setiap Hari</span>
                    <div class="flex flex-col gap-3">
                        <span class="font-display text-4xl font-black">NomNomora</span>
                        <p class="text-xs text-white/60 leading-relaxed">Setiap gigitan camilan kami diracik dengan bumbu terbaik untuk pengalaman kuliner kekinian yang memuaskan.</p>
                    </div>
                    <div class="w-full h-24 rounded-2xl bg-white/10 flex items-center justify-center">
                        <i data-lucide="cooking-pot" class="w-10 h-10 text-brand-beige"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Story Column -->
        <div class="lg:col-span-7 flex flex-col items-start gap-6">
            <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Mengenal Kami</span>
            <h2 class="font-display text-3xl sm:text-4xl font-black text-brand-brown leading-tight">Kami Percaya Setiap Gigitan Adalah Sebuah Pengalaman Rasa</h2>
            <div class="w-16 h-1 bg-brand-accent rounded-full"></div>
            <p class="text-brand-brown/70 text-md leading-relaxed">
                NomNomora hadir untuk menghadirkan camilan lezat dengan perpaduan rasa yang unik dan bahan berkualitas. Kami percaya bahwa setiap gigitan bukan hanya tentang rasa, tetapi juga tentang pengalaman dan kehangatan yang dibagikan bersama orang terkasih.
            </p>
            <p class="text-brand-brown/75 text-md leading-relaxed">
                Dari dapur kami, kami menyajikan olahan camilan kekinian gurih & creamy yang pas, diproses secara bersih dan higienis. Cobalah **Crab Puffs** kami yang renyah dengan isian meleleh, atau nikmati kepraktisan **Chikki Rice Bites** di sela kesibukan Anda!
            </p>
            <a href="{{ route('about') }}" 
               class="bg-brand-brown hover:bg-brand-brown-light text-white font-bold px-7 py-3.5 rounded-full shadow-md text-sm transition-colors mt-2 cursor-pointer">
                Baca Selengkapnya
            </a>
        </div>
    </div>
</section>

<!-- Timeline Cara Pemesanan -->
<section class="py-20 bg-brand-cream/35">
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-16">
        <div class="text-center flex flex-col items-center gap-3">
            <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Langkah Mudah</span>
            <h2 class="font-display text-3xl sm:text-4xl font-black text-brand-brown">Cara Pemesanan Menu</h2>
            <div class="w-16 h-1 rounded-full bg-brand-accent"></div>
        </div>

        <!-- Steps Timeline Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
            <!-- Step 1 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-beige/20 shadow-sm flex flex-col items-center text-center gap-4 relative">
                <span class="absolute -top-5 left-8 w-10 h-10 rounded-full bg-brand-brown text-white font-bold text-sm flex items-center justify-center shadow-md">1</span>
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-brand-accent flex items-center justify-center mt-2">
                    <i data-lucide="book-open" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-brand-brown text-lg">Pilih Produk</h3>
                <p class="text-xs text-brand-brown/70 leading-relaxed">Telusuri katalog menu makanan terbaik kami dan pilih camilan kesukaanmu.</p>
            </div>

            <!-- Step 2 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-beige/20 shadow-sm flex flex-col items-center text-center gap-4 relative">
                <span class="absolute -top-5 left-8 w-10 h-10 rounded-full bg-brand-brown text-white font-bold text-sm flex items-center justify-center shadow-md">2</span>
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-brand-accent flex items-center justify-center mt-2">
                    <i data-lucide="message-square" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-brand-brown text-lg">Hubungi WhatsApp</h3>
                <p class="text-xs text-brand-brown/70 leading-relaxed">Klik tombol "Pesan Sekarang" untuk langsung masuk ke obrolan WhatsApp kami.</p>
            </div>

            <!-- Step 3 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-beige/20 shadow-sm flex flex-col items-center text-center gap-4 relative">
                <span class="absolute -top-5 left-8 w-10 h-10 rounded-full bg-brand-brown text-white font-bold text-sm flex items-center justify-center shadow-md">3</span>
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-brand-accent flex items-center justify-center mt-2">
                    <i data-lucide="truck" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-brand-brown text-lg">Konfirmasi & Bayar</h3>
                <p class="text-xs text-brand-brown/70 leading-relaxed">Konfirmasi pesanan, masukkan alamat pengiriman, dan lakukan transaksi pembayaran.</p>
            </div>

            <!-- Step 4 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-beige/20 shadow-sm flex flex-col items-center text-center gap-4 relative">
                <span class="absolute -top-5 left-8 w-10 h-10 rounded-full bg-brand-brown text-white font-bold text-sm flex items-center justify-center shadow-md">4</span>
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-brand-accent flex items-center justify-center mt-2">
                    <i data-lucide="smile" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-brand-brown text-lg">Pesanan Diproses</h3>
                <p class="text-xs text-brand-brown/70 leading-relaxed">Pesanan langsung dipersiapkan dan diantar hangat sampai ke alamat rumah Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-12" x-data="{ activeIndex: 0, count: {{ $testimonials->count() }} }">
        <div class="text-center flex flex-col items-center gap-3">
            <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Ulasan Jujur</span>
            <h2 class="font-display text-3xl sm:text-4xl font-black text-brand-brown">Apa Kata Mereka?</h2>
            <div class="w-16 h-1 rounded-full bg-brand-accent"></div>
        </div>

        <!-- Carousel / Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($testimonials as $t)
                <div class="bg-brand-cream/35 border border-brand-beige/20 p-8 rounded-3xl shadow-xs flex flex-col gap-5 justify-between">
                    <p class="text-brand-brown/80 text-sm leading-relaxed italic">
                        "{{ $t->message }}"
                    </p>
                    <div class="flex items-center gap-3 border-t border-brand-beige/35 pt-4">
                        <div class="w-10 h-10 rounded-full bg-brand-beige/40 flex-shrink-0 flex items-center justify-center overflow-hidden">
                            @if($t->photo)
                                <img src="{{ asset('storage/' . $t->photo) }}" alt="{{ $t->name }}" class="w-full h-full object-cover">
                            @else
                                <i data-lucide="user" class="w-5 h-5 text-brand-brown"></i>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-brand-brown text-sm leading-none">{{ $t->name }}</span>
                            <div class="flex items-center text-yellow-500 font-bold mt-1">
                                @for($i = 1; $i <= $t->rating; $i++)
                                    ★
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-400 font-medium">Belum ada testimonial pelanggan.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
