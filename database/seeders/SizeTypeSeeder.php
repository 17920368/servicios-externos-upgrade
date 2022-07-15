<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'name' => 'Microempresa'
        ]);
        Size::create([
            'name' => 'Pequeña'
        ]);
        Size::create([
            'name' => 'Mediana'
        ]);
        Size::create([
            'name' => 'Gran empresa'
        ]);
    }
}
