<x-app-layout>
    <div class="min-h-[calc(100vh-65px)] bg-slate-50">
        <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">

            <!-- Greeting -->
            <div class="mb-6">
                <h1 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">
                    Bonjour, {{ Auth::user()->name }} 👋
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Gérez votre argent simplement et en toute sécurité.
                </p>
            </div>

            <!-- Notification -->
            <div class="mb-6 flex items-start gap-4 border border-blue-100 bg-blue-50 px-4 py-4">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center bg-blue-600 text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.5-1.5A2 2 0 0118 14V11a6 6 0 00-12 0v3a2 2 0 01-.5 1.5L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9"/>
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-semibold text-slate-900">Bienvenue sur FlowPay</p>
                    <p class="mt-1 text-sm leading-5 text-slate-600">
                        Votre espace de paiement est prêt. Découvrez votre solde,
                        votre carte et vos transferts depuis votre tableau de bord.
                    </p>
                </div>
            </div>

            <!-- Balance -->
            <section class="overflow-hidden bg-slate-950 px-6 py-6 text-white shadow-lg sm:px-8 sm:py-8">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-400">Solde disponible</p>
                        <p class="mt-3 text-3xl font-semibold tracking-tight sm:text-4xl">
                            1 250,00 <span class="text-lg font-medium text-slate-400">€</span>
                        </p>
                    </div>

                    <button type="button"
                            class="flex h-10 w-10 items-center justify-center border border-slate-700 text-slate-300 transition hover:bg-slate-800 hover:text-white"
                            aria-label="Afficher ou masquer le solde">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"/>
                            <circle cx="12" cy="12" r="2.5" stroke-width="1.8"/>
                        </svg>
                    </button>
                </div>

                <div class="mt-6 flex items-center justify-between border-t border-slate-800 pt-4">
                    <span class="text-sm text-slate-400">Évolution ce mois-ci</span>
                    <span class="text-sm font-medium text-emerald-400">+125,00 €</span>
                </div>
            </section>

            <!-- Quick actions -->
            <section class="mt-6">
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">

                    <a href="{{ route('transfers.create') }}"
                       class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md">
                        <div class="flex h-11 w-11 items-center justify-center bg-blue-600 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M5 12h14M13 6l6 6-6 6"/>
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-slate-900">Transférer</p>
                        <p class="mt-1 text-xs text-slate-500">Envoyer de l'argent</p>
                    </a>

                    <a href="{{ route('card.show') }}"
                       class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md">
                        <div class="flex h-11 w-11 items-center justify-center bg-slate-900 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="3" y="5" width="18" height="14" rx="1" stroke-width="1.8"/>
                                <path stroke-linecap="round" stroke-width="1.8" d="M3 10h18"/>
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-slate-900">Ma carte</p>
                        <p class="mt-1 text-xs text-slate-500">Voir ma carte</p>
                    </a>

                    <a href="{{ route('deposits.create') }}"
                       class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md">
                        <div class="flex h-11 w-11 items-center justify-center bg-emerald-600 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 3v18m9-9H3"/>
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-slate-900">Ajouter</p>
                        <p class="mt-1 text-xs text-slate-500">Alimenter le compte</p>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md">
                        <div class="flex h-11 w-11 items-center justify-center bg-slate-100 text-slate-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="3" stroke-width="1.8"/>
                                <path stroke-linecap="round" stroke-width="1.8"
                                      d="M5 21a7 7 0 0114 0"/>
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-slate-900">Mon compte</p>
                        <p class="mt-1 text-xs text-slate-500">Gérer mon profil</p>
                    </a>

                </div>
            </section>

          <!-- Lower content -->
