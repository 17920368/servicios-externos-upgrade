<?php

namespace Database\Seeders;

use App\Models\Indicator;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indicator::create([
            'name' => 'Reuniones de trabajo',
            'description' => 'Realizar reuniones de trabajo que contribuyan a la solución de problemas regionales y nacionales',
        ]);
        Indicator::create([
            'name' => 'Firmas convenio con otras IES',
            'description' => 'Firmar convenio o acuerdos de cooperación con otras IES nacionales o internacionales',
        ]);
        Indicator::create([
            'name' => 'Establecer convenios',
            'description' => 'Establecer los convenios de colaboración con esquemas de inversión en proyectos de ciencia, tecnología e innovación',
        ]);
        Indicator::create([
            'name' => 'Proponer esquemas',
            'description' => 'Proponer esquemas de inversión para establecer proyectos de ciencia, tecnología e innovación en las regiones del estado',
        ]);
        Indicator::create([
            'name' => 'Participar en esquemas',
            'description' => 'Participar en esquemas de inversión en proyectos de ciencia, tecnología e innovación en el sector regional',
        ]);
        Indicator::create([
            'name' => 'Firmar convenios para el aprovechamiento',
            'description' => 'Firmar convenios para el aprovechamiento interinstitucional de las instalaci',
        ]);
        Indicator::create([
            'name' => 'Esquemas de convenio uso compartido',
            'description' => 'Proponer esquemas de convenios para el uso compartido de las instalaciones para las actividades científicas, tecnológicas y de innovación',
        ]);
        Indicator::create([
            'name' => 'Consejo de vinculación',
            'description' => 'Mantener el consejo de vinculación',
        ]);
        Indicator::create([
            'name' => 'Realizar reuniones',
            'description' => 'Realizar reuniones ordinarias del consejo de vinculación',
        ]);
        Indicator::create([
            'name' => 'Mecanismos de vinculación',
            'description' => 'Establecer mecanismos de vinculación con los diferentes sectores de la iniciativa privada',
        ]);
        Indicator::create([
            'name' => 'Acuerdo de cooperación',
            'description' => 'Firmar convenio o acuerdo de cooperación entre institutos tecnológicos o centros adscritos al TECNM',
        ]);
        Indicator::create([
            'name' => 'Solución de problemas',
            'description' => 'Realizar reuniones de trabajo que contribuyan a la solución de problemas regionales y nacionales',
        ]);
        Indicator::create([
            'name' => 'Contratos de vinculación',
            'description' => 'Firmar convenios o contratos de vinculación con los sectores público, social y privado',
        ]);
        Indicator::create([
            'name' => 'Proponer esquemas de convenios',
            'description' => 'Proponer esquemas de convenios o contratos con los sectores público, social y privado en las regiones del estado',
        ]);
        Indicator::create([
            'name' => 'Selección de instancias',
            'description' => 'Seleccionar instancias para que participen en esquemas de convenios o contratos de vinculación de los diferentes sectores',
        ]);
        Indicator::create([
            'name' => 'Registro de propiedad intelectual',
            'description' => 'Registrar propiedad intelectual o marca registrada',
        ]);
        Indicator::create([
            'name' => 'Promoción de protección a la propiedad intelectual',
            'description' => 'Curso, taller o pláticas para la promoción de la protección de la propiedad intelectual',
        ]);
        Indicator::create([
            'name' => 'Empresas incubadas',
            'description' => 'Generar empresas incubadas por el CIIE del instituto',
        ]);
        Indicator::create([
            'name' => 'Servicios especializados',
            'description' => 'Promover los servicios especializados que ofrece el CIIE',
        ]);
        Indicator::create([
            'name' => 'Fortalecimiento de la incubación',
            'description' => 'Curso, taller o pláticas para el fortalecimiento de la incubación de empresas',
        ]);
        Indicator::create([
            'name' => 'Encuesta a egresados',
            'description' => 'Aplicar encuesta a egresados del instituto',
        ]);
        Indicator::create([
            'name' => 'Encuentro de egresados y empleadores',
            'description' => 'Realizar el encuentro de egresados y empleadores',
        ]);
        Indicator::create([
            'name' => 'Seguimiento de las estadísticas de egresados',
            'description' => 'Reportar el seguimiento de las estadísticas de egresados',
        ]);
        Indicator::create([
            'name' => 'Promover la participación',
            'description' => 'Promover la participación de estudiantes y docentes en proyectos de emprendimiento con enfoque en la innovación y sustentabilidad',
        ]);
        Indicator::create([
            'name' => 'Fortalecimiento del emprendimiento',
            'description' => 'Cursos, talleres, pláticas para el fortalecimiento del emprendimiento con enfoque en la innovación y sustentabilidad',
        ]);
        Indicator::create([
            'name' => 'Participación en concursos',
            'description' => 'Participación en concursos o convocatorias de emprendimiento',
        ]);
    }
}
