<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - {{ $globalSettings['site_name'] ?? 'NomNomora' }}</title>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased min-h-screen flex flex-col" x-data="{ sidebarOpen: false }">

    <!-- Top Admin Header -->
    <header class="bg-white border-b border-gray-200 h-16 sticky top-0 z-40 flex items-center justify-between px-6 shadow-sm">
        <div class="flex items-center gap-4">
            <!-- Sidebar Hamburger (Mobile) -->
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <div class="flex items-center gap-2">
                <span class="font-display text-xl font-bold tracking-tight text-brand-accent">
                    NomNomora Admin
                </span>
                <span class="bg-brand-beige/50 text-brand-brown text-xs px-2.5 py-0.5 rounded-full font-semibold">Dashboard</span>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <span class="text-sm font-medium text-gray-600 hidden md:block">Halo, {{ Auth::user()->name }}</span>
            <div class="w-px h-6 bg-gray-200 hidden md:block"></div>
            <!-- Logout Button -->
            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2 rounded-xl text-sm font-semibold flex items-center gap-2 transition-colors cursor-pointer">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    Keluar
                </button>
            </form>
        </div>
    </header>

    <div class="flex flex-grow relative">
        <!-- Sidebar Navigation -->
        <!-- Desktop Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 hidden lg:block flex-shrink-0">
            <div class="p-6 flex flex-col gap-1.5">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-brand-accent text-white shadow-md' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    Ringkasan Dashboard
                </a>
                <a href="{{ route('admin.categories.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-brand-accent text-white shadow-md' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i data-lucide="folder" class="w-5 h-5"></i>
                    Kategori Menu
                </a>
                <a href="{{ route('admin.products.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.products.*') ? 'bg-brand-accent text-white shadow-md' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i data-lucide="salad" class="w-5 h-5"></i>
                    Produk Makanan
                </a>
                <a href="{{ route('admin.testimonials.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.testimonials.*') ? 'bg-brand-accent text-white shadow-md' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                    Testimonial
                </a>
                <a href="{{ route('admin.galleries.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.galleries.*') ? 'bg-brand-accent text-white shadow-md' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i data-lucide="image" class="w-5 h-5"></i>
                    Galeri Foto
                </a>
                <a href="{{ route('admin.settings.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.settings.index') ? 'bg-brand-accent text-white shadow-md' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    Pengaturan Website
                </a>
                <hr class="border-gray-100 my-4">
                <a href="{{ route('home') }}" target="_blank" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-500 hover:bg-gray-50 hover:text-gray-900">
                    <i data-lucide="external-link" class="w-5 h-5"></i>
                    Lihat Website Utama
                </a>
            </div>
        </aside>

        <!-- Mobile Sidebar Drawer -->
        <div x-show="sidebarOpen" 
             class="fixed inset-0 bg-gray-900/50 backdrop-blur-xs z-50 lg:hidden"
             x-transition:opacity
             @click="sidebarOpen = false"
             x-cloak>
            <aside class="w-64 bg-white h-full shadow-2xl flex flex-col p-6 gap-1.5" 
                   @click.stop
                   x-show="sidebarOpen"
                   x-transition:enter="transition ease-out duration-300 transform"
                   x-transition:enter-start="-translate-x-full"
                   x-transition:enter-end="translate-x-0"
                   x-transition:leave="transition ease-in duration-200 transform"
                   x-transition:leave-start="translate-x-0"
                   x-transition:leave-end="-translate-x-full">
                <div class="flex justify-between items-center mb-6">
                    <span class="font-display text-lg font-bold text-brand-brown">Menu Admin</span>
                    <button @click="sidebarOpen = false" class="text-gray-500 hover:text-gray-700">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>
                
                <a href="{{ route('admin.dashboard') }}" @click="sidebarOpen = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-brand-accent text-white' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.categories.index') }}" @click="sidebarOpen = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-brand-accent text-white' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i data-lucide="folder" class="w-5 h-5"></i>
                    Kategori Menu
                </a>
                <a href="{{ route('admin.products.index') }}" @click="sidebarOpen = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.products.*') ? 'bg-brand-accent text-white' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i data-lucide="salad" class="w-5 h-5"></i>
                    Produk Makanan
                </a>
                <a href="{{ route('admin.testimonials.index') }}" @click="sidebarOpen = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.testimonials.*') ? 'bg-brand-accent text-white' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                    Testimonial
                </a>
                <a href="{{ route('admin.galleries.index') }}" @click="sidebarOpen = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.galleries.*') ? 'bg-brand-accent text-white' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i data-lucide="image" class="w-5 h-5"></i>
                    Galeri Foto
                </a>
                <a href="{{ route('admin.settings.index') }}" @click="sidebarOpen = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.settings.index') ? 'bg-brand-accent text-white' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    Pengaturan Website
                </a>
                <hr class="border-gray-100 my-4">
                <a href="{{ route('home') }}" target="_blank" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-500 hover:bg-gray-50">
                    <i data-lucide="external-link" class="w-5 h-5"></i>
                    Lihat Website
                </a>
            </aside>
        </div>

        <!-- Main Dashboard View Content -->
        <main class="flex-grow p-6 lg:p-10 max-w-7xl mx-auto w-full">
            <!-- Toast Flash Messages -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                     class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl flex items-center justify-between shadow-sm transition-all duration-300">
                    <div class="flex items-center gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-green-500 hover:text-green-700 focus:outline-none">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                     class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl flex items-center justify-between shadow-sm transition-all duration-300">
                    <div class="flex items-center gap-3">
                        <i data-lucide="alert-circle" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                    <button @click="show = false" class="text-red-500 hover:text-red-700 focus:outline-none">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Lucide Icon Initialization -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
