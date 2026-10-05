<x-app-layout>

<div
    class="min-h-screen bg-slate-50"
    x-data="{
        loading: false,
        failed: false,
        progress: 0,
        testCode: '',
        showVerification: false,
        loadingLevel: {{ $loadingLevel }},

        beneficiary: '',
        account: '',
        amount: '',
        reason: '',
        bankName: '',
        bicSwift: '',

        validateAndStartTransfer(event) {
            const form = event.target;

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            this.startTransfer();
        },

        async startTransfer() {

            if (this.loading) {
                return;
            }

            try {

                const levelResponse = await fetch('{{ route('transfers.loading-level') }}', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (!levelResponse.ok) {
                    throw new Error('Impossible de récupérer le niveau de chargement.');
                }

                const levelData = await levelResponse.json();

                this.loadingLevel = Number(levelData.loading_level) || 58;

            } catch (error) {

                console.error(error);

                this.loadingLevel = Number(this.loadingLevel) || 58;
            }

            this.loading = true;
            this.failed = false;
            this.progress = 0;

            const timer = setInterval(() => {

                if (this.progress < this.loadingLevel) {

                    this.progress++;

                } else {

                    clearInterval(timer);

                    setTimeout(async () => {

                        this.loading = false;

                        try {

                            const form = document.getElementById('transfer-form');
                            const formData = new FormData(form);

                            const response = await fetch(form.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            });

                            if (!response.ok) {
                                throw new Error('Erreur lors de la création de la simulation.');
                            }

                            const data = await response.json();

                            this.testCode = data.test_code;
                            this.failed = true;

                        } catch (error) {

                            console.error(error);

                            this.failed = true;
                        }

                    }, 500);
                }

            }, 180);
        },

        closeFailure() {
            this.failed = false;
            this.progress = 0;

            window.location.href = '{{ route('transfers.verification') }}';
        }
    }"
