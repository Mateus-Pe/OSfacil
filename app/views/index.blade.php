<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME', 'OSFacil') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ assets('img/favicon-32x32.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-100 to-gray-200 min-h-screen flex flex-col items-center justify-center p-6">
    <div class="w-full max-w-7xl space-y-6">
        <header class="w-full py-4 bg-gray-100 border-b border-gray-300 flex items-center justify-center">
            <img src="{{ assets('img/OSFacil-logo-nobg.png') }}" alt="OSFacil Logo" class="w-64 h-64 object-contain">
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="w-full mt-10 py-4 bg-gray-100 border-t border-gray-300 text-center text-gray-500 text-sm">
            {{ date('Y-m-d') }} © 2025 Sistema de OS. Todos os direitos reservados.
        </footer>
    </div>
</body>
</html>
