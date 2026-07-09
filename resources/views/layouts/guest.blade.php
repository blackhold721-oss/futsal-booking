<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Futsal Booking') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Tailwind CDN for instant rendering without Vite -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            body {
                font-family: 'Outfit', sans-serif;
            }
            .glass-panel {
                background: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-900 relative">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-40 mix-blend-overlay" alt="Futsal Background">
            <div class="absolute inset-0 bg-gradient-to-tr from-emerald-900/80 via-teal-800/80 to-gray-900/90"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10 px-4">
            <div class="mb-8 text-center">
                <a href="/" class="flex flex-col items-center gap-3 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30 transform group-hover:scale-105 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-white tracking-tight drop-shadow-md">Futsal<span class="text-emerald-400">Arena</span></h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md p-8 glass-panel shadow-2xl overflow-hidden rounded-3xl transition-all duration-300">
                {{ $slot }}
            </div>
            
            <p class="mt-8 text-emerald-100/60 text-sm">© {{ date('Y') }} FutsalArena. All rights reserved.</p>
        </div>
    </body>
</html>
