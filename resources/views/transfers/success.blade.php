<x-app-layout>

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto flex min-h-screen w-full max-w-md items-center px-4 py-10">

        <div class="w-full rounded-2xl border border-green-200 bg-white p-6 text-center shadow-sm">

            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100">

                <svg
                    class="h-8 w-8 text-green-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

            </div>

            <h1 class="mt-5 text-2xl font-bold text-slate-800">
                {{ __('messages.verification_success') }}
            </h1>

            <p class="mt-3 text-sm leading-6 text-slate-600">
                {{ __('messages.flowpay_code_verified') }}
            </p>

            <p class="mt-2 text-sm font-medium text-slate-700">
                {{ __('messages.retry_payment_message') }}
            </p>

            <a
                href="{{ route('transfers.create') }}"
                class="mt-6 inline-flex w-full items-center justify-center rounded-xl bg-blue-600 px-5 py-4 text-base font-semibold text-white transition hover:bg-blue-700"
            >
                {{ __('messages.retry_payment') }}
            </a>

        </div>

    </div>

</div>

</x-app-layout>
