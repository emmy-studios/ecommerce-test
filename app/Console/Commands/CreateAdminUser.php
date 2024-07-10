<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'create:admin-user {email} {password}';

    protected $description = 'Create an admin user for Filament';

    public function handle()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
        ]);

        // Verificar el correo electrónico
        $user->email_verified_at = now();
        $user->save();

        $this->info("User {$user->email} created successfully.");
    }
}
