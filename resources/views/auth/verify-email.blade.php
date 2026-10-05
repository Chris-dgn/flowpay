
<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            {{ __('messages.verify_email_title') }}
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            {{ __('messages.verify_email_description') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
            {{ __('messages.verification_link_sent') }}
        </div>
    @endif

    <div class="mt-6 flex flex-col gap-3">

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                {{ __('messages.resend_verification_email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-200"
            >
                {{ __('messages.logout') }}
            </button>
        </form>

    </div>
</x-guest-layout>