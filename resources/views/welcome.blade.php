<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,600,800" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
        </style>
    </head>
    <body class="antialiased bg-gray-50 text-gray-900 min-h-screen flex flex-col font-sans">
        
        <!-- Navigation -->
        <nav class="w-full py-4 px-4 sm:px-6 lg:px-8 bg-white border-b border-gray-200 sticky top-0 z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <x-application-logo class="w-9 h-9" />
                    <span class="text-xl font-black tracking-tight text-blue-600">Inventaris<span class="text-gray-900">Lab</span></span>
                </div>
                <div class="flex items-center space-x-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-bold text-gray-900 hover:text-blue-600 transition duration-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-bold text-gray-600 hover:text-blue-600 transition duration-300 text-sm">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="py-2.5 px-5 bg-gray-900 text-white rounded-full font-bold hover:bg-gray-800 hover:shadow-lg hover:-translate-y-0.5 transition duration-300 text-sm">Daftar Sekarang</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex-grow flex flex-col justify-center items-center text-center px-4 sm:px-6 lg:px-8 pt-20 pb-32">
            <div class="max-w-4xl mx-auto space-y-8">
                <!-- Badge -->
                <div class="inline-block bg-blue-100 border border-blue-200 px-6 py-2 rounded-full mb-4">
                    <span class="text-blue-700 font-bold text-xs uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        Sistem Manajemen Ruangan
                    </span>
                </div>
                
                <!-- Headline -->
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tight leading-[1.1] text-gray-900">
                    Kelola Ruangan <br>
                    <span class="text-blue-600">Tanpa Ribet.</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-lg md:text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">
                    Platform modern untuk booking ruangan rapat, aula, dan fasilitas Sekolah secara real-time. Efisiensi waktu Anda mulai dari sekarang.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-8">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="group w-full sm:w-auto px-8 py-4 bg-blue-600 text-white text-lg font-bold rounded-full hover:bg-blue-700 hover:shadow-blue-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                            Buka Dashboard
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="group w-full sm:w-auto px-8 py-4 bg-blue-600 text-white text-lg font-bold rounded-full hover:bg-blue-700 hover:shadow-blue-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                            Booking Sekarang
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                        <a href="#features" class="group w-full sm:w-auto px-8 py-4 bg-white text-gray-900 border border-gray-200 text-lg font-bold rounded-full hover:border-gray-400 hover:bg-gray-50 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                            Pelajari Lebih Lanjut
                            <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                        </a>
                    @endauth
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section id="features" class="pt-16 pb-8 bg-white relative scroll-mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-10">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight mb-3">
                        Fitur Unggulan untuk <br> <span class="text-blue-600">Produktifitas</span> Anda
                    </h2>
                    <p class="text-gray-500 text-base">
                        Kami menyediakan berbagai fitur canggih yang dirancang khusus untuk mempermudah manajemen ruangan di organisasi Anda.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Feature 1 -->
                    <div class="group p-6 rounded-[2rem] bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-[0_20px_40px_rgba(0,0,0,0.05)] hover:-translate-y-2 transition-all duration-500 cursor-default">
                        <div class="w-14 h-14 bg-blue-100/50 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">Real-time Booking</h3>
                        <p class="text-gray-500 leading-relaxed text-sm">
                            Pesan ruangan secara instan dengan status ketersediaan yang selalu update setiap detik.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group p-6 rounded-[2rem] bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-[0_20px_40px_rgba(0,0,0,0.05)] hover:-translate-y-2 transition-all duration-500 cursor-default">
                        <div class="w-14 h-14 bg-indigo-100/50 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">Manajemen Mudah</h3>
                        <p class="text-gray-500 leading-relaxed text-sm">
                            Dashboard admin yang intuitif untuk mengelola ruangan, pengguna, dan jadwal tanpa perlu pelatihan khusus.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group p-6 rounded-[2rem] bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-[0_20px_40px_rgba(0,0,0,0.05)] hover:-translate-y-2 transition-all duration-500 cursor-default">
                        <div class="w-14 h-14 bg-purple-100/50 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">Keamanan Terjamin</h3>
                        <p class="text-gray-500 leading-relaxed text-sm">
                            Sistem verifikasi dan otorisasi yang ketat memastikan ruangan hanya digunakan oleh pihak yang berwenang.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Footer (Merged Compact) -->
        <div class="w-full pb-16 bg-white">
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center pt-6 border-t border-gray-100 hover:border-gray-200 transition-colors">
                <div class="group cursor-default">
                    <h4 class="text-3xl font-black text-gray-900 group-hover:scale-110 transition-transform duration-300">3</h4>
                    <p class="text-blue-600 font-bold text-[10px] uppercase tracking-widest mt-1">Kategori Utama</p>
                </div>
                <div class="group cursor-default">
                    <h4 class="text-3xl font-black text-gray-900 group-hover:scale-110 transition-transform duration-300">100+</h4>
                    <p class="text-blue-600 font-bold text-[10px] uppercase tracking-widest mt-1">Aset Tersedia</p>
                </div>
                <div class="group cursor-default">
                    <h4 class="text-3xl font-black text-gray-900 group-hover:scale-110 transition-transform duration-300">24/7</h4>
                    <p class="text-blue-600 font-bold text-[10px] uppercase tracking-widest mt-1">Akses Sistem</p>
                </div>
            </div>
        </div>

        <footer class="bg-white border-t border-gray-200 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-blue-600 transition">Privacy Policy</a>
                    <a href="#" class="hover:text-blue-600 transition">Terms of Service</a>
                </div>
            </div>
        </footer>
    </body>
</html>
