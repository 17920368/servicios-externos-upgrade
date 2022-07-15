<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'C. Humanidades'
        ]);
        Area::create([
            'name' => 'I. y T. Ingeniería y Tecnología'
        ]);
        Area::create([
            'name' => 'E.A Economía administrativa'
        ]);
        Area::create([
            'name' => 'C.N.E. Ciencias naturales y exactas'
        ]);
        Area::create([
            'name' => 'A.F.E.P Agropecuarias, Forestales, Extractivas, etc'
        ]);
    }
}
