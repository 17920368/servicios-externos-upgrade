<?php

namespace Database\Seeders;

use App\Models\AgreementType;
use Illuminate\Database\Seeder;

class AgreementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgreementType::create([
            'name' => 'MARCO'
        ]);
        AgreementType::create([
            'name' => 'RESIDENCIA'
        ]);
        AgreementType::create([
            'name' => 'SS'
        ]);
    }
}