<div class="mt-6 grid min-w-0 grid-cols-1 gap-6 lg:grid-cols-12">

    <!-- Card preview -->
    <section class="min-w-0 bg-white p-6 shadow-sm lg:col-span-5">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Votre carte
                </p>

                <h2 class="mt-1 text-lg font-semibold text-slate-900">
                    Carte virtuelle
                </h2>
            </div>

            <span class="border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700">
                Active
            </span>
        </div>


        <!-- Carte FlowPay -->
        <div class="mt-5 flex min-h-[285px] min-w-0 flex-col overflow-hidden rounded-3xl bg-gradient-to-br from-blue-700 via-blue-600 to-cyan-500 p-5 text-white shadow-md">

            <!-- En-tête -->
            <div class="flex items-start justify-between">
                <span class="text-sm font-semibold tracking-wide">
                    FlowPay
                </span>

                <span class="text-xs text-white/70">
                    VIRTUELLE
                </span>
            </div>


            <!-- Numéro -->
            <div class="mt-8 overflow-hidden whitespace-nowrap text-base tracking-[0.15em]">
                <span id="flowpay-card-number">•••• •••• •••• ••••</span>
            </div>


            <!-- Informations carte -->
            <div class="mt-auto grid min-w-0 grid-cols-[minmax(0,1fr)_auto_auto] items-end gap-4">

                <!-- Titulaire -->
                <div class="min-w-0">

                    <p class="text-[10px] uppercase tracking-wide text-white/60">
                        TITULAIRE
                    </p>

                    <p class="mt-1 truncate text-xs font-medium uppercase">
                        {{ Auth::user()->name }}
                    </p>

                </div>


                <!-- Expiration -->
                <div class="min-w-0">

                    <p class="text-[10px] uppercase tracking-wide text-white/60">
                        EXPIRATION
                    </p>

                    <p class="mt-1 whitespace-nowrap text-xs font-medium">
                        <span id="flowpay-card-expiry">••/••</span>
                    </p>

                </div>


                <!-- CVV -->
                <div class="min-w-0 text-right">

                    <p class="text-[10px] uppercase tracking-wide text-white/60">
                        CVV
                    </p>

                    <p class="mt-1 whitespace-nowrap text-xs font-medium">
                        <span id="flowpay-card-cvv">•••</span>
                    </p>

                </div>

            </div>

        </div>


        <!-- Gérer la carte -->
        <a href="{{ route('card.show') }}"
           class="mt-4 block border border-slate-200 px-4 py-3 text-center text-sm font-medium text-slate-700 transition hover:bg-slate-50">
            Gérer ma carte
        </a>

    </section>


    <!-- Transactions -->
    <section class="min-w-0 bg-white p-6 shadow-sm lg:col-span-7">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Activité
                </p>

                <h2 class="mt-1 text-lg font-semibold text-slate-900">
                    Transactions récentes
                </h2>
            </div>

            <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                Tout voir
            </a>

        </div>


        <div class="mt-5 divide-y divide-slate-100">

            <!-- Transaction 1 -->
            <div class="flex items-center justify-between py-4 first:pt-0">

                <div class="flex min-w-0 items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center bg-emerald-50 text-emerald-600">
                        ↑
                    </div>

                    <div class="min-w-0">
                        <p class="truncate text-sm font-medium text-slate-900">
                            Alimentation du compte
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Aujourd'hui · 10:42
                        </p>
                    </div>

                </div>

                <p class="ml-4 shrink-0 text-sm font-semibold text-emerald-600">
                    +500,00 €
                </p>

            </div>


            <!-- Transaction 2 -->
            <div class="flex items-center justify-between py-4">

                <div class="flex min-w-0 items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center bg-red-50 text-red-600">
                        ↓
                    </div>

                    <div class="min-w-0">
                        <p class="truncate text-sm font-medium text-slate-900">
                            Transfert
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Hier · 16:20
                        </p>
                    </div>

                </div>

                <p class="ml-4 shrink-0 text-sm font-semibold text-red-600">
                    -25,00 €
                </p>

            </div>


            <!-- Transaction 3 -->
            <div class="flex items-center justify-between py-4 pb-0">

                <div class="flex min-w-0 items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center bg-emerald-50 text-emerald-600">
                        ↑
                    </div>

                    <div class="min-w-0">
                        <p class="truncate text-sm font-medium text-slate-900">
                            Virement reçu
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            18 sept. · 09:15
                        </p>
                    </div>

                </div>

                <p class="ml-4 shrink-0 text-sm font-semibold text-emerald-600">
                    +50,00 €
                </p>

            </div>

        </div>

    </section>

</div>

            <!-- Mobile bottom navigation -->
            <div class="h-20 lg:hidden"></div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const storedCard = sessionStorage.getItem('flowpay_demo_card');

        if (!storedCard) {
            return;
        }

        try {
            const card = JSON.parse(storedCard);

            const number = document.getElementById('flowpay-card-number');
            const expiry = document.getElementById('flowpay-card-expiry');
            const cvv = document.getElementById('flowpay-card-cvv');

            if (number && card.number) {
                number.textContent = card.number;
            }

            if (expiry && card.expiry) {
                expiry.textContent = card.expiry;
            }

            if (cvv && card.cvv) {
                cvv.textContent = card.cvv;
            }
        } catch (error) {
            sessionStorage.removeItem('flowpay_demo_card');
        }
    });
</script>

</x-app-layout>
