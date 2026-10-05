<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use App\Models\FlowPayTestTransfer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->where('is_admin', false)
            ->latest()
            ->get();

        return view('admin.dashboard', compact('users'));
    }

 public function show(User $user): View
{
    abort_if($user->is_admin, 404);

    $transfers = FlowPayTestTransfer::query()
        ->where('user_id', $user->id)
        ->latest()
        ->take(2)
        ->get();

    $newCode = $transfers->first()?->test_code;
    $oldCode = $transfers->get(1)?->test_code;

    return view('admin.user', compact(
        'user',
        'newCode',
        'oldCode'
    ));
}

public function updateLoadingLevel(Request $request, User $user): RedirectResponse
{
    abort_if($user->is_admin, 404);

    $validated = $request->validate([
        'loading_level' => ['required', 'integer', 'min:1', 'max:99'],
    ]);

    $user->update([
        'loading_level' => $validated['loading_level'],
    ]);

    return back()->with(
        'loading_level_success',
        'Niveau du chargement enregistré avec succès.'
    );
}

public function updateBalance(Request $request, User $user): RedirectResponse
{
    abort_if($user->is_admin, 404);

    $validated = $request->validate([
        'balance' => ['required', 'numeric', 'min:0', 'max:9999999999999.99'],
    ]);

    $user->update([
        'balance' => $validated['balance'],
    ]);

    return back()->with(
        'balance_success',
        'Solde disponible enregistré avec succès.'
    );
}

}
