<x-app-layout>

    <div class="min-h-[calc(100vh-65px)] bg-slate-50">
        <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">

            <!-- En-tête -->
            <div class="mb-8">

                <h1 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">
                    Mon compte
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Consultez et gérez vos informations personnelles et la sécurité de votre compte.
                </p>
            </div>

            <!-- Profil -->
            <section class="overflow-hidden border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-6 sm:px-8">
                    <div class="flex items-center gap-4">

                        <div class="flex h-16 w-16 shrink-0 items-center justify-center border border-slate-200 text-slate-600">
                            <svg
                                class="h-9 w-9"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                aria-hidden="true"
                            >
                                <circle cx="12" cy="8" r="3.5" stroke-width="1.6"/>
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.6"
                                    d="M5 20a7 7 0 0 1 14 0"
                                />
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">
                                {{ $user->name }}
                            </h2>

                         

                            <div class="mt-2 flex items-center gap-2">
                                <span class="h-2 w-2 bg-emerald-500"></span>
                                <span class="text-xs font-medium text-emerald-700">
                                    Compte actif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations personnelles -->
                <div class="px-6 py-6 sm:px-8">

                    <div class="mb-5">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Informations personnelles
                        </p>

                        <h2 class="mt-1 text-lg font-semibold text-slate-900">
                            Vos informations
                        </h2>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">

                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Nom complet
                            </p>

                            <p class="mt-2 text-sm font-medium text-slate-900">
                                {{ $user->name }}
                            </p>
                        </div>

                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Adresse email
                            </p>

                            <p class="mt-2 break-all text-sm font-medium text-slate-900">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Statut
                            </p>

                        

                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                Membre depuis
                            </p>

                            <p class="mt-2 text-sm font-medium text-slate-900">
                                {{ $user->created_at?->format('d/m/Y') }}
                            </p>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Sécurité -->
            <section class="mt-6 border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-6 sm:px-8">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Sécurité
                    </p>

                    <h2 class="mt-1 text-lg font-semibold text-slate-900">
                        Protéger votre compte
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Utilisez un mot de passe fort et différent de vos autres comptes.
                    </p>
                </div>

                <div class="px-6 py-6 sm:px-8">
                    @include('profile.partials.update-password-form')
                </div>

            </section>

            <!-- Modifier les informations -->
            <section class="mt-6 border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-6 sm:px-8">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Modification
                    </p>

                    <h2 class="mt-1 text-lg font-semibold text-slate-900">
                        Modifier mes informations
                    </h2>
                </div>

                <div class="px-6 py-6 sm:px-8">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </section>

            <!-- Déconnexion -->
            <section class="mt-6 border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-col gap-4 px-6 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-8">

                    <div>
                        <p class="text-sm font-semibold text-slate-900">
                            Terminer votre session
                        </p>

                        <p class="mt-1 text-sm text-slate-500">
                            Déconnectez-vous de FlowPay sur cet appareil.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="border border-red-200 px-5 py-2.5 text-sm font-medium text-red-600 transition duration-200 hover:bg-red-50"
                        >
                            Se déconnecter
                        </button>
                    </form>

                </div>
            </section>

            <!-- Suppression du compte -->
            <section class="mt-6 border border-red-100 bg-red-50/40 shadow-sm">

                <div class="px-6 py-6 sm:px-8">
                    <p class="text-xs font-semibold uppercase tracking-wider text-red-500">
                        Zone sensible
                    </p>

                    <h2 class="mt-1 text-lg font-semibold text-slate-900">
                        Supprimer mon compte
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600">
                        La suppression du compte est une action définitive.
                        Votre mot de passe sera demandé avant la suppression.
                    </p>

                    <div class="mt-5">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </section>

        </div>
    </div>

</x-app-layout>
