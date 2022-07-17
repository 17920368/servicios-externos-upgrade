<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialty::create([
            'name' => 'Ingeniería informática'
        ]);
        Specialty::create([
            'name' => 'Ingeniería forestal'
        ]);
        Specialty::create([
            'name' => 'Ingeniería agronomía'
        ]);
        Specialty::create([
            'name' => 'Licenciatura biología'
        ]);
        Specialty::create([
            'name' => 'Ingeniería TIC´S'
        ]);
        Specialty::create([
            'name' => 'Doctorado'
        ]);
        Specialty::create([
            'name' => 'Postgrado'
        ]);
    }
}
