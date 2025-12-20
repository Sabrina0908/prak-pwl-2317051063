<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <title>{{ $title ?? 'App' }}</title>
    </head>
    <body class="flex flex-col min-h-screen">
        @include('partials.navbar')

        <!-- Alerts -->
        <div class="container mx-auto px-4 mt-6">
            @if (session('success'))
                <div id="flash-message" class="alert flex items-start space-x-3 p-4 rounded-lg bg-green-50 border border-green-200 text-green-800">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold">Sukses</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                    <button onclick="dismissFlash()" class="ml-4 text-green-600 hover:opacity-80">✕</button>
                </div>
            @endif

            @if (session('error'))
                <div id="flash-message" class="alert flex items-start space-x-3 p-4 rounded-lg bg-red-50 border border-red-200 text-red-800">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold">Error</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                    <button onclick="dismissFlash()" class="ml-4 text-red-600 hover:opacity-80">✕</button>
                </div>
            @endif
        </div>

        <main class="flex-1">
            @yield('content')
        </main>

        @include('partials.footer')
        <script>
            function dismissFlash(){
                const el = document.getElementById('flash-message');
                if(el) el.remove();
            }

            // Auto dismiss after 4 seconds
            window.addEventListener('DOMContentLoaded', function(){
                setTimeout(function(){
                    dismissFlash();
                }, 4000);
            });
        </script>
    </body>
</html>
