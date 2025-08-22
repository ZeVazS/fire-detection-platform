<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🔥 Chama o UserSeeder (e outros no futuro)
        $this->call([
            UserSeeder::class,
        ]);
    }
}
