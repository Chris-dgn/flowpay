<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin — FlowPay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <div class="flex justify-center mb-5">
                    <x-application-logo class="h-14 w-auto text-blue-500" />
                </div>

                <h1 class="text-2xl font-bold">Administration FlowPay</h1>
                <p class="mt-2 text-sm text-slate-400">
                    Connectez-vous à votre espace administrateur
                </p>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl">
                <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-slate-300">
                            Adresse e-mail
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                            placeholder="admin@flowpay.test"
                        >

                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-slate-300">
                            Mot de passe
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                            placeholder="••••••••"
                        >

                        @error('password')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="flex items-center gap-3 text-sm text-slate-400">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="rounded border-slate-700 bg-slate-950 text-blue-600 focus:ring-blue-500"
                        >
                        Se souvenir de moi
                    </label>

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-blue-600 px-4 py-3 font-semibold text-white transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-slate-900"
                    >
                        Se connecter
                    </button>
                </form>
            </div>

            <p class="mt-6 text-center text-xs text-slate-500">
                Accès réservé aux administrateurs FlowPay.
            </p>
        </div>
    </div>
</body>
</html>