@props(['type' => 'success', 'message'])

@php
    $colors = [
        'success' => [
            'bg' => 'bg-green-50',
            'border' => 'border-green-500',
            'text' => 'text-green-700',
            'icon_bg' => 'bg-green-100',
            'icon_color' => 'text-green-600',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>'
        ],
        'updated' => [
            'bg' => 'bg-yellow-50',
            'border' => 'border-yellow-400',
            'text' => 'text-yellow-700',
            'icon_bg' => 'bg-yellow-100',
            'icon_color' => 'text-yellow-600',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>'
        ],
        'deleted' => [
            'bg' => 'bg-orange-50',
            'border' => 'border-orange-500',
            'text' => 'text-orange-700',
            'icon_bg' => 'bg-orange-100',
            'icon_color' => 'text-orange-600',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>'
        ],
        'error' => [
            'bg' => 'bg-red-50',
            'border' => 'border-red-500',
            'text' => 'text-red-700',
            'icon_bg' => 'bg-red-100',
            'icon_color' => 'text-red-600',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
        ],
    ];

    $style = $colors[$type] ?? $colors['success'];
@endphp

<div x-data="{ show: true }" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform -translate-y-2"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform -translate-y-2"
     class="mb-8 {{ $style['bg'] }} border-l-4 {{ $style['border'] }} p-6 rounded-3xl relative shadow-sm group" 
     role="alert">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="p-2 {{ $style['icon_bg'] }} rounded-xl {{ $style['icon_color'] }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $style['icon'] !!}
                </svg>
            </div>
            <p class="font-bold {{ $style['text'] }}">{{ $message }}</p>
        </div>
        <button @click="show = false" class="{{ $style['text'] }} opacity-50 hover:opacity-100 transition-opacity">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>
