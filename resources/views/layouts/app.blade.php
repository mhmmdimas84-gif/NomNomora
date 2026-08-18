<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Optimization -->
    <title>@yield('title', ($globalSettings['site_name'] ?? 'NomNomora') . ' - ' . ($globalSettings['tagline'] ?? 'Every Bite. Pure Delight.'))</title>
    <meta name="description" content="@yield('meta_description', $globalSettings['description'] ?? 'NomNomora menghadirkan camilan lezat seperti Crab Puffs dan Chikki Rice Bites dengan cita rasa gurih, creamy, dan menggugah selera.')">
    <meta name="keywords" content="NomNomora, Crab Puffs, Chikki Rice Bites, Camilan, Nasi Kekinian, Kuliner Jakarta, Makanan Creamy, Camilan Pedas">
    
    <!-- Open Graph Metadata -->
    <meta property="og:title" content="@yield('title', ($globalSettings['site_name'] ?? 'NomNomora') . ' - ' . ($globalSettings['tagline'] ?? 'Every Bite. Pure Delight.'))">
    <meta property="og:description" content="@yield('meta_description', $globalSettings['description'] ?? 'NomNomora menghadirkan camilan lezat seperti Crab Puffs dan Chikki Rice Bites dengan cita rasa gurih, creamy, dan menggugah selera.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Tailwind & JS Compilation -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-brand-cream text-brand-brown font-sans flex flex-col min-h-screen selection:bg-brand-accent selection:text-white antialiased">

    <!-- Sticky Navbar -->
    <nav x-data="{ mobileOpen: false, isScrolled: false }" 
         x-init="window.addEventListener('scroll', () => { isScrolled = window.scrollY > 20 })"
         :class="isScrolled ? 'bg-white/95 backdrop-blur-md shadow-md py-4' : 'bg-brand-cream/80 backdrop-blur-sm py-5'"
         class="sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <span class="font-display text-2xl font-extrabold tracking-tight text-brand-accent group-hover:scale-105 transition-transform duration-200">
                    {{ $globalSettings['site_name'] ?? 'NomNomora' }}
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-brand-accent"></span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-brand-accent border-b-2 border-brand-accent' : 'text-brand-brown/80 hover:text-brand-accent' }} transition-colors py-1">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-brand-accent border-b-2 border-brand-accent' : 'text-brand-brown/80 hover:text-brand-accent' }} transition-colors py-1">Tentang Kami</a>
                <a href="{{ route('menu.index') }}" class="{{ request()->routeIs('menu.*') ? 'text-brand-accent border-b-2 border-brand-accent' : 'text-brand-brown/80 hover:text-brand-accent' }} transition-colors py-1">Menu</a>
                <a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.index') ? 'text-brand-accent border-b-2 border-brand-accent' : 'text-brand-brown/80 hover:text-brand-accent' }} transition-colors py-1">Galeri</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-brand-accent border-b-2 border-brand-accent' : 'text-brand-brown/80 hover:text-brand-accent' }} transition-colors py-1">Kontak</a>
            </div>

            <!-- Header CTA -->
            <div class="hidden md:block">
                @php
                    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $globalSettings['whatsapp_number'] ?? '6281234567890');
                    $directWaUrl = "https://wa.me/" . $cleanWhatsapp . "?text=" . urlencode("Halo NomNomora 👋\n\nSaya ingin memesan menu lezat NomNomora.");
                @endphp
                <a href="{{ $directWaUrl }}" target="_blank" 
                   class="bg-brand-accent hover:bg-brand-accent-hover text-white px-5 py-2.5 rounded-full font-bold shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i data-lucide="shopping-bag" class="w-4.5 h-4.5"></i>
                    Pesan Sekarang
                </a>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden text-brand-brown p-2 hover:text-brand-accent focus:outline-none" aria-label="Toggle Menu">
                <i x-show="!mobileOpen" data-lucide="menu" class="w-6 h-6"></i>
                <i x-show="mobileOpen" data-lucide="x" class="w-6 h-6" x-cloak></i>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-white border-t border-brand-beige/30 absolute left-0 right-0 py-6 px-8 shadow-xl flex flex-col gap-4 font-medium"
             x-cloak>
            <a href="{{ route('home') }}" @click="mobileOpen = false" class="py-2 {{ request()->routeIs('home') ? 'text-brand-accent font-bold' : 'text-brand-brown/80' }}">Home</a>
            <a href="{{ route('about') }}" @click="mobileOpen = false" class="py-2 {{ request()->routeIs('about') ? 'text-brand-accent font-bold' : 'text-brand-brown/80' }}">Tentang Kami</a>
            <a href="{{ route('menu.index') }}" @click="mobileOpen = false" class="py-2 {{ request()->routeIs('menu.*') ? 'text-brand-accent font-bold' : 'text-brand-brown/80' }}">Menu</a>
            <a href="{{ route('gallery.index') }}" @click="mobileOpen = false" class="py-2 {{ request()->routeIs('gallery.index') ? 'text-brand-accent font-bold' : 'text-brand-brown/80' }}">Galeri</a>
            <a href="{{ route('contact') }}" @click="mobileOpen = false" class="py-2 {{ request()->routeIs('contact') ? 'text-brand-accent font-bold' : 'text-brand-brown/80' }}">Kontak</a>
            <hr class="border-brand-beige/40 my-1">
            <a href="{{ $directWaUrl }}" target="_blank"
               class="bg-brand-accent hover:bg-brand-accent-hover text-white text-center py-3 rounded-xl font-bold shadow-md flex items-center justify-center gap-2">
                <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                Pesan Sekarang via WA
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-brown text-white py-16 mt-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Brand Info -->
            <div class="flex flex-col gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 w-max">
                    <span class="font-display text-3xl font-extrabold tracking-tight text-white">
                        {{ $globalSettings['site_name'] ?? 'NomNomora' }}
                    </span>
                    <span class="w-2 h-2 rounded-full bg-brand-accent"></span>
                </a>
                <p class="text-white/70 italic text-lg">"{{ $globalSettings['tagline'] ?? 'Every Bite. Pure Delight.' }}"</p>
                <p class="text-white/60 text-sm max-w-sm">
                    {{ $globalSettings['description'] ?? 'NomNomora menghadirkan camilan lezat kekinian berkualitas tinggi dengan cita rasa gurih, creamy, dan pedas yang menggugah selera.' }}
                </p>
            </div>

            <!-- Quick Links -->
            <div class="flex flex-col gap-4">
                <h4 class="font-display text-xl font-bold tracking-wide">Menu Navigasi</h4>
                <div class="grid grid-cols-2 gap-2 text-white/70 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-brand-accent transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-brand-accent transition-colors">Tentang Kami</a>
                    <a href="{{ route('menu.index') }}" class="hover:text-brand-accent transition-colors">Menu</a>
                    <a href="{{ route('gallery.index') }}" class="hover:text-brand-accent transition-colors">Galeri</a>
                    <a href="{{ route('contact') }}" class="hover:text-brand-accent transition-colors">Kontak</a>
                </div>
            </div>

            <!-- Contact & Socials -->
            <div class="flex flex-col gap-4">
                <h4 class="font-display text-xl font-bold tracking-wide">Hubungi Kami</h4>
                <p class="text-white/70 text-sm">
                    <span class="font-bold block text-white">Alamat:</span>
                    {{ $globalSettings['address'] ?? 'Jakarta, Indonesia' }}
                </p>
                <p class="text-white/70 text-sm">
                    <span class="font-bold block text-white">Jam Operasional:</span>
                    {{ $globalSettings['opening_hours'] ?? '10:00 - 21:00' }}
                </p>
                
                <!-- Social Icons -->
                <div class="flex items-center gap-4 mt-2">
                    @if(!empty($globalSettings['instagram']))
                        <a href="https://instagram.com/{{ ltrim($globalSettings['instagram'], '@') }}" target="_blank" 
                           class="w-10 h-10 rounded-full bg-white/10 hover:bg-brand-accent hover:scale-110 flex items-center justify-center transition-all duration-300" aria-label="Instagram">
                            <i data-lucide="instagram" class="w-5 h-5"></i>
                        </a>
                    @endif
                    @if(!empty($globalSettings['tiktok']))
                        <a href="https://tiktok.com/@{{ ltrim($globalSettings['tiktok'], '@') }}" target="_blank" 
                           class="w-10 h-10 rounded-full bg-white/10 hover:bg-brand-accent hover:scale-110 flex items-center justify-center transition-all duration-300" aria-label="TikTok">
                            <span class="font-bold text-sm">TT</span>
                        </a>
                    @endif
                    <a href="https://wa.me/{{ $cleanWhatsapp }}" target="_blank" 
                       class="w-10 h-10 rounded-full bg-white/10 hover:bg-brand-accent hover:scale-110 flex items-center justify-center transition-all duration-300" aria-label="WhatsApp">
                        <i data-lucide="phone" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="border-white/10 my-10 max-w-7xl mx-auto px-6">

        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4 text-white/50 text-sm">
            <p>{{ $globalSettings['footer_text'] ?? '© 2026 NomNomora. All Rights Reserved.' }}</p>
            <div class="flex gap-4">
                <a href="{{ route('admin.login') }}" class="hover:underline hover:text-white">Admin Login</a>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div x-data="{ show: false }" 
         x-init="window.addEventListener('scroll', () => { show = window.scrollY > 400 })"
         class="fixed bottom-6 right-6 z-40"
         x-cloak>
        <button x-show="show" 
                @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4"
                class="w-12 h-12 rounded-full bg-brand-brown hover:bg-brand-accent text-white flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 focus:outline-none"
                aria-label="Back to top">
            <i data-lucide="arrow-up" class="w-5 h-5"></i>
        </button>
    </div>

    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-6 left-6 z-40">
        <a href="{{ $directWaUrl }}" target="_blank"
           class="w-14 h-14 rounded-full bg-[#25D366] hover:bg-[#20BA5A] text-white flex items-center justify-center shadow-xl hover:shadow-2xl transition-all duration-300 cursor-pointer transform hover:scale-110 hover:-translate-y-1 animate-bounce"
           title="Hubungi WhatsApp Kami"
           aria-label="Hubungi WhatsApp Kami">
            <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.625 1.451 5.403.002 9.789-4.379 9.792-9.782.002-2.616-1.012-5.078-2.859-6.927C16.32 2.047 13.87 1.033 11.268 1.033c-5.41 0-9.802 4.385-9.805 9.79-.001 1.57.425 3.102 1.233 4.457L1.69 20.486l5.22-1.367c.002.002.002.002.003.002L6.647 19.15zM17.487 14.39c-.3-.15-1.774-.875-2.05-.976-.275-.1-.475-.15-.675.15-.2.3-.775.976-.95 1.176-.175.2-.35.225-.65.075-.3-.15-1.267-.467-2.413-1.49-1.04-.928-1.523-1.638-1.724-1.938-.2-.3-.022-.462.128-.612.135-.135.3-.35.45-.525.15-.175.2-.3.3-.5s.05-.375-.025-.525C9.7 9.04 9.1 7.575 8.85 6.975c-.244-.588-.491-.508-.675-.518-.174-.009-.374-.01-.574-.01-.2 0-.525.075-.8.375-.275.3-1.05 1.025-1.05 2.5s1.075 2.9 1.225 3.1c.15.2 2.11 3.22 5.11 4.516.714.308 1.272.493 1.707.632.714.227 1.364.195 1.878.118.572-.085 1.775-.725 2.025-1.425.25-.7.25-1.3.175-1.425-.076-.125-.276-.2-.576-.35z"/>
            </svg>
        </a>
    </div>

    <!-- Lucide Icon Initialization -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
