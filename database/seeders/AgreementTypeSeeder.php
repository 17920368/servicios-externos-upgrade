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
            'name' => 'Convenio marco de colaboración académica, científica y tecnológica'
        ]);
        AgreementType::create([
            'name' => 'Convenios de residencias profesionales'
        ]);
        AgreementType::create([
            'name' => 'Convenios de servicio social'
        ]);
        AgreementType::create([
            'name' => 'Donación'
        ]);
        AgreementType::create([
            'name' => 'Específico de colaboración'
        ]);
        AgreementType::create([
            'name' => 'Acuerdo de pre-incubación, incubación y post-incubación'
        ]);
        AgreementType::create([
            'name' => 'Acuerdo de servicio de consultoría y asistencia técnica'
        ]);
        AgreementType::create([
            'name' => 'Acuerdo de incubación'
        ]);
        AgreementType::create([
            'name' => 'Acuerdo de trabajo'
        ]);
        AgreementType::create([
            'name' => 'Convenio de cooperación'
        ]);
        AgreementType::create([
            'name' => 'Específico de colaboración ict academy parther'
        ]);
        AgreementType::create([
            'name' => 'Carta de intención'
        ]);
        AgreementType::create([
            'name' => 'Específico de colaboración'
        ]);
    }
}
