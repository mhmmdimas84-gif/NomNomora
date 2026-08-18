<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin - NomNomora</title>
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-brand-cream text-brand-brown min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white border border-brand-beige/30 shadow-xl rounded-3xl p-8 md:p-10 flex flex-col">
        <!-- Logo / Brand Title -->
        <div class="flex flex-col items-center text-center gap-2 mb-8">
            <span class="font-display text-4xl font-extrabold text-brand-accent">NomNomora</span>
            <p class="text-gray-500 font-medium text-sm">Masuk ke Portal Pengelola (Admin Dashboard)</p>
        </div>

        @if (session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="flex flex-col gap-5">
            @csrf

            <!-- Email Address -->
            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-sm font-bold text-brand-brown/80">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="border border-brand-beige rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/30 focus:border-brand-accent transition-all @error('email') border-red-500 @enderror"
                       placeholder="admin@nomnomora.com">
                @error('email')
                    <span class="text-xs text-red-500 font-medium mt-0.5">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="flex flex-col gap-1.5">
                <div class="flex justify-between items-center">
                    <label for="password" class="text-sm font-bold text-brand-brown/80">Kata Sandi</label>
                </div>
                <input type="password" id="password" name="password" required
                       class="border border-brand-beige rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent/30 focus:border-brand-accent transition-all @error('password') border-red-500 @enderror"
                       placeholder="••••••••">
                @error('password')
                    <span class="text-xs text-red-500 font-medium mt-0.5">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center gap-2 mt-1">
                <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded text-brand-accent focus:ring-brand-accent">
                <label for="remember" class="text-sm text-gray-500 font-medium select-none cursor-pointer">Ingat Perangkat Saya</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="bg-brand-brown hover:bg-brand-accent text-white font-bold py-3.5 px-4 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 mt-2 flex items-center justify-center gap-2 cursor-pointer">
                Masuk Sekarang
            </button>
        </form>

        <a href="{{ route('home') }}" class="text-center text-xs font-semibold text-brand-brown/60 hover:text-brand-accent transition-colors mt-6 block underline">
            Kembali ke Halaman Utama
        </a>
    </div>
</body>
</html>
