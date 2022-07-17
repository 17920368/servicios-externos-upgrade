<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AgreementTypeSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(IndicatorSeeder::class);
        $this->call(ScopeSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(SectorTypeSeeder::class);
        $this->call(SizeTypeSeeder::class);
        $this->call(ClassificationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SpecialtySeeder::class);
    }
}
