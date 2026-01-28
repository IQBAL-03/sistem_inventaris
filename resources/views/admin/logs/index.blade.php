<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-slate-800 leading-tight uppercase tracking-tighter">
                Sistem <span class="text-blue-600">Error Logs</span>
            </h2>
            <form action="{{ route('admin.logs.clear') }}" method="POST" onsubmit="return confirm('Hapus semua log?')">
                @csrf
                <button type="submit" class="px-6 py-2.5 bg-red-100 text-red-600 hover:bg-red-200 rounded-full font-bold text-xs uppercase tracking-widest transition-all">
                    Bersihkan Log
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-900 rounded-[2.5rem] shadow-2xl p-8 overflow-hidden border border-slate-800">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-3 h-3 rounded-full bg-red-500 animate-pulse"></div>
                    <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <span class="text-slate-500 font-mono text-xs ml-2 uppercase tracking-widest">laravel.log - Terakhir 100 baris</span>
                </div>
                
                <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800/50">
                    <pre class="font-mono text-sm text-slate-300 overflow-x-auto whitespace-pre-wrap leading-relaxed max-h-[600px] overflow-y-auto custom-scrollbar">
{{ $logs ?: 'Belum ada catatan aktivitas/error.' }}
                    </pre>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.1);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(51, 65, 85, 0.5);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(51, 65, 85, 0.8);
        }
    </style>
</x-app-layout>
