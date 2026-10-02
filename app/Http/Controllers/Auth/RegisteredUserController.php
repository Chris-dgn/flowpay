<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Afficher la page d'inscription.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Traiter l'inscription.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'language' => [
                'required',
                'string',
                'in:fr,en',
            ],

            'bank_name' => [
                'required',
                'string',
                'max:255',
            ],

            /*
             * Carte uniquement pour la démonstration.
             * Ces données ne sont PAS enregistrées dans User.
             */
            'card_number' => [
                'required',
                'string',
                'regex:/^[0-9 ]{13,19}$/',
            ],

            'card_expiry' => [
                'required',
                'string',
                'regex:/^(0[1-9]|1[0-2])\/[0-9]{2}$/',
            ],

            'card_cvv' => [
                'required',
                'string',
                'regex:/^[0-9]{3,4}$/',
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        /*
         * IMPORTANT :
         * On ne met jamais card_number, card_expiry ou card_cvv
         * dans la création du compte.
         */
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language,
            'bank_name' => $request->bank_name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $request->session()->regenerate();

        /*
         * Les données de carte sont uniquement conservées
         * temporairement en session pour la démonstration.
         */
       

return redirect()->route('dashboard');

}
}