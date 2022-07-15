<?php

namespace Database\Seeders;

use App\Models\Scope;
use Illuminate\Database\Seeder;

class ScopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scope::create([
            'name' => 'Estatal'
        ]);
        Scope::create([
            'name' => 'Nacional'
        ]);
        Scope::create([
            'name' => 'Internacional'
        ]);
    }
}
