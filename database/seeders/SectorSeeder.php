<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create([
            'name' => 'Público'
        ]);
        Sector::create([
            'name' => 'Privado'
        ]);
        Sector::create([
            'name' => 'Social'
        ]);
        Sector::create([
            'name' => 'Productivo'
        ]);
    }
}
