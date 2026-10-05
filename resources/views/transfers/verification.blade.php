<x-app-layout>

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto w-full max-w-md px-4 py-6 sm:py-10">

        {{-- RÉCAPITULATIF DU TRANSFERT --}}
        <div class="rounded-xl border border-slate-200 bg-blue-50 p-5">

            <div class="space-y-3 text-sm text-slate-700">

                <div class="flex items-start justify-between gap-4">
                    <span class="font-medium text-slate-500">
                        {{ __('messages.bic_swift') }}
                    </span>

                    <span class="text-right font-semibold text-slate-900">
                        {{ $transfer->bic_swift }}
                    </span>
                </div>

                <div class="flex items-start justify-between gap-4">
                    <span class="font-medium text-slate-500">
                        {{ __('messages.bank') }}
                    </span>

                    <span class="text-right font-semibold text-slate-900">
                        {{ $transfer->bank_name }}
                    </span>
                </div>

                <div class="flex items-start justify-between gap-4">
                    <span class="font-medium text-slate-500">
                        {{ __('messages.beneficiary') }}
                    </span>

                    <span class="text-right font-semibold text-slate-900">
                        {{ $transfer->beneficiary }}
                    </span>
                </div>

                <div class="flex items-start justify-between gap-4">
                    <span class="font-medium text-slate-500">
                        {{ __('messages.reason') }}
                    </span>

                    <span class="text-right font-semibold text-slate-900">
                        {{ $transfer->reason }}
                    </span>
                </div>

            </div>

        </div>


        {{-- VÉRIFICATION --}}
        <div class="mt-8">

            <div class="flex items-center gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white">

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
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z"
                        />
                    </svg>

                </div>

                <h1 class="text-xl font-semibold text-slate-800">
                    {{ __('messages.flowpay_verification') }}
                </h1>

            </div>


            <p class="mt-6 text-sm leading-6 text-slate-600">
                {{ __('messages.enter_verification_code') }}
            </p>


            {{-- CHAMP CODE + VÉRIFICATION --}}
            <form
                method="POST"
                action="{{ route('transfers.verify') }}"
                class="mt-6"
                x-data="{
                    code: '',
                    loading: false,
                    error: '',

                    async verifyCode() {

                        this.error = '';

                        if (this.code.length !== 5) {
                            this.error = '{{ __('messages.test_code_length_error') }}';
                            return;
                        }

                        this.loading = true;

                        try {

                            const response = await fetch('{{ route('transfers.verify') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                                body: JSON.stringify({
                                    test_code: this.code,
                                }),
                            });

                            const data = await response.json();

                            if (!response.ok) {
                                this.error = data.message ?? '{{ __('messages.invalid_test_code') }}';
                                return;
                            }

                            window.location.href = data.redirect;

                        } catch (error) {

                            this.error = '{{ __('messages.verification_error') }}';

                        } finally {

                            this.loading = false;

                        }
                    }
                }"
                @submit.prevent="verifyCode()"
            >

                <label
                    for="test_code"
                    class="sr-only"
                >
                    {{ __('messages.flowpay_test_code') }}
                </label>

                <input
                    id="test_code"
                    name="test_code"
                    type="text"
                    inputmode="numeric"
                    maxlength="5"
                    autocomplete="off"
                    placeholder="{{ __('messages.enter_test_code') }}"
                    x-model="code"
                    class="block w-full rounded-xl border border-slate-300 bg-white px-5 py-5 text-base text-slate-900 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
                >

                <p
                    x-show="error"
                    x-text="error"
                    class="mt-3 text-sm font-medium text-red-600"
                ></p>

                <button
                    type="submit"
                    :disabled="loading"
                    class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-4 text-base font-semibold text-white shadow-sm transition hover:bg-blue-700 active:scale-[0.99] disabled:cursor-not-allowed disabled:opacity-60"
                >
                    <span x-show="!loading">
                        {{ __('messages.verify') }}
                    </span>

                    <span x-show="loading">
                        {{ __('messages.verifying') }}
                    </span>

                    <span
                        x-show="!loading"
                        class="text-xl leading-none"
                    >
                        →
                    </span>
                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>
