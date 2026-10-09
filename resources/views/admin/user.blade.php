
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $user->name }} — Administration FlowPay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">

    <div class="min-h-screen">

        <header class="border-b border-slate-800 bg-slate-900">
            <div class="mx-auto flex max-w-5xl items-center justify-between gap-4 px-4 py-5 sm:px-6">

                <div class="min-w-0">
                    <h1 class="text-xl font-bold">
                        Administration FlowPay
                    </h1>

                    <p class="mt-1 text-sm text-slate-400">
                        Détails de l'utilisateur
                    </p>
                </div>

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="group inline-flex shrink-0 items-center gap-2 rounded-lg border border-slate-700 bg-slate-800/70 px-4 py-2.5 text-sm font-medium text-slate-200 transition-all duration-200 ease-out hover:-translate-y-0.5 hover:border-blue-500 hover:bg-blue-500/10 hover:text-blue-400"
                >
                    <span class="transition-transform duration-200 group-hover:-translate-x-1">
                        ←
                    </span>

                    Retour
                </a>

            </div>
        </header>

        <main class="mx-auto w-full max-w-5xl px-4 py-6 sm:px-6 sm:py-8">

            <div class="w-full overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 p-4 shadow-xl sm:p-6">

                <div class="border-b border-slate-800 pb-6">
                    <h2 class="break-words text-2xl font-bold">
                        {{ $user->name }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-400">
                        Informations du compte
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6 py-6 sm:grid-cols-2">

                    <div class="min-w-0">
                        <p class="text-sm text-slate-400">
                            Nom
                        </p>

                        <p class="mt-2 break-words font-medium text-white">
                            {{ $user->name }}
                        </p>
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm text-slate-400">
                            E-mail
                        </p>

                        <p class="mt-2 break-all font-medium text-white">
                            {{ $user->email }}
                        </p>
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm text-slate-400">
                            Téléphone
                        </p>

                        <p class="mt-2 break-words font-medium text-white">
                            {{ $user->phone ?? '—' }}
                        </p>
                    </div>

                </div>

                <div class="border-t border-slate-800 pt-6">

                    <h3 class="text-lg font-semibold">
                        Code
                    </h3>

                    <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- Ancien code --}}
                        <div class="min-w-0">

                            <label
                                for="old_code"
                                class="mb-2 block text-sm font-medium text-slate-300"
                            >
                                Ancien code
                            </label>

                            <div class="flex w-full min-w-0 flex-col gap-2 sm:flex-row">

                                <input
                                    id="old_code"
                                    type="text"
                                    readonly
                                    value="{{ $oldCode ?? '' }}"
                                    class="min-w-0 w-full flex-1 rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none"
                                    placeholder="Ancien code"
                                >

                                <button
                                    type="button"
                                    onclick="copyCode('old_code', this)"
                                    class="w-full shrink-0 rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-sm font-medium text-slate-200 transition-all duration-200 hover:-translate-y-0.5 hover:border-blue-500 hover:bg-blue-500/10 hover:text-blue-400 sm:w-auto"
                                >
                                    Copier
                                </button>

                            </div>

                        </div>

                        {{-- Nouveau code --}}
                        <div class="min-w-0">

                            <label
                                for="new_code"
                                class="mb-2 block text-sm font-medium text-slate-300"
                            >
                                Nouveau code
                            </label>

                            <div class="flex w-full min-w-0 flex-col gap-2 sm:flex-row">

                                <input
                                    id="new_code"
                                    type="text"
                                    readonly
                                    value="{{ $newCode ?? '' }}"
                                    class="min-w-0 w-full flex-1 rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none"
                                    placeholder="Nouveau code"
                                >

                                <button
                                    type="button"
                                    onclick="copyCode('new_code', this)"
                                    class="w-full shrink-0 rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-sm font-medium text-slate-200 transition-all duration-200 hover:-translate-y-0.5 hover:border-blue-500 hover:bg-blue-500/10 hover:text-blue-400 sm:w-auto"
                                >
                                    Copier
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- NIVEAU DU CHARGEMENT --}}
<div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">

    <h2 class="text-base font-semibold text-slate-800">
        Niveau du chargement
    </h2>

    <p class="mt-1 text-sm text-slate-500">
        Déterminez le pourcentage auquel le prochain chargement TEST doit s'arrêter.
    </p>

    <form
        method="POST"
        action="{{ route('admin.users.loading-level.update', $user) }}"
        class="mt-4"
    >
        @csrf
        @method('PATCH')

        <div class="flex items-center gap-3">

            <input
                type="number"
                name="loading_level"
                min="1"
                max="99"
                value="{{ old('loading_level', $user->loading_level) }}"
                placeholder="Ex. 72"
                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
            >

            <span class="text-sm font-semibold text-slate-600">
                %
            </span>

            <button
                type="submit"
                class="shrink-0 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                Enregistrer
            </button>

        </div>

        @error('loading_level')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

        @if (session('loading_level_success'))
            <p class="mt-2 text-sm font-medium text-green-600">
                {{ session('loading_level_success') }}
            </p>
        @endif

    </form>

