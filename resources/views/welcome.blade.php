<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Inventaris Lab') }}</title>
    <link rel="icon" href="{{ asset('logo.svg') }}" type="image/svg+xml">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-slate-800 bg-slate-50 selection:bg-blue-500 selection:text-white">

    <!-- Decorative Background Blobs -->
    <div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-blue-100/50 blur-3xl opacity-60 mix-blend-multiply animate-blob"></div>
        <div class="absolute top-[10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-indigo-100/50 blur-3xl opacity-60 mix-blend-multiply animation-delay-2000 animate-blob"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-[50%] h-[50%] rounded-full bg-purple-100/50 blur-3xl opacity-60 mix-blend-multiply animation-delay-4000 animate-blob"></div>
    </div>

    <div class="min-h-screen flex flex-col relative">

        <!-- Navigation -->
        <nav class="w-full bg-slate-50/80 backdrop-blur-lg border-b border-slate-200/60 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-5 md:px-12 w-full">
                <div class="flex items-center gap-2">
                    <x-application-logo class="w-8 h-8 text-blue-600 fill-current" />
                    <span class="font-bold text-xl tracking-tight text-slate-800">Inventaris<span class="text-blue-600">Lab</span></span>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors hidden sm:block">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-full bg-slate-900 text-white text-sm font-semibold hover:bg-slate-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    Daftar Sekarang
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 flex items-center justify-center px-4 w-full max-w-7xl mx-auto pb-24">
            <div class="w-full max-w-4xl mx-auto">
                
                <!-- Hero Section: Centered -->
                <div class="text-center space-y-10 animate-fade-in-up">
                    <div class="space-y-6">
                        <div class="mt-5 inline-flex items-center px-4 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-bold uppercase tracking-widest">
                            <span class="w-2 h-2 rounded-full bg-blue-500 mr-2 animate-pulse"></span>
                            Sistem Manajemen Inventaris
                        </div>
                        <h1 class="text-6xl lg:text-8xl font-black tracking-tight leading-[1.05] text-slate-900">
                            Kelola Barang <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Tanpa Ribet.</span>
                        </h1>
                        <p class="text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">
                            Platform modern untuk manajemen aset laboratorium sekolah. Pantau stok, ajukan peminjaman, dan kelola inventaris secara real-time. Efisiensi dimulai dari sini.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-5 justify-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-10 py-5 rounded-full bg-blue-600 text-white font-bold text-xl hover:bg-blue-700 transition shadow-blue-500/30 shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1.5 flex items-center justify-center gap-2 group">
                                Buka Dashboard
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-10 py-5 rounded-full bg-blue-600 text-white font-bold text-xl hover:bg-blue-700 transition shadow-blue-500/30 shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1.5 flex items-center justify-center gap-2 group">
                                Booking Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                            <a href="#features" class="px-10 py-5 rounded-full bg-white text-slate-700 border-2 border-slate-100 font-bold text-xl hover:bg-slate-50 transition shadow-sm hover:shadow-xl transform hover:-translate-y-1.5 flex items-center justify-center">
                                Pelajari Lebih Lanjut
                            </a>
                        @endauth
                    </div>
                    
                    <div class="pt-8 flex items-center justify-center gap-12 text-slate-400">
                         <div class="flex flex-col items-center gap-1">
                            <span class="text-4xl font-black text-slate-800">{{ $categoryCount ?? '3' }}</span>
                            <span class="text-xs font-bold uppercase tracking-widest opacity-60">Kategori Utama</span>
                         </div>
                         <div class="w-px h-12 bg-slate-200"></div>
                         <div class="flex flex-col items-center gap-1">
                            <span class="text-4xl font-black text-slate-800">{{ isset($itemCount) && $itemCount >= 1000 ? number_format($itemCount / 1000, 1) . 'k+' : ($itemCount ?? '100+') }}</span>
                            <span class="text-xs font-bold uppercase tracking-widest opacity-60">Aset Tersedia</span>
                         </div>
                         <div class="w-px h-12 bg-slate-200"></div>
                         <div class="flex flex-col items-center gap-1">
                            <span class="text-4xl font-black text-slate-800">24/7</span>
                            <span class="text-xs font-bold uppercase tracking-widest opacity-60">Akses Sistem</span>
                         </div>
                    </div>
                </div>

            </div>
        </main>
        
        <!-- Features Section -->
        <section id="features" class="py-24 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 md:px-12 relative z-10">
                <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight">
                        Fitur Unggulan untuk <span class="text-blue-600">Produktifitas</span> Anda
                    </h2>
                    <p class="text-lg text-slate-600">
                        Kami menyediakan berbagai fitur canggih yang dirancang khusus untuk mempermudah manajemen ruangan di organisasi Anda.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white/40 backdrop-blur-xl border border-white/50 p-8 rounded-3xl shadow-xl shadow-blue-500/5 hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-500 group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Real-time Booking</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">
                            Pesan ruangan secara instan dengan status ketersediaan yang selalu update setiap detik.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white/40 backdrop-blur-xl border border-white/50 p-8 rounded-3xl shadow-xl shadow-blue-500/5 hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-500 group">
                        <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Manajemen Mudah</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">
                            Dashboard admin yang intuitif untuk mengelola ruangan, pengguna, dan jadwal tanpa perlu pelatihan khusus.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white/40 backdrop-blur-xl border border-white/50 p-8 rounded-3xl shadow-xl shadow-blue-500/5 hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-500 group">
                        <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Keamanan Terjamin</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">
                            Sistem verifikasi dan otorisasi yang ketat memastikan ruangan hanya digunakan oleh pihak yang berwenang.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="py-12 text-center text-sm text-slate-400">
            &copy; {{ date('Y') }} {{ config('app.name') }}
        </footer>
    </div>
    
    <style>
        html {
            scroll-behavior: smooth;
        }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</body>
</html>
