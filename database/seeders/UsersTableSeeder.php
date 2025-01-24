<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Vytvoření administrátora
        User::create([
            'name' => 'Zdenek Bezdicek',
            'email' => 'zdenek.bezdicek@gmail.com',
            'password' => Hash::make('password'), // Heslo: password
            'role' => 'admin', // Přiřazení role admin
        ]);

        // Vytvoření běžného uživatele
        User::create([
            'name' => 'Sabina Bezdíčková',
            'email' => 'info@vypij.cz',
            'password' => Hash::make('password'), // Heslo: password
            'role' => 'user', // Přiřazení role user
        ]);
    }
}