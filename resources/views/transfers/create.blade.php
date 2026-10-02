<x-app-layout>

    <div
        class="min-h-screen bg-slate-50"
       x-data="{
    loading: false,
    failed: false,
    progress: 0,

    beneficiary: '',
    account: '',
    amount: '',

            validateAndStartTransfer(event) {

                const form = event.target;

                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                this.startTransfer();
            },

            startTransfer() {

                if (this.loading) {
                    return;
                }

                this.loading = true;
                this.failed = false;
                this.progress = 0;

                const timer = setInterval(() => {

                    if (this.progress < 58) {
                        this.progress++;
                    } else {

                        clearInterval(timer);

                        setTimeout(() => {
                            this.loading = false;
                            this.failed = true;
                        }, 500);
                    }

              }, 180);
            },

            closeFailure() {
                this.failed = false;
                this.progress = 0;
            }
        }"
    >

        <div class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Retour --}}
            <div class="mb-7">
                <a
                    href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 rounded-xl px-2 py-2 text-sm font-medium text-slate-500 transition hover:bg-slate-100 hover:text-slate-900"
                >
                    <span class="text-xl leading-none">‹</span>
                    Retour
                </a>
            </div>

            {{-- EN-TÊTE --}}
            <div class="mb-8">

                <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Effectuer un transfert
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Envoyez de l'argent de manière simple et sécurisée.
                </p>

            </div>

            {{-- CONTENU --}}
            <div class="grid gap-6 lg:grid-cols-3 lg:items-start">

                {{-- FORMULAIRE --}}
                <div class="lg:col-span-2">

                    <form
                        id="transfer-form"
                        method="POST"
                        action="#"
                        @submit.prevent="validateAndStartTransfer($event)"
                        class="space-y-5"
                    >

                        @csrf

                        {{-- DESTINATAIRE --}}
                        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                        <span class="text-lg">+</span>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-semibold text-slate-900">
                                            Destinataire
                                        </h2>

                                        <p class="mt-0.5 text-xs text-slate-500">
                                            Informations du bénéficiaire
                                        </p>
                                    </div>

                                </div>

                            </div>

                            <div class="space-y-5 px-5 py-6 sm:px-6">

                                {{-- Nom --}}
                                <div>

                                    <label
                                        for="beneficiary"
                                        class="block text-sm font-medium text-slate-700"
                                    >
                                        Nom du bénéficiaire
                                    </label>
<input
    id="beneficiary"
    name="beneficiary"
    type="text"
    x-model="beneficiary"
    value="{{ old('beneficiary') }}"
    placeholder="Nom complet"
    autocomplete="off"
    required
    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
>
                                    @error('beneficiary')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                {{-- IBAN --}}
                                <div>

                                    <label
                                        for="account"
                                        class="block text-sm font-medium text-slate-700"
                                    >
                                        Numéro de compte ou IBAN
                                    </label>

                                    <input
                                        id="account"
                                        name="account"
                                        type="text"
                                        x-model="account"
                                        value="{{ old('account') }}"
                                        placeholder="FR76..."
                                        autocomplete="off"
                                        required
                                        class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                                    >

                                    @error('account')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>

                        {{-- DÉTAILS --}}
                        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                            <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                        €
                                    </div>

                                    <div>
                                        <h2 class="text-base font-semibold text-slate-900">
                                            Détails du transfert
                                        </h2>

                                        <p class="mt-0.5 text-xs text-slate-500">
                                            Montant et motif de l'opération
                                        </p>
                                    </div>

                                </div>

                            </div>

                            <div class="space-y-5 px-5 py-6 sm:px-6">

                                {{-- Montant --}}
                                <div>

                                    <label
                                        for="amount"
                                        class="block text-sm font-medium text-slate-700"
                                    >
                                        Montant
                                    </label>

                                    <div class="relative mt-2">

                                       <input
    id="amount"
    name="amount"
    type="number"
    x-model="amount"
    min="0.01"
    step="0.01"
    value="{{ old('amount') }}"
    placeholder="0,00"
    required
    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-4 pr-16 text-xl font-bold text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
