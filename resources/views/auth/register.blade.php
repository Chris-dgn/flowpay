<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            Créer votre compte
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Rejoignez FlowPay et gérez vos paiements simplement
        </p>
    </div>

  <form id="flowpay-register-form" method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

        <!-- Nom complet -->
        <div>
            <x-input-label
                for="name"
                value="Nom complet"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="name"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Votre nom complet"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
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
                autocomplete="email"
                placeholder="vous@exemple.com"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Téléphone -->
        <div>
            <x-input-label
                for="phone"
                value="Numéro de téléphone"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="phone"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="tel"
                name="phone"
                :value="old('phone')"
                required
                autocomplete="tel"
                placeholder="+229 01 00 00 00 00"
            />

            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Langue -->
        <div>
            <x-input-label
                for="language"
                value="Langue"
                class="text-sm font-semibold text-slate-700"
            />

            <select
                id="language"
                name="language"
                required
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 text-slate-700 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
            >
                <option value="">Sélectionnez votre langue</option>
                <option value="fr" @selected(old('language') === 'fr')>
                    Français
                </option>
                <option value="en" @selected(old('language') === 'en')>
                    English
                </option>
            </select>

            <x-input-error :messages="$errors->get('language')" class="mt-2" />
        </div>

        <!-- Banque -->
        <div class="sm:col-span-2">
            <x-input-label
                for="bank_name"
                value="Nom de votre banque"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="bank_name"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="text"
                name="bank_name"
                :value="old('bank_name')"
                required
                autocomplete="organization"
                placeholder="Nom de votre banque"
            />

            <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
        </div>

        </div>

        <!-- Carte de démonstration -->
        <div class="border-t border-slate-100 pt-4">
            <div class="mb-3">
                <h2 class="text-base font-bold text-slate-900">
                    Carte de démonstration
                </h2>

                <p class="mt-1 text-xs text-slate-500">
                    Utilisez uniquement des données fictives ou de test.
                    Ces informations ne seront pas enregistrées.
                </p>
            </div>

            <!-- Numéro de carte -->
            <div>
                <x-input-label
                    for="card_number"
                    value="Numéro de carte"
                    class="text-sm font-semibold text-slate-700"
                />

                <x-text-input
                    id="card_number"
                    class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 font-mono tracking-wider focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                    type="text"
                    name="card_number"
                    inputmode="numeric"
                    maxlength="19"
                    required
                    autocomplete="off"
                    placeholder="0000 0000 0000 0000"
                />

                <x-input-error :messages="$errors->get('card_number')" class="mt-2" />
            </div>

            <div class="mt-3 grid grid-cols-2 gap-3">
                <!-- Expiration -->
                <div>
                    <x-input-label
                        for="card_expiry"
                        value="Expiration"
                        class="text-sm font-semibold text-slate-700"
                    />

                    <x-text-input
                        id="card_expiry"
                        class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 font-mono tracking-wider focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                        type="text"
                        name="card_expiry"
                        maxlength="5"
                        required
                        autocomplete="off"
                        placeholder="MM/AA"
                    />

                    <x-input-error :messages="$errors->get('card_expiry')" class="mt-2" />
                </div>

                <!-- CVV -->
                <div>
                    <x-input-label
                        for="card_cvv"
                        value="CVV"
                        class="text-sm font-semibold text-slate-700"
                    />

                    <x-text-input
                        id="card_cvv"
                        class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 font-mono tracking-wider focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                        type="password"
                        name="card_cvv"
                        inputmode="numeric"
                        maxlength="4"
                        required
                        autocomplete="off"
                        placeholder="•••"
                    />

                    <x-input-error :messages="$errors->get('card_cvv')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

        <!-- Mot de passe -->
        <div>
            <x-input-label
                for="password"
                value="Mot de passe"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="password"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="••••••••"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation -->
        <div>
            <x-input-label
                for="password_confirmation"
                value="Confirmer le mot de passe"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="password_confirmation"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="••••••••"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        </div>

        <!-- Action -->
        <div class="pt-2">
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Créer mon compte
            </button>
        </div>

        <!-- Connexion -->
        <div class="border-t border-slate-100 pt-5 text-center">
            <span class="text-sm text-slate-500">
                Vous avez déjà un compte ?
            </span>

            <a
                href="{{ route('login') }}"
                class="ms-1 text-sm font-semibold text-blue-600 hover:text-blue-700"
            >
                Se connecter
            </a>
        </div>
    <script>
        document.getElementById('flowpay-register-form')?.addEventListener('submit', function () {
            const number = document.getElementById('card_number')?.value.trim();
            const expiry = document.getElementById('card_expiry')?.value.trim();
            const cvv = document.getElementById('card_cvv')?.value.trim();

            sessionStorage.setItem('flowpay_demo_card', JSON.stringify({
                number: number,
                expiry: expiry,
                cvv: cvv
            }));
        });
    </script>

    </form>
</x-guest-layout>