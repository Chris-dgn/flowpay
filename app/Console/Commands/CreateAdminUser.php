<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

#[Signature('flowpay:create-admin')]
#[Description('Créer un compte administrateur FlowPay')]
class CreateAdminUser extends Command
{
    public function handle(): int
    {
        $name = $this->ask('Nom de l’administrateur');
        $email = $this->ask('Adresse e-mail');

        if (User::where('email', $email)->exists()) {
            $this->error('Un utilisateur avec cette adresse e-mail existe déjà.');

            return self::FAILURE;
        }

        $password = $this->secret('Mot de passe');
        $passwordConfirmation = $this->secret('Confirmer le mot de passe');

        if ($password !== $passwordConfirmation) {
            $this->error('Les mots de passe ne correspondent pas.');

            return self::FAILURE;
        }

        if (strlen($password) < 8) {
            $this->error('Le mot de passe doit contenir au moins 8 caractères.');

            return self::FAILURE;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);

        $this->info('Compte administrateur FlowPay créé avec succès.');

        return self::SUCCESS;
    }
}