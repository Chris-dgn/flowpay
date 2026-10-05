
<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            {{ __('messages.reset_password_title') }}
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            {{ __('messages.reset_password_description') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        >

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
                :value="old('email', $request->email)"
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

        <div>
            <x-input-label
                for="password"
                :value="__('messages.new_password')"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="password"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                :placeholder="__('messages.password_placeholder')"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <div>
            <x-input-label
                for="password_confirmation"
                :value="__('messages.confirm_password')"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="password_confirmation"
                class="mt-2 block w-full rounded-lg border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                :placeholder="__('messages.password_placeholder')"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <div class="pt-1">
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                {{ __('messages.reset_password') }}
            </button>
        </div>
    </form>
</x-guest-layout>