>

    <div class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 lg:px-8">

        <div class="mb-7">
            <a
                href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 rounded-xl px-2 py-2 text-sm font-medium text-slate-500 transition hover:bg-slate-100 hover:text-slate-900"
            >
                <span class="text-xl leading-none">‹</span>
                {{ __('messages.back') }}
            </a>
        </div>

        <div class="mb-8">

            <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                {{ __('messages.perform_transfer') }}
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                {{ __('messages.transfer_description') }}
            </p>

        </div>

        <div class="grid gap-6 lg:grid-cols-3 lg:items-start">

            <div class="lg:col-span-2">

                <form
                    id="transfer-form"
                    method="POST"
                    action="{{ route('transfers.store') }}"
                    @submit.prevent="validateAndStartTransfer($event)"
                    class="space-y-5"
                >

                    @csrf

                    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                    <span class="text-lg">+</span>
                                </div>

                                <div>
                                    <h2 class="text-base font-semibold text-slate-900">
                                        {{ __('messages.recipient') }}
                                    </h2>

                                    <p class="mt-0.5 text-xs text-slate-500">
                                        {{ __('messages.beneficiary_information') }}
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="space-y-5 px-5 py-6 sm:px-6">

                            <div>

                                <label
                                    for="beneficiary"
                                    class="block text-sm font-medium text-slate-700"
                                >
                                    {{ __('messages.beneficiary_name') }}
                                </label>

                                <input
                                    id="beneficiary"
                                    name="beneficiary"
                                    type="text"
                                    x-model="beneficiary"
                                    value="{{ old('beneficiary') }}"
                                    placeholder="{{ __('messages.full_name') }}"
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

                            <div>

                                <label
                                    for="account"
                                    class="block text-sm font-medium text-slate-700"
                                >
                                    {{ __('messages.account_or_iban') }}
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

                            <div>

                                <label
                                    for="bank_name"
                                    class="block text-sm font-medium text-slate-700"
                                >
                                    {{ __('messages.recipient_bank') }}
                                </label>

                                <input
                                    id="bank_name"
                                    name="bank_name"
                                    type="text"
                                    x-model="bankName"
                                    value="{{ old('bank_name') }}"
                                    placeholder="{{ __('messages.bank_name') }}"
                                    autocomplete="off"
                                    required
                                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                                >

                            </div>

                            <div>

                                <label
                                    for="bic_swift"
                                    class="block text-sm font-medium text-slate-700"
                                >
                                    {{ __('messages.bic_swift') }}
                                </label>

                                <input
                                    id="bic_swift"
                                    name="bic_swift"
                                    type="text"
                                    x-model="bicSwift"
                                    value="{{ old('bic_swift') }}"
                                    placeholder="Ex. ABCDFRPP"
                                    maxlength="11"
                                    autocomplete="off"
                                    required
                                    class="mt-2 block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm uppercase text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                                >

                            </div>

                        </div>

                    </section>

                    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-5 py-5 sm:px-6">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                    €
                                </div>

                                <div>
                                    <h2 class="text-base font-semibold text-slate-900">
                                        {{ __('messages.transfer_details') }}
                                    </h2>

                                    <p class="mt-0.5 text-xs text-slate-500">
                                        {{ __('messages.amount_and_reason') }}
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="space-y-5 px-5 py-6 sm:px-6">

                            <div>

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

                            <div>

                                <label
                                    for="reason"
                                    class="block text-sm font-medium text-slate-700"
                                >
                                    {{ __('messages.reason_for_transfer') }}
                                </label>

                                <textarea
                                    id="reason"
                                    name="reason"
                                    x-model="reason"
                                    rows="3"
                                    maxlength="255"
                                    placeholder="{{ __('messages.reason_placeholder') }}"
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

                    <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5 lg:hidden">

                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                ✓
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-blue-950">
                                    {{ __('messages.secure_transfer') }}
                                </p>

                                <p class="mt-1 text-xs leading-5 text-blue-700">
                                    {{ __('messages.verify_beneficiary_details') }}
                                </p>

                            </div>

                        </div>

                    </section>

                    <div class="flex flex-col-reverse gap-3 pt-1 lg:hidden">

                        <a
                            href="{{ route('dashboard') }}"
                            class="flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50 hover:text-slate-900"
                        >
                            {{ __('messages.cancel') }}
                        </a>

                        <button
                            type="submit"
                            :disabled="loading"
                            class="flex w-full items-center justify-center rounded-xl bg-blue-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:scale-[0.98] disabled:cursor-not-allowed disabled:opacity-60"
                        >

                            <span x-show="!loading">
                                {{ __('messages.transfer') }}
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

                                {{ __('messages.processing') }}

                            </span>

                        </button>

                    </div>

                    <template x-teleport="body">

                        <div
                            x-show="loading"
                            x-cloak
                            class="fixed inset-0 z-[99999] flex items-center justify-center bg-slate-950/60 px-4 py-6 backdrop-blur-sm"
                        >

                            <div class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl">

                                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

                                    <h2 class="text-lg font-bold text-slate-950">
                                        {{ __('messages.transfer_verification') }}
                                    </h2>

                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ __('messages.verification_message') }}
                                    </p>

                                    <div class="my-5 h-px bg-blue-100"></div>

                                    <div>
                                        <p class="text-xs text-slate-500">
                                            {{ __('messages.beneficiary_name') }}
                                        </p>

                                        <p
                                            x-text="beneficiary"
                                            class="mt-1 text-sm font-semibold text-slate-900"
                                        ></p>
                                    </div>

                                    <div class="mt-4">
                                        <p class="text-xs text-slate-500">
                                            {{ __('messages.account_or_iban') }}
                                        </p>

                                        <p
                                            x-text="account"
                                            class="mt-1 break-all text-sm font-semibold text-slate-900"
                                        ></p>
                                    </div>

                                    <div class="mt-4">
                                        <p class="text-xs text-slate-500">
                                            {{ __('messages.transfer_amount') }}
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

                                <div class="mt-7">

                                    <div class="mb-2 flex items-center justify-between">

                                        <span class="text-xs font-medium text-slate-500">
                                            {{ __('messages.verification_in_progress') }}
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
                                    {{ __('messages.do_not_close_window') }}
                                </p>

                            </div>

                        </div>

                    </template>

                </form>

                <template x-teleport="body">

                    <div
                        x-show="failed"
                        x-cloak
                        class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-950/70 px-4 py-6 backdrop-blur-sm"
                    >

                        <div class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl">

                            <div class="relative bg-red-600 px-6 py-7 text-center text-white">

                                <button
                                    type="button"
                                    @click="closeFailure()"
                                    class="absolute right-4 top-4 flex h-9 w-9 items-center justify-center rounded-full text-white/80 transition hover:bg-white/10 hover:text-white"
                                    aria-label="{{ __('messages.close') }}"
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
                                    {{ __('messages.transfer_failed') }}
                                </h2>

                                <p class="mt-2 text-sm text-red-100">
                                    {{ __('messages.transfer_stopped_at', ['percentage' => $loadingLevel]) }}
                                </p>

                            </div>

                            <div class="p-6">

                                <div class="space-y-3 text-sm">

                                    <div class="flex items-start justify-between gap-4">
                                        <span class="text-slate-500">
                                            {{ __('messages.beneficiary_name') }}
                                        </span>

                                        <span
                                            x-text="beneficiary"
                                            class="text-right font-semibold text-slate-900"
                                        ></span>
                                    </div>

                                    <div class="flex items-start justify-between gap-4">
                                        <span class="text-slate-500">
                                            {{ __('messages.account_or_iban') }}
                                        </span>

                                        <span
                                            x-text="account"
                                            class="max-w-[230px] break-all text-right font-semibold text-slate-900"
                                        ></span>
                                    </div>

                                    <div class="flex items-start justify-between gap-4">
                                        <span class="text-slate-500">
                                            {{ __('messages.amount') }}
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
                                                {{ __('messages.transfer_failed') }}
                                            </p>

                                            <p class="mt-1 text-sm leading-5 text-red-700">
                                                {{ __('messages.error_transfer_verification') }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <button
                                    type="button"
                                    @click="closeFailure()"
                                    class="mt-6 flex w-full items-center justify-center rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-900/10"
                                >
                                    {{ __('messages.close') }}
                                </button>

                            </div>

                        </div>

                    </div>

                </template>

            </div>

            <aside class="lg:col-span-1">

                <div class="space-y-4 lg:sticky lg:top-24">

                    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-slate-400">
                            {{ __('messages.your_balance') }}
                        </p>

                        <div class="mt-3 flex items-end justify-between gap-4">

                            <div>

                                <p class="text-2xl font-bold tracking-tight text-slate-950">
                                    {{ number_format((float) Auth::user()->balance, 2, ',', ' ') }}
                                    <span class="text-lg font-medium text-slate-400">€</span>
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    {{ __('messages.available_balance') }}
                                </p>

                            </div>

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                                €
                            </div>

                        </div>

                    </section>

                    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-slate-500">
                                    {{ __('messages.amount') }}
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
                                {{ __('messages.fees') }}
                            </span>

                            <span class="text-sm font-semibold text-slate-900">
                                0,00 €
                            </span>

                        </div>

                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-sm font-medium text-slate-700">
                                {{ __('messages.total') }}
                            </span>

                            <span class="text-lg font-bold text-slate-950">
                                0,00 €
                            </span>

                        </div>

                    </section>

                    <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

                        <div class="flex gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                ✓
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-blue-950">
                                    {{ __('messages.security') }}
                                </p>

                                <div class="mt-2 space-y-2 text-xs text-blue-700">

                                    <p>
                                        ✓ {{ __('messages.secure_connection') }}
                                    </p>

                                    <p>
                                        ✓ {{ __('messages.verification_before_transfer') }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </section>

                    <div class="hidden space-y-3 lg:block">

                        <button
                            type="submit"
                            form="transfer-form"
                            :disabled="loading"
                            class="flex w-full items-center justify-center rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 active:scale-[0.98] disabled:cursor-not-allowed disabled:opacity-60"
                        >

                            <span x-show="!loading">
                                {{ __('messages.transfer') }}
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

                                {{ __('messages.processing') }}

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
