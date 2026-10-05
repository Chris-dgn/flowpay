
<x-app-layout>

    <div class="min-h-[calc(100vh-65px)] bg-slate-50">
        <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">

            <!-- En-tête -->
            <div class="mb-8">
                <h1 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">
                    {{ __('messages.account_page_title') }}
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    {{ __('messages.account_page_description') }}
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
                                    {{ __('messages.account_active') }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Informations personnelles -->
                <div class="px-6 py-6 sm:px-8">

                    <div class="mb-5">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            {{ __('messages.personal_information') }}
                        </p>

                        <h2 class="mt-1 text-lg font-semibold text-slate-900">
                            {{ __('messages.your_information') }}
                        </h2>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">

                        <!-- Nom -->
                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                {{ __('messages.full_name') }}
                            </p>

                            <p class="mt-2 text-sm font-medium text-slate-900">
                                {{ $user->name }}
                            </p>
                        </div>

                        <!-- Email -->
                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                {{ __('messages.email_address') }}
                            </p>

                            <p class="mt-2 break-all text-sm font-medium text-slate-900">
                                {{ $user->email }}
                            </p>
                        </div>

                        <!-- Statut -->
                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                {{ __('messages.status') }}
                            </p>

                            <p class="mt-2 text-sm font-medium text-emerald-600">
                                {{ __('messages.active') }}
                            </p>
                        </div>

                        <!-- Membre depuis -->
                        <div class="border border-slate-200 px-4 py-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                {{ __('messages.member_since') }}
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
                        {{ __('messages.security') }}
                    </p>

                    <h2 class="mt-1 text-lg font-semibold text-slate-900">
                        {{ __('messages.protect_account') }}
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        {{ __('messages.strong_password_description') }}
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
                        {{ __('messages.modification') }}
                    </p>

                    <h2 class="mt-1 text-lg font-semibold text-slate-900">
                        {{ __('messages.edit_information') }}
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
                            {{ __('messages.end_session') }}
                        </p>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ __('messages.logout_description') }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="border border-red-200 px-5 py-2.5 text-sm font-medium text-red-600 transition duration-200 hover:bg-red-50"
                        >
                            {{ __('messages.logout') }}
                        </button>
                    </form>

                </div>

            </section>

            <!-- Suppression du compte -->
            <section class="mt-6 border border-red-100 bg-red-50/40 shadow-sm">

                <div class="px-6 py-6 sm:px-8">

                    <p class="text-xs font-semibold uppercase tracking-wider text-red-500">
                        {{ __('messages.sensitive_area') }}
                    </p>

                    <h2 class="mt-1 text-lg font-semibold text-slate-900">
                        {{ __('messages.delete_account') }}
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600">
                        {{ __('messages.delete_account_description') }}
                    </p>

                    <div class="mt-5">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>

            </section>

        </div>
    </div>

</x-app-layout>