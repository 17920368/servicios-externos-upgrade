<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classification::create([
            'name' => 'Empresas del sector primario'
        ]);
        Classification::create([
            'name' => 'Empresas del sector secundario'
        ]);
        Classification::create([
            'name' => 'Empresas del sector terciario o de servicios'
        ]);
    }
}
