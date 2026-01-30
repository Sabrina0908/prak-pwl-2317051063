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

        <main class="flex-1">
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
