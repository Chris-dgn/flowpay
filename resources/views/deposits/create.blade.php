<x-app-layout>

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- ================================================= --}}
        {{-- RETOUR --}}
        {{-- ================================================= --}}

        <div class="mb-7">
            <a
                href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 rounded-xl px-2 py-2 text-sm font-medium text-slate-500 transition hover:bg-slate-100 hover:text-slate-900"
            >
                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                {{ __('messages.back') }}
            </a>
        </div>


        {{-- ================================================= --}}
        {{-- EN-TÊTE --}}
        {{-- ================================================= --}}

        <div class="mb-8">

            <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                {{ __('messages.add_money') }}
            </h1>

            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                {{ __('messages.add_money_description') }}
            </p>

        </div>


        {{-- ================================================= --}}
        {{-- CONTENU --}}
        {{-- ================================================= --}}

        <div class="grid gap-6 lg:grid-cols-3 lg:items-start">


            {{-- ================================================= --}}
            {{-- COLONNE PRINCIPALE --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2">

                <form
                    id="deposit-form"
                    method="POST"
                    action="#"
                    class="space-y-5"
                >

                    @csrf


                    {{-- ================================================= --}}
                    {{-- MONTANT --}}
                    {{-- ================================================= --}}

                    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                    <span class="text-lg font-semibold">
                                        €
                                    </span>
                                </div>

                                <div>
                                    <h2 class="text-base font-semibold text-slate-900">
                                        {{ __('messages.amount_to_add') }}
                                    </h2>

                                    <p class="mt-0.5 text-xs text-slate-500">
                                        {{ __('messages.choose_amount_to_credit') }}
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="px-5 py-6 sm:px-6">

                            <label
                                for="amount"
                                class="block text-sm font-medium text-slate-700"
                            >
                                {{ __('messages.amount') }}
                            </label>


                            <div class="relative mt-2">

                                <input
                                    id="amount"
                                    name="amount"
                                    type="number"
                                    min="1"
                                    step="0.01"
                                    placeholder="0,00"
                                    required
                                    class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-4 pr-16 text-2xl font-bold tracking-tight text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                                >

                                <span class="absolute inset-y-0 right-4 flex items-center text-sm font-semibold text-slate-400">
                                    EUR
                                </span>

                            </div>


                            {{-- Raccourcis montant --}}
                            <div class="mt-6">

                                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.12em] text-slate-400">
                                    {{ __('messages.quick_amounts') }}
                                </p>

                                <div class="grid grid-cols-2 gap-3">

                                    <button
                                        type="button"
                                        onclick="document.getElementById('amount').value = '50'"
                                        class="flex min-h-[52px] items-center justify-center rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/10"
                                    >
                                        50 €
                                    </button>

                                    <button
                                        type="button"
                                        onclick="document.getElementById('amount').value = '100'"
                                        class="flex min-h-[52px] items-center justify-center rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/10"
                                    >
                                        100 €
                                    </button>

                                    <button
                                        type="button"
                                        onclick="document.getElementById('amount').value = '250'"
                                        class="flex min-h-[52px] items-center justify-center rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/10"
                                    >
                                        250 €
                                    </button>

                                    <button
                                        type="button"
                                        onclick="document.getElementById('amount').value = '500'"
                                        class="flex min-h-[52px] items-center justify-center rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/10"
                                    >
                                        500 €
                                    </button>

                                </div>

                            </div>

                        </div>

                    </section>


                    {{-- ================================================= --}}
                    {{-- MÉTHODE --}}
                    {{-- ================================================= --}}

                    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
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
                                            d="M3 10h18M5 10v8M9 10v8M15 10v8M19 10v8M2 18h20M12 3l9 5H3l9-5z"
                                        />
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="text-base font-semibold text-slate-900">
                                        {{ __('messages.funding_method') }}
                                    </h2>

                                    <p class="mt-0.5 text-xs text-slate-500">
                                        {{ __('messages.choose_funding_method') }}
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="space-y-3 p-5 sm:p-6">


                            {{-- CARTE --}}
                            <label class="group flex cursor-pointer items-center gap-4 rounded-2xl border border-blue-200 bg-blue-50 p-4 transition hover:border-blue-300">

                                <input
                                    type="radio"
                                    name="method"
                                    value="card"
                                    checked
                                    class="h-4 w-4 border-slate-300 text-blue-600 focus:ring-blue-500"
                                >


                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-blue-600 shadow-sm">

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
                                            rx="2"
                                            stroke-width="1.8"
                                        />

                                        <path
                                            stroke-width="1.8"
                                            d="M3 10h18"
                                        />
                                    </svg>

                                </div>


                                <div class="min-w-0 flex-1">

                                    <div class="flex flex-wrap items-center gap-2">

                                        <p class="text-sm font-semibold text-slate-900">
                                            {{ __('messages.bank_card') }}
                                        </p>

                                        <span class="rounded-md bg-blue-100 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-blue-700">
                                            {{ __('messages.fast') }}
                                        </span>

                                    </div>

                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ __('messages.secure_payment_provider') }}
                                    </p>

                                </div>

                            </label>


                            {{-- VIREMENT --}}
                            <label class="group flex cursor-pointer items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 transition hover:border-blue-200 hover:bg-slate-50">

                                <input
                                    type="radio"
                                    name="method"
                                    value="bank_transfer"
                                    class="h-4 w-4 border-slate-300 text-blue-600 focus:ring-blue-500"
                                >


                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-700">

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
                                            d="M3 10h18M5 10v8M9 10v8M15 10v8M19 10v8M2 18h20M12 3l9 5H3l9-5z"
                                        />
                                    </svg>

                                </div>


                                <div class="min-w-0 flex-1">

                                    <p class="text-sm font-semibold text-slate-900">
                                        {{ __('messages.bank_transfer') }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ __('messages.receive_bank_transfer') }}
                                    </p>

                                </div>

                            </label>

                        </div>

                    </section>


                    {{-- ================================================= --}}
                    {{-- NOTE MOBILE --}}
                    {{-- ================================================= --}}

                    <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5 lg:hidden">

                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                ✓
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-blue-950">
                                    {{ __('messages.secure_payment') }}
                                </p>

                                <p class="mt-1 text-xs leading-5 text-blue-700">
                                    {{ __('messages.sensitive_payment_info') }}
                                </p>

                            </div>

                        </div>

                    </section>


                    {{-- ACTIONS MOBILE --}}
                    <div class="flex flex-col-reverse gap-3 pt-1 sm:flex-row lg:hidden">

                        <a
                            href="{{ route('dashboard') }}"
                            class="flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50 hover:text-slate-900 sm:w-auto"
                        >
                            {{ __('messages.cancel') }}
                        </a>

                        <button
                            type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:scale-[0.98]"
                        >
                            {{ __('messages.continue') }}

                            <span aria-hidden="true">
                                →
                            </span>
                        </button>

                    </div>

                </form>

            </div>


            {{-- ================================================= --}}
            {{-- COLONNE DROITE --}}
            {{-- ================================================= --}}

            <aside class="lg:col-span-1">

                <div class="space-y-4 lg:sticky lg:top-24">


                    {{-- SOLDE --}}
                    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-slate-400">
                            {{ __('messages.current_balance') }}
                        </p>


                        <div class="mt-3 flex items-end justify-between gap-4">

                            <div>

                                <p class="text-2xl font-bold tracking-tight text-slate-950">
                                    {{ number_format((float) Auth::user()->balance, 2, ',', ' ') }}
                                    <span class="text-lg font-medium text-slate-400">€</span>
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    {{ __('messages.available_on_account') }}
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

                                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-slate-400">
                                    {{ __('messages.overview') }}
                                </p>

                                <p class="mt-2 text-sm text-slate-500">
                                    {{ __('messages.new_balance') }}
                                </p>

                            </div>

                            <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">
                                EUR
                            </span>

                        </div>


                        <div class="mt-4 rounded-xl bg-slate-50 p-4">

                            <p class="text-xs text-slate-500">
                                {{ __('messages.current_balance') }}
                            </p>

                            <p class="mt-1 text-base font-semibold text-slate-900">
                                {{ number_format((float) Auth::user()->balance, 2, ',', ' ') }}
                                <span class="text-lg font-medium text-slate-400">€</span>
                            </p>


                            <div class="my-3 flex items-center gap-3">

                                <div class="h-px flex-1 bg-slate-200"></div>

                                <span class="text-blue-600">
                                    +
                                </span>

                                <div class="h-px flex-1 bg-slate-200"></div>

                            </div>


                            <p class="text-xs text-slate-500">
                                {{ __('messages.amount_added') }}
                            </p>

                            <p class="mt-1 text-base font-semibold text-blue-600">
                                0,00 €
                            </p>


                            <div class="my-3 h-px bg-slate-200"></div>


                            <div class="flex items-center justify-between">

                                <span class="text-sm font-medium text-slate-700">
                                    {{ __('messages.new_balance') }}
                                </span>

                                <span class="text-lg font-bold text-slate-950">
                                    {{ number_format((float) Auth::user()->balance, 2, ',', ' ') }}
                                    <span class="text-lg font-medium text-slate-400">€</span>
                                </span>

                            </div>

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
                                    {{ __('messages.secure_payment') }}
                                </p>

                                <div class="mt-2 space-y-2 text-xs leading-5 text-blue-700">

                                    <p>
                                        ✓ {{ __('messages.secure_connection') }}
                                    </p>

                                    <p>
                                        ✓ {{ __('messages.sensitive_data_protected') }}
                                    </p>

                                    <p>
                                        ✓ {{ __('messages.verification_before_operation') }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </section>


                    {{-- ACTION DESKTOP --}}
                    <div class="hidden space-y-3 lg:block">

                        <button
                            type="submit"
                            form="deposit-form"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:scale-[0.98]"
                        >
                            {{ __('messages.continue') }}

                            <span aria-hidden="true">
                                →
                            </span>
                        </button>


                        <a
                            href="{{ route('dashboard') }}"
                            class="flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900"
                        >
                            {{ __('messages.cancel') }}
                        </a>

                    </div>

                </div>

            </aside>

        </div>

    </div>

</div>

</x-app-layout>