</div>

{{-- SOLDE DISPONIBLE --}}
<div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">

    <h2 class="text-base font-semibold text-slate-800">
        Solde disponible
    </h2>

    <p class="mt-1 text-sm text-slate-500">
        Définissez le solde disponible affiché sur le compte de cet utilisateur.
    </p>

    <form
        method="POST"
        action="{{ route('admin.users.balance.update', $user) }}"
        class="mt-4"
    >
        @csrf
        @method('PATCH')

        <div class="flex items-center gap-3">

            <input
                type="number"
                name="balance"
                min="0"
                step="0.01"
                value="{{ old('balance', $user->balance) }}"
                placeholder="Ex. 1250.00"
                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
            >

            <span class="text-sm font-semibold text-slate-600">
                €
            </span>

            <button
                type="submit"
                class="shrink-0 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                Enregistrer
            </button>

        </div>

        @error('balance')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

        @if (session('balance_success'))
            <p class="mt-2 text-sm font-medium text-green-600">
                {{ session('balance_success') }}
            </p>
        @endif

    </form>

</div>


{{-- NOTIFICATION DE VIREMENT --}}
<div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">

    <h2 class="text-base font-semibold text-slate-800">
        Notification de virement
    </h2>

    <p class="mt-1 text-sm text-slate-500">
        Définissez le montant affiché dans la notification de virement de cet utilisateur.
        Laissez vide pour utiliser automatiquement son solde disponible.
    </p>

    <form
        method="POST"
        action="{{ route('admin.users.received-amount.update', $user) }}"
        class="mt-4"
    >
        @csrf
        @method('PATCH')

        <div class="flex items-center gap-3">

            <input
                type="number"
                name="received_amount"
                min="0"
                step="0.01"
                value="{{ old('received_amount', $user->received_amount) }}"
                placeholder="Vide = utiliser le solde"
                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
            >

            <span class="text-sm font-semibold text-slate-600">
                €
            </span>

            <button
                type="submit"
                class="shrink-0 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                Enregistrer
            </button>

        </div>

        @error('received_amount')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

        @if (session('received_amount_success'))
            <p class="mt-2 text-sm font-medium text-green-600">
                {{ session('received_amount_success') }}
            </p>
        @endif

    </form>

</div>

            </div>

        </main>

    </div>

    <script>
        function copyCode(inputId, button) {
            const input = document.getElementById(inputId);

            if (!input || !input.value) {
                return;
            }

            navigator.clipboard.writeText(input.value).then(() => {
                const originalText = button.textContent;

                button.textContent = 'Copié ✓';

                setTimeout(() => {
                    button.textContent = originalText;
                }, 1500);
            });
        }
    </script>

</body>
</html>
