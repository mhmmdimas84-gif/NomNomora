@extends('layouts.app')

@section('title', 'Tentang Kami - ' . ($globalSettings['site_name'] ?? 'NomNomora'))

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-b from-brand-cream to-white py-16 text-center">
    <div class="max-w-4xl mx-auto px-6 flex flex-col items-center gap-4">
        <span class="text-brand-accent font-extrabold tracking-widest text-xs uppercase">Cerita Kami</span>
        <h1 class="font-display text-4xl sm:text-5xl font-black text-brand-brown">Tentang NomNomora</h1>
        <div class="w-16 h-1 rounded-full bg-brand-accent mt-2"></div>
        <p class="text-brand-brown/70 text-lg leading-relaxed mt-4 max-w-2xl">
            Dari rasa penasaran, resep rumahan kreatif, hingga lahir sebagai brand camilan kekinian terfavorit di hati Anda.
        </p>
    </div>
</section>

<!-- Story Content Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Visual Column -->
        <div class="lg:col-span-5 flex justify-center">
            <div class="w-80 sm:w-96 h-[30rem] rounded-[3rem] bg-brand-cream border border-brand-beige p-3 shadow-xl overflow-hidden relative">
                <div class="w-full h-full rounded-[2.5rem] bg-brand-brown text-white p-8 flex flex-col justify-between items-start gap-6 relative">
                    <span class="bg-brand-accent text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full shadow-md">Sejak 2026</span>
                    
                    <div class="flex flex-col gap-3">
                        <span class="font-display text-4xl font-black text-brand-beige">Rasa Gurih, Creamy & Pedas</span>
                        <p class="text-xs text-white/70 leading-relaxed">
                            Kami percaya perpaduan bahan baku premium serta pengolahan kreatif menghadirkan kenikmatan sejati.
                        </p>
                    </div>

                    <div class="w-full h-24 rounded-2xl bg-white/10 flex items-center justify-center">
                        <i data-lucide="cookie" class="w-12 h-12 text-brand-beige"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Text Story Column -->
        <div class="lg:col-span-7 flex flex-col items-start gap-6">
            <h2 class="font-display text-2xl sm:text-3xl font-black text-brand-brown leading-tight">Perjalanan Menghadirkan Cita Rasa Terbaik</h2>
            <div class="w-12 h-1 bg-brand-accent rounded-full"></div>
            
            <p class="text-brand-brown/70 text-md leading-relaxed">
                NomNomora lahir dari kecintaan kami terhadap kuliner makanan ringan yang memiliki perpaduan rasa unik. Kami menyadari bahwa camilan kekinian saat ini sering kali melupakan esensi kelembutan rasa creamy yang pas dan rasa pedas cocolan seblak kencur yang harum otentik.
            </p>
            
            <p class="text-brand-brown/70 text-md leading-relaxed">
                Melalui serangkaian eksperimen rasa di dapur kami, lahirlah **Crab Puffs** - perpaduan kulit pangsit renyah dengan isian stik kepiting premium yang berbalut mayones dan keju spread lembut, serta disajikan bersama sambal cocolan seblak kencur pedas manis yang menggugah selera.
            </p>
            
            <p class="text-brand-brown/70 text-md leading-relaxed">
                Untuk melengkapi variasi menu bagi Anda yang membutuhkan porsi ganjel perut lebih mantap, kami menciptakan **Chikki Rice Bites** - bola-bola nasi bumbu nori yang gurih manis dipadukan dengan krispinya potongan ayam popcorn ala Korea berbalut saus spesial khas kami.
            </p>

            <blockquote class="border-l-4 border-brand-accent pl-4 italic text-brand-brown/80 font-medium py-1">
                "NomNomora berkomitmen menjaga higienitas, kesegaran bahan baku, dan pelayanan cepat agar camilan Anda selalu dinikmati dalam kondisi hangat terbaik."
            </blockquote>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="py-20 bg-brand-cream/35">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Vision -->
        <div class="bg-white border border-brand-beige/25 p-8 sm:p-10 rounded-3xl shadow-sm flex flex-col gap-4">
            <div class="w-12 h-12 rounded-xl bg-orange-50 text-brand-accent flex items-center justify-center">
                <i data-lucide="compass" class="w-6 h-6"></i>
            </div>
            <h3 class="font-display text-2xl font-bold text-brand-brown">Visi Kami</h3>
            <p class="text-brand-brown/75 text-sm leading-relaxed">
                Menjadi brand kuliner camilan kekinian nomor satu pilihan anak muda, yang tidak hanya mengutamakan rasa pedas nampol namun juga menghadirkan kelembutan rasa gurih-creamy berkualitas premium di setiap gigitannya.
            </p>
        </div>

        <!-- Mission -->
        <div class="bg-white border border-brand-beige/25 p-8 sm:p-10 rounded-3xl shadow-sm flex flex-col gap-4">
            <div class="w-12 h-12 rounded-xl bg-orange-50 text-brand-accent flex items-center justify-center">
                <i data-lucide="target" class="w-6 h-6"></i>
            </div>
            <h3 class="font-display text-2xl font-bold text-brand-brown">Misi Kami</h3>
            <ul class="flex flex-col gap-3 text-brand-brown/75 text-sm">
                <li class="flex items-start gap-2.5">
                    <span class="text-brand-accent mt-0.5 font-bold">✓</span>
                    <span>Hanya menggunakan bahan baku segar, halal, dan berkualitas premium untuk setiap olahan.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-brand-accent mt-0.5 font-bold">✓</span>
                    <span>Konsisten menjaga higienitas dapur dan standar sanitasi tinggi selama pengolahan makanan.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-brand-accent mt-0.5 font-bold">✓</span>
                    <span>Mengutamakan kepuasan pelanggan lewat kemasan rapi dan layanan pesan antar WhatsApp yang ramah dan cepat.</span>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection
