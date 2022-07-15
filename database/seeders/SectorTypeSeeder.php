<?php

namespace Database\Seeders;

use App\Models\SectorType;
use Illuminate\Database\Seeder;

class SectorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectorType::create([
            'name' => 'Giro comercial'
        ]);
        SectorType::create([
            'name' => 'Giro industrial'
        ]);
        SectorType::create([
            'name' => 'Giro social'
        ]);
        SectorType::create([
            'name' => 'Servicios de turismo'
        ]);
        SectorType::create([
            'name' => 'Servicios de cultura y entretenimiento'
        ]);
        SectorType::create([
            'name' => 'Servicios de educación'
        ]);
        SectorType::create([
            'name' => 'Servicios privados'
        ]);
        SectorType::create([
            'name' => 'Servicios públicos'
        ]);
        SectorType::create([
            'name' => 'Servicios de salud'
        ]);
    }
}
