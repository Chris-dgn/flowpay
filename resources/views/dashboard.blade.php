
<x-app-layout>
    <div class="min-h-[calc(100vh-65px)] bg-slate-50">
        <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">

            <!-- Greeting -->
            <div class="mb-6">
                <h1 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">
                    {{ __('messages.greeting', ['name' => Auth::user()->name]) }}
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    {{ __('messages.dashboard_description') }}
                </p>
            </div>



<!-- Notification -->
<div
    id="transfer-notification"
    class="mb-6 rounded-xl border border-slate-200 bg-white shadow-sm"
>
    <div class="flex items-start gap-4 px-5 py-4">

        <!-- Icône -->
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-600">
            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 19V5m0 0l-5 5m5-5l5 5"
                />
            </svg>
        </div>

        <!-- Contenu -->
        <div class="min-w-0 flex-1">

            <!-- Ligne supérieure -->
            <div class="flex items-center justify-between gap-4">

                <p class="text-sm font-semibold text-slate-900">
                    {{ __('messages.transfer_received') }}
                </p>

                <!-- Badge + fermeture -->
                <div class="flex shrink-0 items-center gap-2">

                    <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                        {{ __('messages.received') }}
                    </span>

                    <button
                        type="button"
                        id="close-transfer-notification"
                        class="flex h-7 w-7 items-center justify-center rounded-full text-slate-400 transition duration-200 hover:bg-slate-100 hover:text-slate-700"
                        aria-label="Fermer"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 6l12 12M18 6L6 18"
                            />
                        </svg>
                    </button>

                </div>
            </div>


            <!-- Montant -->
            @php
                $user = auth()->user();
                $receivedAmount = $user->received_amount;

                $notificationAmount = (
                    $receivedAmount === null || $receivedAmount === ''
                )
                    ? $user->balance
                    : $receivedAmount;
            @endphp

            <p class="mt-1 text-lg font-bold tracking-tight text-emerald-600">
                +{{ number_format(
                    (float) $notificationAmount,
                    2,
                    ',',
                    ' '
                ) }} €
            </p>


            <!-- Description -->
            <p class="mt-2 text-sm leading-5 text-slate-500">
                {{ __('messages.transfer_received_description') }}
            </p>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notification = document.getElementById('transfer-notification');
        const closeButton = document.getElementById('close-transfer-notification');

        if (!notification || !closeButton) {
            return;
        }

        closeButton.addEventListener('click', function () {
            notification.remove();
        });
    });
</script>




            <!-- Balance -->
            <section class="overflow-hidden bg-slate-950 px-6 py-6 text-white shadow-lg sm:px-8 sm:py-8">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-400">
                            {{ __('messages.available_balance') }}
                        </p>

                        <p class="mt-3 text-3xl font-semibold tracking-tight sm:text-4xl">
                            {{ number_format((float) Auth::user()->balance, 2, ',', ' ') }}
                            <span class="text-lg font-medium text-slate-400">€</span>
                        </p>
                    </div>

                    <button
                        type="button"
                        class="flex h-10 w-10 items-center justify-center border border-slate-700 text-slate-300 transition hover:bg-slate-800 hover:text-white"
                        aria-label="{{ __('messages.show_hide_balance') }}"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"/>
                            <circle cx="12" cy="12" r="2.5" stroke-width="1.8"/>
                        </svg>
                    </button>
                </div>

             
<div class="mt-6 border-t border-slate-800 pt-4">
    <p class="text-sm text-slate-400">
        {{ __('messages.manage_operations_simply') }}
    </p>