>

                                        <span class="absolute inset-y-0 right-4 flex items-center text-sm font-semibold text-slate-400">
                                            EUR
                                        </span>

                                    </div>

                                    @error('amount')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                {{-- Motif --}}
                                <div>

                                    <label
                                        for="reason"
                                        class="block text-sm font-medium text-slate-700"
                                    >
                                        Motif du transfert
                                    </label>

                                    <textarea
                                        id="reason"
                                        name="reason"
                                        rows="3"
                                        maxlength="255"
                                        placeholder="Ex. Paiement, aide familiale, facture..."
                                        class="mt-2 block w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                                    >{{ old('reason') }}</textarea>

                                    @error('reason')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>

                        {{-- SÉCURITÉ MOBILE --}}
                        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5 lg:hidden">

                            <div class="flex gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                    ✓
                                </div>

                                <div>

                                    <p class="text-sm font-semibold text-blue-950">
                                        Transfert sécurisé
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-blue-700">
                                        Vérifiez attentivement les coordonnées du bénéficiaire.
                                    </p>

                                </div>

                            </div>

                        </section>

                        {{-- BOUTONS MOBILE --}}
                        <div class="flex flex-col-reverse gap-3 pt-1 lg:hidden">

                            <a
                                href="{{ route('dashboard') }}"
                                class="flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50 hover:text-slate-900"
                            >
                                Annuler
                            </a>

                            <button
                                type="submit"
                                :disabled="loading"
                                class="flex w-full items-center justify-center rounded-xl bg-blue-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:scale-[0.98] disabled:cursor-not-allowed disabled:opacity-60"
                            >

                                <span x-show="!loading">
                                    Transférer
                                </span>

                                <span
                                    x-show="loading"
                                    class="flex items-center gap-2"
                                >
                                    <svg
                                        class="h-4 w-4 animate-spin"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            class="opacity-25"
                                            cx="12"
                                            cy="12"
                                            r="9"
                                            stroke="currentColor"
                                            stroke-width="3"
                                        />

                                        <path
                                            class="opacity-90"
                                            fill="currentColor"
                                            d="M21 12a9 9 0 0 0-9-9v3a6 6 0 0 1 6 6h3z"
                                        />
                                    </svg>

                                    Traitement...
                                </span>

                            </button>

                        </div>

            {{-- CHARGEMENT --}}
<template x-teleport="body">

    <div
        x-show="loading"
        x-cloak
        class="fixed inset-0 z-[99999] flex items-center justify-center bg-slate-950/60 px-4 py-6 backdrop-blur-sm"
    >

        <div class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl">

            {{-- MESSAGE --}}
            <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

                <h2 class="text-lg font-bold text-slate-950">
                    Vérification du transfert
                </h2>

                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Vos informations sont en cours de vérification.
                    Veuillez patienter pendant le traitement de la simulation.
                </p>

                <div class="my-5 h-px bg-blue-100"></div>

                {{-- BÉNÉFICIAIRE --}}
                <div>
                    <p class="text-xs text-slate-500">
                        Nom du bénéficiaire
                    </p>

                    <p
                        x-text="beneficiary"
                        class="mt-1 text-sm font-semibold text-slate-900"
                    ></p>
                </div>

                {{-- COMPTE --}}
                <div class="mt-4">
                    <p class="text-xs text-slate-500">
                        Compte / IBAN
                    </p>

                    <p
                        x-text="account"
                        class="mt-1 break-all text-sm font-semibold text-slate-900"
                    ></p>
                </div>

                {{-- MONTANT --}}
                <div class="mt-4">
                    <p class="text-xs text-slate-500">
                        Montant du transfert
                    </p>

                    <p
                        x-text="Number(amount || 0).toLocaleString('fr-FR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) + ' €'"
                        class="mt-1 text-xl font-bold text-slate-950"
                    ></p>
                </div>

            </div>

            {{-- PROGRESSION --}}
            <div class="mt-7">

                <div class="mb-2 flex items-center justify-between">

                    <span class="text-xs font-medium text-slate-500">
                        Vérification en cours
                    </span>

                    <span
                        class="text-sm font-bold text-blue-600"
                        x-text="progress + '%'"
                    ></span>

                </div>

                <div class="relative h-4 w-full overflow-hidden rounded-full bg-slate-200">

                    <div
                        class="absolute left-0 top-0 h-full rounded-full bg-blue-600 transition-[width] duration-100 ease-linear"
                        :style="{ width: progress + '%' }"
                    ></div>

                </div>

            </div>

            <p class="mt-5 text-center text-xs leading-5 text-slate-500">
                Ne fermez pas cette fenêtre pendant la vérification.
            </p>

        </div>

    </div>

</template>

                        

                    </form>

                       {{-- ÉCHEC --}}
