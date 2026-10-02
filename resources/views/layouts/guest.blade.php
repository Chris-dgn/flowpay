<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FlowPay') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 font-sans antialiased">

    <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10">

        <!-- Décoration arrière -->
        <div class="absolute -left-32 -top-32 h-80 w-80 rounded-full bg-blue-600/20 blur-3xl"></div>
        <div class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-cyan-500/10 blur-3xl"></div>

        <div class="relative z-10 w-full max-w-md">

            <!-- Logo -->
            <div class="mb-8 flex flex-col items-center">
                <a href="/" class="group flex flex-col items-center">
                    <x-application-logo class="h-16 w-16 transition-transform duration-300 group-hover:scale-105" />

                    <span class="mt-4 text-2xl font-bold tracking-tight text-white">
                        Flow<span class="text-blue-400">Pay</span>
                    </span>
                </a>

                <div class="mt-2 h-1 w-8 rounded-sm bg-blue-500"></div>
            </div>

            <!-- Contenu -->
            <main class="rounded-xl border border-white/10 bg-white/[0.97] p-7 shadow-2xl shadow-black/30 sm:p-9">
                {{ $slot }}
            </main>

            <div class="mt-6 text-center">
                <p class="text-xs text-slate-500">
                    Connexion sécurisée · FlowPay
                </p>
            </div>

        </div>
    </div>

</body>
</html>