</div>

            </section>

            <!-- Quick actions -->
            <section class="mt-6">
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">

                    <!-- Transfer -->
                    <a
                        href="{{ route('transfers.create') }}"
                        class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md"
                    >
                        <div class="flex h-11 w-11 items-center justify-center bg-blue-600 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M5 12h14M13 6l6 6-6 6"/>
                            </svg>
                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-900">
                            {{ __('messages.transfer') }}
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            {{ __('messages.send_money') }}
                        </p>
                    </a>

                    <!-- My card -->
                    <a
                        href="{{ route('card.show') }}"
                        class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md"
                    >
                        <div class="flex h-11 w-11 items-center justify-center bg-slate-900 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="3" y="5" width="18" height="14" rx="1" stroke-width="1.8"/>
                                <path stroke-linecap="round" stroke-width="1.8" d="M3 10h18"/>
                            </svg>
                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-900">
                            {{ __('messages.my_card') }}
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            {{ __('messages.view_my_card') }}
                        </p>
                    </a>

                    <!-- Add -->
                    <a
                        href="{{ route('deposits.create') }}"
                        class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md"
                    >
                        <div class="flex h-11 w-11 items-center justify-center bg-emerald-600 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 3v18m9-9H3"/>
                            </svg>
                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-900">
                            {{ __('messages.add') }}
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            {{ __('messages.fund_account') }}
                        </p>
                    </a>

                    <!-- My account -->
                    <a
                        href="{{ route('profile.edit') }}"
                        class="group border border-slate-200 bg-white px-4 py-5 shadow-sm transition hover:border-blue-300 hover:shadow-md"
                    >
                        <div class="flex h-11 w-11 items-center justify-center bg-slate-100 text-slate-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="3" stroke-width="1.8"/>
                                <path stroke-linecap="round" stroke-width="1.8"
                                      d="M5 21a7 7 0 0114 0"/>
                            </svg>
                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-900">
                            {{ __('messages.my_account') }}
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            {{ __('messages.manage_profile') }}
                        </p>
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
                                {{ __('messages.your_card') }}
                            </p>

                            <h2 class="mt-1 text-lg font-semibold text-slate-900">
                                {{ __('messages.virtual_card') }}
                            </h2>
                        </div>

                        <span class="border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700">
                            {{ __('messages.active') }}
                        </span>
                    </div>

                    <!-- FlowPay Card -->
                    <div class="mt-5 flex min-h-[285px] min-w-0 flex-col overflow-hidden rounded-3xl bg-gradient-to-br from-blue-700 via-blue-600 to-cyan-500 p-5 text-white shadow-md">

                        <!-- Header -->
                        <div class="flex items-start justify-between">
                            <span class="text-sm font-semibold tracking-wide">
                                FlowPay
                            </span>

                            <span class="text-xs text-white/70">
                                {{ __('messages.virtual') }}
                            </span>
                        </div>

                        <!-- Card number -->
                        <div class="mt-8 overflow-hidden whitespace-nowrap text-base tracking-[0.15em]">
                            <span id="flowpay-card-number">
                                •••• •••• •••• ••••
                            </span>
                        </div>

                        <!-- Card information -->
                        <div class="mt-auto grid min-w-0 grid-cols-[minmax(0,1fr)_auto_auto] items-end gap-4">

                            <!-- Cardholder -->
                            <div class="min-w-0">
                                <p class="text-[10px] uppercase tracking-wide text-white/60">
                                    {{ __('messages.cardholder') }}
                                </p>

                                <p class="mt-1 truncate text-xs font-medium uppercase">
                                    {{ Auth::user()->name }}
                                </p>
                            </div>

                            <!-- Expiration -->
                            <div class="min-w-0">
                                <p class="text-[10px] uppercase tracking-wide text-white/60">
                                    {{ __('messages.expiration') }}
                                </p>

                                <p class="mt-1 whitespace-nowrap text-xs font-medium">
                                    <span id="flowpay-card-expiry">
                                        ••/••
                                    </span>
                                </p>
                            </div>

                            <!-- CVV -->
                            <div class="min-w-0 text-right">
                                <p class="text-[10px] uppercase tracking-wide text-white/60">
                                    CVV
                                </p>

                                <p class="mt-1 whitespace-nowrap text-xs font-medium">
                                    <span id="flowpay-card-cvv">
                                        •••
                                    </span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Manage card -->
                    <a
                        href="{{ route('card.show') }}"
                        class="mt-4 block border border-slate-200 px-4 py-3 text-center text-sm font-medium text-slate-700 transition hover:bg-slate-50"
                    >
                        {{ __('messages.manage_card') }}
                    </a>

                </section>

                    
<!-- Transactions -->
<section class="min-w-0 bg-white p-6 shadow-sm lg:col-span-7">

    <div class="flex items-center justify-between">

        <div>
            <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                {{ __('messages.activity') }}
            </p>

            <h2 class="mt-1 text-lg font-semibold text-slate-900">
                {{ __('messages.recent_transactions') }}
            </h2>
        </div>

        <a
            href="#"
            class="text-sm font-medium text-blue-600 hover:text-blue-700"
        >
            {{ __('messages.see_all') }}
        </a>

    </div>

    <div class="mt-5 divide-y divide-slate-100">

        <!-- Virement reçu -->
        <div class="flex items-center justify-between py-4 first:pt-0">

            <div class="flex min-w-0 items-center gap-3">

                <!-- Icône -->
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-600">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 19V5m0 0l-5 5m5-5l5 5"
                        />
                    </svg>
                </div>

                <!-- Informations -->
                <div class="min-w-0">
                    <p class="truncate text-sm font-medium text-slate-900">
                        {{ __('messages.transfer_received') }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        {{ __('messages.received') }}
                    </p>
                </div>

            </div>

            <!-- Solde réel -->
            <p class="ml-4 shrink-0 text-sm font-semibold text-emerald-600">
                +{{ number_format((float) auth()->user()->balance, 2, ',', ' ') }} €
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
                    const digits = card.number.replace(/\D/g, '');
                    const lastFour = digits.slice(-4);

                    if (lastFour.length === 4) {
                        number.textContent = `•••• •••• •••• ${lastFour}`;
                    }
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
