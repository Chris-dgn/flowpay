<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            Bienvenue sur FlowPay
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Connectez-vous à votre espace sécurisé
        </p>
    </div>

    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label
                for="email"
                value="Adresse e-mail"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="email"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="vous@exemple.com"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between">
                <x-input-label
                    for="password"
                    value="Mot de passe"
                    class="text-sm font-semibold text-slate-700"
                />

                @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-xs font-semibold text-blue-600 hover:text-blue-700"
                    >
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>

            <x-text-input
                id="password"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500"
                >

                <span class="ms-2 text-sm text-slate-500">
                    Se souvenir de moi
                </span>
            </label>
        </div>

        <button
            type="submit"
            class="w-full rounded-lg bg-blue-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            Se connecter
        </button>
    </form>
</x-guest-layout>
