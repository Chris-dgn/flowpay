
<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            {{ __('messages.forgot_password_title') }}
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            {{ __('messages.forgot_password_description') }}
        </p>
    </div>

    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label
                for="email"
                :value="__('messages.email_address')"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="email"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                :placeholder="__('messages.email_placeholder')"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <div class="flex flex-col gap-3 pt-1">

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                {{ __('messages.send_reset_link') }}
            </button>

            @if (Route::has('login'))
                <a
                    href="{{ route('login') }}"
                    class="flex w-full items-center justify-center rounded-lg border border-slate-200 bg-white px-4 py-3.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900"
                >
                    {{ __('messages.back_to_login') }}
                </a>
            @endif

        </div>
    </form>
</x-guest-layout>