<template x-teleport="body">

    <div
        x-show="failed"
        x-cloak
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-950/70 px-4 py-6 backdrop-blur-sm"
    >

        <div class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl">

            {{-- BANDEAU ROUGE --}}
            <div class="relative bg-red-600 px-6 py-7 text-center text-white">

                {{-- Fermer en haut --}}
                <button
                    type="button"
                    @click="closeFailure()"
                    class="absolute right-4 top-4 flex h-9 w-9 items-center justify-center rounded-full text-white/80 transition hover:bg-white/10 hover:text-white"
                    aria-label="Fermer"
                >
                    <svg
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

                {{-- Icône --}}
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-white">

                    <svg
                        class="h-11 w-11 text-red-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </div>

                <h2 class="mt-5 text-2xl font-bold">
                    Transfert échoué
                </h2>

                <p class="mt-2 text-sm text-red-100">
                    La simulation du transfert s'est arrêtée à 58 %.
                </p>

            </div>

            {{-- INFORMATIONS --}}
            <div class="p-6">

                <div class="space-y-3 text-sm">

                    {{-- Bénéficiaire --}}
                    <div class="flex items-start justify-between gap-4">
                        <span class="text-slate-500">
                            Nom du bénéficiaire
                        </span>

                        <span
                            x-text="beneficiary"
                            class="text-right font-semibold text-slate-900"
                        ></span>
                    </div>

                    {{-- Compte --}}
                    <div class="flex items-start justify-between gap-4">
                        <span class="text-slate-500">
                            Compte / IBAN
                        </span>

                        <span
                            x-text="account"
                            class="max-w-[230px] break-all text-right font-semibold text-slate-900"
                        ></span>
                    </div>

                    {{-- Montant --}}
                    <div class="flex items-start justify-between gap-4">
                        <span class="text-slate-500">
                            Montant
                        </span>

                        <span
                            x-text="Number(amount || 0).toLocaleString('fr-FR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }) + ' €'"
                            class="text-right text-lg font-bold text-slate-950"
                        ></span>
                    </div>

                </div>

                {{-- MESSAGE D'ERREUR --}}
                <div class="mt-5 rounded-2xl border border-red-100 bg-red-50 p-4">

                    <div class="flex gap-3">

                        <div class="mt-0.5 shrink-0 text-red-600">
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v4m0 4h.01M10.29 3.86l-8.18 14a2 2 0 001.72 3h16.34a2 2 0 001.72-3l-8.18-14a2 2 0 00-3.42 0z"
                                />
                            </svg>
                        </div>

                        <div>

                            <p class="text-sm font-semibold text-red-800">
                                Échec du transfert
                            </p>

                            <p class="mt-1 text-sm leading-5 text-red-700">
                                La vérification de l'opération n'a pas abouti.
                                Aucun débit ni transfert réel n'a été effectué.
                            </p>

                        </div>

                    </div>

                </div>

                {{-- BOUTON --}}
                <button
                    type="button"
                    @click="closeFailure()"
                    class="mt-6 flex w-full items-center justify-center rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-900/10"
                >
                    Fermer
                </button>

            </div>

        </div>

    </div>

</template>

                </div>

                {{-- COLONNE DROITE --}}
                <aside class="lg:col-span-1">

                    <div class="space-y-4 lg:sticky lg:top-24">

                        {{-- SOLDE --}}
                        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                            <p class="text-xs font-semibold uppercase tracking-[0.14em] text-slate-400">
                                Votre solde
                            </p>

                            <div class="mt-3 flex items-end justify-between gap-4">

                                <div>

                                    <p class="text-2xl font-bold tracking-tight text-slate-950">
                                        1 250,00 €
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Solde disponible
                                    </p>

                                </div>

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                                    €
                                </div>

                            </div>

                        </section>

                        {{-- RÉSUMÉ --}}
                        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Montant
                                    </p>

                                    <p class="mt-1 text-2xl font-bold text-slate-950">
                                        0,00 €
                                    </p>

                                </div>

                                <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">
                                    EUR
                                </span>

                            </div>

                            <div class="my-5 h-px bg-slate-100"></div>

                            <div class="flex items-center justify-between">

                                <span class="text-sm text-slate-500">
                                    Frais
                                </span>

                                <span class="text-sm font-semibold text-slate-900">
                                    0,00 €
                                </span>

                            </div>

                            <div class="mt-4 flex items-center justify-between">

                                <span class="text-sm font-medium text-slate-700">
                                    Total
                                </span>

                                <span class="text-lg font-bold text-slate-950">
                                    0,00 €
                                </span>

                            </div>

                        </section>

                        {{-- SÉCURITÉ --}}
                        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

                            <div class="flex gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                    ✓
                                </div>

                                <div>

                                    <p class="text-sm font-semibold text-blue-950">
                                        Sécurité
                                    </p>

                                    <div class="mt-2 space-y-2 text-xs text-blue-700">

                                        <p>
                                            ✓ Connexion sécurisée
                                        </p>

                                        <p>
                                            ✓ Vérification avant transfert
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </section>

                        {{-- BOUTONS DESKTOP --}}
                        <div class="hidden space-y-3 lg:block">

                            <button
                                type="submit"
                                form="transfer-form"
                                :disabled="loading"
                                class="flex w-full items-center justify-center rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:scale-[0.98] disabled:cursor-not-allowed disabled:opacity-60"
                            >

                                <span x-show="!loading">
                                    Transférer
                                </span>

                                <span
                                    x-show="loading"
                                    class="flex items-center gap-2"
                                >

                                    <svg
                                        class="h-4 w-4 animate-spin"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            class="opacity-25"
                                            cx="12"
                                            cy="12"
                                            r="9"
                                            stroke="currentColor"
                                            stroke-width="3"
                                        />

                                        <path
                                            class="opacity-90"
                                            fill="currentColor"
                                            d="M21 12a9 9 0 0 0-9-9v3a6 6 0 0 1 6 6h3z"
                                        />
                                    </svg>

                                    Traitement...

                                </span>

                            </button>

                            <a
                                href="{{ route('dashboard') }}"
                                class="flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900"
                            >
                                Annuler
                            </a>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</x-app-layout>