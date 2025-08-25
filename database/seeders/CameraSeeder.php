<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camera;
use App\Models\Zone;

class CameraSeeder extends Seeder
{
    public function run(): void
    {
        $map = [
            'Zona Norte' => [
                ['nome' => 'Câmara Norte 1', 'url_feed' => 'http://cameras.example.com/norte1'],
            ],
            'Zona Centro' => [
                ['nome' => 'Câmara Centro 1', 'url_feed' => 'http://cameras.example.com/centro1'],
                ['nome' => 'Câmara Centro 2', 'url_feed' => 'http://cameras.example.com/centro2'],
            ],
            'Zona Sul' => [
                ['nome' => 'Câmara Sul 1', 'url_feed' => 'http://cameras.example.com/sul1'],
            ],
        ];

        foreach ($map as $zoneNome => $cameras) {
            $zone = Zone::where('nome', $zoneNome)->first();
            if (! $zone) continue;

            foreach ($cameras as $cam) {
                Camera::updateOrCreate(
                    ['nome' => $cam['nome'], 'zone_id' => $zone->id],
                    ['url_feed' => $cam['url_feed']]
                );
            }
        }
    }
}
