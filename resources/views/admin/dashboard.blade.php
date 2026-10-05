<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administration — FlowPay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Version mobile */
        .desktop-users {
            display: none;
        }

        .mobile-users {
            display: block;
        }

        /* Version ordinateur */
        @media (min-width: 768px) {
            .desktop-users {
                display: block;
            }

            .mobile-users {
                display: none;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-slate-950 text-white">

    <div class="min-h-screen">

        {{-- HEADER --}}
        <header class="border-b border-slate-800 bg-slate-900">

            <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-5 sm:px-6">

                <div class="min-w-0">
                    <h1 class="text-lg font-bold sm:text-xl">
                        Administration FlowPay
                    </h1>

                    <p class="mt-1 text-sm text-slate-400">
                        Gestion des utilisateurs
                    </p>
                </div>

                <form
                    method="POST"
                    action="{{ route('admin.logout') }}"
                    class="shrink-0"
                >
                    @csrf

                    <button
                        type="submit"
                        class="rounded-xl border border-slate-700 px-3 py-2 text-xs text-slate-300 transition-all duration-200 hover:-translate-y-0.5 hover:bg-slate-800 hover:text-white sm:px-4 sm:text-sm"
                    >
                        Se déconnecter
                    </button>
                </form>

            </div>

        </header>


        {{-- CONTENU --}}
        <main class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 sm:py-8">

            <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900">

                {{-- TITRE --}}
                <div class="border-b border-slate-800 px-4 py-5 sm:px-6">

                    <h2 class="text-lg font-semibold">
                        Utilisateurs inscrits
                    </h2>

                    <p class="mt-1 text-sm text-slate-400">
                        {{ $users->count() }} utilisateur(s)
                    </p>

                </div>


                @if ($users->isEmpty())

                    <div class="px-4 py-10 text-center text-slate-400 sm:px-6">
                        Aucun utilisateur inscrit pour le moment.
                    </div>

                @else


                    {{-- ================================================= --}}
                    {{-- VERSION MOBILE --}}
                    {{-- ================================================= --}}
                    <div class="mobile-users">

                        @foreach ($users as $user)

                            <div class="border-b border-slate-800 p-4 last:border-b-0">

                                <div class="rounded-xl border border-slate-800 bg-slate-950/40 p-4">

                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                                            Nom
                                        </p>

                                        <p class="mt-1 break-words font-semibold text-white">
                                            {{ $user->name }}
                                        </p>
                                    </div>

                                    <div class="mt-4">
                                        <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                                            E-mail
                                        </p>

                                        <p class="mt-1 break-all text-sm text-slate-300">
                                            {{ $user->email }}
                                        </p>
                                    </div>

                                    <div class="mt-4">
                                        <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                                            Téléphone
                                        </p>

                                        <p class="mt-1 text-sm text-slate-300">
                                            {{ $user->phone ?? '—' }}
                                        </p>
                                    </div>

                                    <div class="mt-5 border-t border-slate-800 pt-4">

                                        <a
                                            href="{{ route('admin.users.show', $user) }}"
                                            class="group flex w-full items-center justify-center gap-2 rounded-lg border border-slate-700 bg-slate-800/70 px-4 py-3 text-sm font-medium text-slate-200 shadow-sm transition-all duration-200 ease-out hover:-translate-y-0.5 hover:border-blue-500 hover:bg-blue-500/10 hover:text-blue-400 hover:shadow-lg hover:shadow-blue-500/10"
                                        >
                                            Voir

                                            <span class="text-blue-400 transition-transform duration-200 ease-out group-hover:translate-x-1">
                                                →
                                            </span>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>


                    {{-- ================================================= --}}
                    {{-- VERSION ORDINATEUR --}}
                    {{-- ================================================= --}}
                    <div class="desktop-users overflow-x-auto">

                        <table class="w-full border-collapse text-left">

                            <thead class="border-b border-slate-800 bg-slate-950/50">

                                <tr>

                                    <th class="w-[25%] px-6 py-4 text-sm font-medium text-slate-400">
                                        Nom
                                    </th>

                                    <th class="w-[30%] px-6 py-4 text-sm font-medium text-slate-400">
                                        E-mail
                                    </th>

                                    <th class="w-[25%] px-6 py-4 text-sm font-medium text-slate-400">
                                        Téléphone
                                    </th>

                                    <th class="w-[20%] px-6 py-4 text-right text-sm font-medium text-slate-400">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-800">

                                @foreach ($users as $user)

                                    <tr class="transition-colors duration-200 hover:bg-slate-800/50">

                                        <td class="px-6 py-5 font-medium">
                                            <span class="block truncate">
                                                {{ $user->name }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-5 text-slate-300">
                                            <span class="block truncate">
                                                {{ $user->email }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-5 text-slate-300">
                                            {{ $user->phone ?? '—' }}
                                        </td>

                                        <td class="px-6 py-5 text-right">

                                            <a
                                                href="{{ route('admin.users.show', $user) }}"
                                                class="group inline-flex items-center gap-2 rounded-lg border border-slate-700 bg-slate-800/70 px-4 py-2.5 text-sm font-medium text-slate-200 shadow-sm transition-all duration-200 ease-out hover:-translate-y-0.5 hover:border-blue-500 hover:bg-blue-500/10 hover:text-blue-400 hover:shadow-lg hover:shadow-blue-500/10"
                                            >
                                                Voir

                                                <span class="text-blue-400 transition-transform duration-200 ease-out group-hover:translate-x-1">
                                                    →
                                                </span>
                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @endif

            </div>

        </main>

    </div>

</body>
</html>