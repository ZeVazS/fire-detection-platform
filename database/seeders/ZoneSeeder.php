<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Zone;

class ZoneSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar o Super Admin já existente
        $user = User::where('email', 'super@admin.com')->first();

        $zones = [
            ['nome' => 'Zona Norte',  'gps' => '41.1579,-8.6291', 'risco' => 'baixo'],
            ['nome' => 'Zona Centro', 'gps' => '39.3999,-8.2245', 'risco' => 'médio'],
            ['nome' => 'Zona Sul',    'gps' => '37.0194,-7.9304', 'risco' => 'alto'],
        ];

        foreach ($zones as $z) {
            Zone::updateOrCreate(
                ['nome' => $z['nome'], 'user_id' => $user->id],
                ['gps' => $z['gps'], 'risco' => $z['risco']]
            );
        }
    }
}
