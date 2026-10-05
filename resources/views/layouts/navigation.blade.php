
<nav x-data="{ open: false }" class="sticky top-0 z-40 border-b border-slate-200 bg-white">

    <!-- ========================================================= -->
    <!-- DESKTOP -->
    <!-- ========================================================= -->

    <div class="hidden lg:block">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex h-16 items-center justify-between">

                <!-- Logo FlowPay à gauche -->
                <a
                    href="{{ route('dashboard') }}"
                    class="shrink-0"
                    aria-label="FlowPay"
                >
                    <span class="text-[22px] font-extrabold tracking-[-0.04em] text-slate-950">
                        Flow<span class="text-blue-600">Pay</span>
                    </span>
                </a>

                <!-- Navigation principale -->
                <div class="flex items-center gap-1">

                    <!-- Accueil -->
                    <a
                        href="{{ route('dashboard') }}"
                        class="rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-blue-600"
                    >
                        {{ __('messages.home') }}
                    </a>

                    <!-- Ma carte -->
                    <a
                        href="{{ route('card.show') }}"
                        class="rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-blue-600"
                    >
                        {{ __('messages.my_card') }}
                    </a>

                    <!-- Transfert -->
                    <a
                        href="{{ route('transfers.create') }}"
                        class="rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-blue-600"
                    >
                        {{ __('messages.transfer') }}
                    </a>

                    <!-- Ajouter -->
                    <a
                        href="{{ route('deposits.create') }}"
                        class="rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-blue-600"
                    >
                        {{ __('messages.add') }}
                    </a>

                </div>

                <!-- Profil à droite -->
                <a
                    href="{{ route('profile.edit') }}"
                    class="group flex items-center gap-3 rounded-xl px-2 py-1.5 transition hover:bg-slate-50"
                    aria-label="{{ __('messages.my_account') }}"
                >

                    <!-- Icône profil -->
                    <div class="flex h-10 w-10 items-center justify-center text-slate-600 transition group-hover:text-blue-600">
                        <svg
                            class="h-7 w-7"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <circle
                                cx="12"
                                cy="8"
                                r="3.5"
                                stroke-width="1.7"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 20a7 7 0 0 1 14 0"
                            />
                        </svg>
                    </div>

                    <!-- Nom -->
                    <div>
                        <p class="text-sm font-semibold text-slate-900">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-slate-500">
                            {{ __('messages.my_account') }}
                        </p>
                    </div>

                </a>

            </div>
        </div>
    </div>


    <!-- ========================================================= -->
    <!-- MOBILE -->
    <!-- ========================================================= -->

    <div class="lg:hidden">

        <div class="mx-auto max-w-6xl px-4 sm:px-6">
            <div class="relative flex h-16 items-center justify-between">

                <!-- Profil à gauche -->
                <a
                    href="{{ route('profile.edit') }}"
                    class="group flex items-center"
                    aria-label="{{ __('messages.my_account') }}"
                >

                    <div class="flex h-10 w-10 items-center justify-center text-slate-700 transition-colors duration-200 group-hover:text-blue-600">
                        <svg
                            class="h-7 w-7"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <circle
                                cx="12"
                                cy="8"
                                r="3.5"
                                stroke-width="1.7"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 20a7 7 0 0 1 14 0"
                            />
                        </svg>
                    </div>

                    <div class="ml-2 hidden sm:block">
                        <p class="text-sm font-medium text-slate-900">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-slate-500">
                            {{ __('messages.my_account') }}
                        </p>
                    </div>

                </a>


                <!-- Logo centré -->
                <a
                    href="{{ route('dashboard') }}"
                    class="absolute left-1/2 -translate-x-1/2"
                    aria-label="FlowPay"
                >
                    <span class="text-[22px] font-extrabold tracking-[-0.04em] text-slate-950">
                        Flow<span class="text-blue-600">Pay</span>
                    </span>
                </a>


                <!-- Hamburger -->
                <button
                    @click="open = !open"
                    type="button"
                    class="ml-auto flex h-10 w-10 items-center justify-center text-slate-700 transition-all duration-300 hover:bg-slate-50 hover:text-blue-600"
                    aria-label="{{ __('messages.open_menu') }}"
                    :aria-expanded="open"
                >

                    <svg
                        class="h-6 w-6 transition-transform duration-300 ease-out"
                        :class="{ 'rotate-90': open }"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <!-- Hamburger -->
                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <!-- Croix -->
                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>
        </div>


        <!-- ===================================================== -->
        <!-- PANNEAU MOBILE -->
        <!-- ===================================================== -->

        <div
            x-show="open"
            x-cloak
            @click.outside="open = false"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="absolute left-0 right-0 border-t border-slate-100 bg-white shadow-[0_12px_30px_rgba(15,23,42,0.08)]"
        >

            <div class="mx-auto max-w-6xl px-4 py-5 sm:px-6">

                <!-- En-tête -->
                <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h2 class="text-base font-semibold text-slate-900">
                            {{ __('messages.main_menu') }}
                        </h2>
                    </div>

                    <span class="text-xs text-slate-400">
                        {{ __('messages.your_space') }}
                    </span>
                </div>


                <!-- Navigation principale -->
                <div class="grid gap-1 sm:grid-cols-2">

                    <!-- Accueil -->
                    <a
                        href="{{ route('dashboard') }}"
                        @click="open = false"
                        class="group flex items-center gap-4 border-l-2 border-blue-600 bg-blue-50/60 px-4 py-3.5 transition-all duration-200 hover:bg-blue-50"
                    >
                        <span class="flex h-10 w-10 items-center justify-center bg-white text-blue-600 shadow-sm">
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M3 10.5L12 3l9 7.5M5.5 9v11h13V9M9 20v-6h6v6"
                                />
                            </svg>
                        </span>

                        <span class="flex-1">
                            <span class="block text-sm font-semibold text-slate-900">
                                {{ __('messages.home') }}
                            </span>

                            <span class="mt-0.5 block text-xs text-slate-500">
                                {{ __('messages.dashboard_description_short') }}
                            </span>
                        </span>

                        <span class="text-slate-300 transition-transform duration-200 group-hover:translate-x-1 group-hover:text-blue-600">
                            →
                        </span>
                    </a>


                    <!-- Solde -->
                    <a
                        href="#"
                        @click="open = false"
                        class="group flex items-center gap-4 border-l-2 border-transparent px-4 py-3.5 transition-all duration-200 hover:border-blue-300 hover:bg-slate-50"
                    >
                        <span class="flex h-10 w-10 items-center justify-center bg-slate-100 text-slate-700 transition-colors group-hover:bg-blue-50 group-hover:text-blue-600">
                            <span class="text-lg font-semibold">
                                €
                            </span>
                        </span>

                        <span class="flex-1">
                            <span class="block text-sm font-semibold text-slate-900">
                                {{ __('messages.my_balance') }}
                            </span>

                            <span class="mt-0.5 block text-xs text-slate-500">
                                {{ __('messages.check_balance') }}
                            </span>
                        </span>

                        <span class="text-slate-300 transition-transform duration-200 group-hover:translate-x-1 group-hover:text-blue-600">
                            →
                        </span>
                    </a>


                    <!-- Carte -->
                    <a
                        href="{{ route('card.show') }}"
                        @click="open = false"
                        class="group flex items-center gap-4 border-l-2 border-transparent px-4 py-3.5 transition-all duration-200 hover:border-blue-300 hover:bg-slate-50"
                    >
                        <span class="flex h-10 w-10 items-center justify-center bg-slate-100 text-slate-700 transition-colors group-hover:bg-blue-50 group-hover:text-blue-600">
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <rect
                                    x="3"
                                    y="5"
                                    width="18"
                                    height="14"
                                    rx="1.5"
                                    stroke-width="1.8"
                                />

                                <path
                                    stroke-width="1.8"
                                    d="M3 10h18"
                                />
                            </svg>
                        </span>

                        <span class="flex-1">
                            <span class="block text-sm font-semibold text-slate-900">
                                {{ __('messages.my_card') }}
                            </span>

                            <span class="mt-0.5 block text-xs text-slate-500">
                                {{ __('messages.view_my_card') }}
                            </span>
                        </span>

                        <span class="text-slate-300 transition-transform duration-200 group-hover:translate-x-1 group-hover:text-blue-600">
                            →
                        </span>
                    </a>


                    <!-- Transfert -->
                    <a
                        href="{{ route('transfers.create') }}"
                        @click="open = false"
                        class="group flex items-center gap-4 border-l-2 border-transparent px-4 py-3.5 transition-all duration-200 hover:border-blue-300 hover:bg-slate-50"
                    >
                        <span class="flex h-10 w-10 items-center justify-center bg-slate-100 text-slate-700 transition-colors group-hover:bg-blue-50 group-hover:text-blue-600">
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M4 12h15M13 6l6 6-6 6"
                                />
                            </svg>
                        </span>

                        <span class="flex-1">
                            <span class="block text-sm font-semibold text-slate-900">
                                {{ __('messages.transfer') }}
                            </span>

                            <span class="mt-0.5 block text-xs text-slate-500">
                                {{ __('messages.send_money') }}
                            </span>
                        </span>

                        <span class="text-slate-300 transition-transform duration-200 group-hover:translate-x-1 group-hover:text-blue-600">
                            →
                        </span>
                    </a>


                    <!-- Ajouter -->
                    <a
                        href="{{ route('deposits.create') }}"
                        @click="open = false"
                        class="group flex items-center gap-4 border-l-2 border-transparent px-4 py-3.5 transition-all duration-200 hover:border-blue-300 hover:bg-slate-50"
                    >
                        <span class="flex h-10 w-10 items-center justify-center bg-slate-100 text-emerald-600 transition-colors group-hover:bg-emerald-50">
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 3v18M3 12h18"
                                />
                            </svg>
                        </span>

                        <span class="flex-1">
                            <span class="block text-sm font-semibold text-slate-900">
                                {{ __('messages.add') }}
                            </span>

                            <span class="mt-0.5 block text-xs text-slate-500">
                                {{ __('messages.fund_account_short') }}
                            </span>
                        </span>

                        <span class="text-slate-300 transition-transform duration-200 group-hover:translate-x-1 group-hover:text-emerald-600">
                            →
                        </span>
                    </a>

                </div>


                <!-- Compte -->
                <div class="my-4 border-t border-slate-100"></div>

                <a
                    href="{{ route('profile.edit') }}"
                    @click="open = false"
                    class="group flex items-center gap-4 px-4 py-3.5 transition-all duration-200 hover:bg-slate-50"
                >

                    <span class="flex h-10 w-10 items-center justify-center bg-slate-100 text-slate-600 transition-colors group-hover:bg-blue-50 group-hover:text-blue-600">
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                cx="12"
                                cy="8"
                                r="3"
                                stroke-width="1.8"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-width="1.8"
                                d="M5 20a7 7 0 0114 0"
                            />
                        </svg>
                    </span>

                    <span>
                        <span class="block text-sm font-semibold text-slate-900">
                            {{ __('messages.my_account') }}
                        </span>

                        <span class="mt-0.5 block text-xs text-slate-500">
                            {{ __('messages.account_security') }}
                        </span>
                    </span>

                </a>


                <!-- Déconnexion -->
                <div class="mt-4 border-t border-slate-100 pt-4">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="group flex w-full items-center gap-4 px-4 py-3 text-left transition-all duration-200 hover:bg-red-50"
                        >

                            <span class="flex h-10 w-10 items-center justify-center bg-red-50 text-red-600 transition-colors group-hover:bg-red-100">
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M10 17l5-5-5-5M15 12H3M21 5v14a1 1 0 01-1 1h-6"
                                    />
                                </svg>
                            </span>

                            <span>
                                <span class="block text-sm font-semibold text-red-600">
                                    {{ __('messages.logout') }}
                                </span>

                                <span class="mt-0.5 block text-xs text-red-400">
                                    {{ __('messages.close_session') }}
                                </span>
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</nav>

