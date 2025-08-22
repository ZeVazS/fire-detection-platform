<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Account;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criar conta exemplo
        $account = Account::create([
            'name' => 'Município Lisboa',
            'type' => 'municipio'
        ]);

        // Super Admin
        User::updateOrCreate(
            ['email' => 'super@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'account_id' => $account->id,
            ]
        );

        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'account_id' => $account->id,
            ]
        );

        // User normal
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Normal User',
                'password' => Hash::make('password'),
                'role' => 'user',
                'account_id' => $account->id,
            ]
        );
    }
}
