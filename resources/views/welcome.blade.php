<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} - Inventory System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,600,800" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .hero-mesh {
                background-color: #f8fafc;
                background-image: 
                    radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                    radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                    radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
            }
        </style>
    </head>
    <body class="antialiased text-white min-h-screen hero-mesh overflow-hidden relative">
        <!-- Background Elements -->
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-600/30 rounded-full blur-[120px] animate-float"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-fuchsia-600/30 rounded-full blur-[120px] animate-float-delayed"></div>

        <nav class="relative z-10 flex justify-between items-center px-8 py-6 max-w-7xl mx-auto">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-white rounded-xl shadow-lg flex items-center justify-center p-2">
                    <svg class="w-full text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <span class="text-2xl font-black tracking-tighter uppercase whitespace-nowrap">Inventaris<span class="text-indigo-400">PPLG</span></span>
            </div>
            <div class="flex items-center space-x-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-gradient">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-medium hover:text-indigo-400 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-gradient">Get Started</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <main class="relative z-10 max-w-7xl mx-auto px-8 h-[calc(100vh-100px)] flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2 text-center lg:text-left space-y-8">
                <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full border border-white/20">
                    <span class="flex h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                    <span class="text-xs font-bold uppercase tracking-widest text-indigo-200">New Lab Assets Available</span>
                </div>
                <h1 class="text-6xl lg:text-8xl font-black leading-[1.1] tracking-tight">
                    Manage Assets <br> <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400">With Precision.</span>
                </h1>
                <p class="text-xl text-indigo-100/80 max-w-xl leading-relaxed">
                    The ultimate laboratory asset management system. Track, borrow, and manage your equipment with a sleek, automated platform.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('login') }}" class="btn-gradient text-lg px-10 py-4 w-full sm:w-auto text-center">Start Borrowing</a>
                    <a href="#" class="px-10 py-4 bg-white/5 backdrop-blur-sm border border-white/10 rounded-full font-bold hover:bg-white/10 transition w-full sm:w-auto text-center">Learn More</a>
                </div>
            </div>

            <div class="lg:w-1/2 mt-20 lg:mt-0 relative flex justify-center items-center">
                <!-- Floating Card 1 -->
                <div class="glass-card p-6 rounded-3xl w-72 absolute -top-10 -left-10 lg:left-20 animate-float">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-indigo-500/20 rounded-2xl text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Approved</p>
                            <p class="text-xs text-gray-500">MacBook Air M2</p>
                        </div>
                    </div>
                </div>

                <!-- Main Device Mockup -->
                <div class="glass-card w-[450px] h-[300px] rounded-[40px] p-4 rotate-3 transform shadow-2xl relative overflow-hidden">
                    <div class="w-full h-full bg-slate-900 rounded-[30px] overflow-hidden p-6 space-y-4">
                        <div class="flex justify-between items-center border-b border-white/5 pb-4">
                            <div class="w-20 h-4 bg-white/10 rounded"></div>
                            <div class="flex space-x-2">
                                <div class="w-4 h-4 bg-red-400 rounded-full"></div>
                                <div class="w-4 h-4 bg-yellow-400 rounded-full"></div>
                                <div class="w-4 h-4 bg-green-400 rounded-full"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="h-24 bg-indigo-500/20 rounded-2xl"></div>
                            <div class="h-24 bg-purple-500/20 rounded-2xl"></div>
                            <div class="col-span-2 h-20 bg-pink-500/20 rounded-2xl"></div>
                        </div>
                    </div>
                </div>

                <!-- Floating Card 2 -->
                <div class="glass-card p-6 rounded-3xl w-72 absolute -bottom-10 -right-10 lg:right-10 animate-float-delayed">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-fuchsia-500/20 rounded-2xl text-fuchsia-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Pending</p>
                            <p class="text-xs text-gray-500">PC Gaming ROG</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Stats Footer -->
        <div class="absolute bottom-8 left-0 w-full px-8 hidden lg:block">
            <div class="max-w-7xl mx-auto flex space-x-20 text-indigo-200/50 uppercase tracking-[0.3em] text-[10px] font-black">
                <span>/ 500+ Assets Tracked</span>
                <span>/ 100% Secure Lending</span>
                <span>/ Real-time Stock Sync</span>
            </div>
        </div>
    </body>
</html>
