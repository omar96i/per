<?php

namespace Database\Seeders;

use App\Models\MetaDeProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetasDeProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // MetaDeProducto::create([
        //     'periodo_id' => 1,
        //     'hecho_id' => 1,
        //     'politica_id' => 1,
        //     'programa_id' => 1,
        //     'indicador_id' => 1,
        //     'user_id' => 1,
        //     'codigo' => 'HR1P1MP1',
        //     'nombre' => '1,  Impulsar un programa de potabilización de agua en los  municipios con más altos niveles de pobreza a partir de la adaptación de tecnologías.',
        //     'indicador_meta' => 'No. de programas de potabilización impulsados',
        //     'peso' => 0,
        //     'linea_base' => null,
        //     'year' => 2021,
        //     'meta_year_1' => null,
        //     'meta_year_2' => null,
        //     'meta_year_3' => 1,
        //     'meta_year_4' => 1,
        //     'meta_cuatrienio' => 1,
        //     'recurso_year_1' => null,
        //     'recurso_year_2' => null,
        //     'recurso_year_3' => null,
        //     'recurso_year_4' => null,
        //     'recurso_cuatrienio' => null,
        // ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 1,
            'politica_id' => 1,
            'programa_id' => 2,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR1P1MP2',
            'nombre' => '2,  Impulsar un acuerdo público-comunitario para la autoconstrucción y construcción progresiva como alternativa de vivienda digna en la Región RAP Eje Cafetero.',
            'indicador_meta' => 'No. De acuerdos publico comunitarios impulsados para la autoconstrucción como alternativa de vivienda digna en la RAP Eje Cafetero.',
            'peso' => null,
            'linea_base' => null,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 30.000.000',
            'recurso_year_3' => '$ 30.000.000',
            'recurso_year_4' => '$ 30.000.000',
            'recurso_cuatrienio' => '$ 90.000.000',
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 1,
            'politica_id' => 1,
            'programa_id' => 3,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR1P1MP3',
            'nombre' => '3,  Articular e impulsar los proyectos contenidos en el Plan de  Educación Regional 2019 -2031',
            'indicador_meta' => 'No. De proyectos contenidos en el Plan de Educación 2019 - 2033  Articulados e Impulsados',
            'peso' => null,
            'linea_base' => 10,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 2,
            'meta_year_4' => 3,
            'meta_cuatrienio' => 3,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 10.000.000',
            'recurso_year_3' => '$ 10.000.000',
            'recurso_year_4' => '$ 10.000.000',
            'recurso_cuatrienio' => '$ 30.000.000',
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 1,
            'politica_id' => 1,
            'programa_id' => 3,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR1P1MP4',
            'nombre' => '4,  Promover la operación del clúster de educación superior en la  región RAP Eje Cafetero',
            'indicador_meta' => 'No. De operaciones del cluster de educación superiór promovidas',
            'peso' => null,
            'linea_base' => 1,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 10.000.000',
            'recurso_year_3' => '$ 10.000.000',
            'recurso_year_4' => '$ 10.000.000',
            'recurso_cuatrienio' => '$ 30.000.000',
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 1,
            'politica_id' => 1,
            'programa_id' => 4,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR1P1MP4',
            'nombre' => '5,  Promover  Acuerdos regionales contra las violencia, el trabajo infantil, el consumo de estupefacientes, el suicidio y la inequidad de género, e implementar un plan de seguimiento a los  indicadores regionales en estos temas.',
            'indicador_meta' => 'No. De acuerdos regionales promovidos y planes de seguimiento implementados',
            'peso' => null,
            'linea_base' => null,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 2,
            'meta_cuatrienio' => 2,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 30.000.000',
            'recurso_year_3' => '$ 30.000.000',
            'recurso_year_4' => '$ 3.000.000',
            'recurso_cuatrienio' => '$ 63.000.000',
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 1,
            'politica_id' => 1,
            'programa_id' => 5,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR1P1MP6',
            'nombre' => '6,  Crear e implementar un Observatorio Regional de Seguimiento y Promoción de los ODS.',
            'indicador_meta' => 'No. De observatorios regionales de seguimientos a los ODS creados e implementados',
            'peso' => null,
            'linea_base' => 0,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 100.000.000',
            'recurso_year_3' => '$ 100.000.000',
            'recurso_year_4' => '$ 100.000.000',
            'recurso_cuatrienio' => '$ 300.000.000',
        ]);

// -----------------------------

        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 2,
            'programa_id' => 6,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR2P2MP1',
            'nombre' => '1. PRODUCTO: Crear el Sistema Regional de Innovación, con su respectivo  plan estratégico.',
            'indicador_meta' => 'No. de sistemas regionales de Innovación creados con su respectivo Plan Estrategico',
            'peso' => null,
            'linea_base' => 0,
            'year' => 2021,
            'meta_year_1' => 1,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 48.000.000',
            'recurso_year_3' => '$ 30.000.000',
            'recurso_year_4' => '$ 30.000.000',
            'recurso_cuatrienio' => '$ 108.000.000',
        ]);

        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 2,
            'programa_id' => 6,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'null',
            'nombre' => 'PRODUCTO: Acordar y poner en operación un Plan de Transición Energética Regional a 2033, como una contribución a la lucha contra el  cambio climático, para ser adoptados por las entidades territoriales  asociadas a la RAP EC',
            'indicador_meta' => null,
            'peso' => null,
            'linea_base' => null,
            'year' => null,
            'meta_year_1' => null,
            'meta_year_2' => null,
            'meta_year_3' => null,
            'meta_year_4' => null,
            'meta_cuatrienio' => null,
            'recurso_year_1' => null,
            'recurso_year_2' => null,
            'recurso_year_3' => null,
            'recurso_year_4' => null,
            'recurso_cuatrienio' => null,
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 2,
            'programa_id' => 6,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR2P2MP2',
            'nombre' => '2. PRODUCTO: Impulsar la creación del Centro de Investigaciones Regionales de Biotecnología y Bioeconomía y apoyar su operación',
            'indicador_meta' => 'No. De centros de Investigaciones Regionales de Biotecnología y Bioeconomía impulsados y apoyados.',
            'peso' => null,
            'linea_base' => 0,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 52.000.000',
            'recurso_year_3' => '$ 70.000.000',
            'recurso_year_4' => '$ 70.000.000',
            'recurso_cuatrienio' => '$ 192.000.000',
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 2,
            'programa_id' => 7,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'null',
            'nombre' => 'PRODUCTO: Articular la institucionalidad pública para el diseño de un Plan Regional de Conectividad Digital',
            'indicador_meta' => null,
            'peso' => null,
            'linea_base' => null,
            'year' => null,
            'meta_year_1' => null,
            'meta_year_2' => null,
            'meta_year_3' => null,
            'meta_year_4' => null,
            'meta_cuatrienio' => null,
            'recurso_year_1' => null,
            'recurso_year_2' => null,
            'recurso_year_3' => null,
            'recurso_year_4' => null,
            'recurso_cuatrienio' => null,
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 2,
            'programa_id' => 8,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR2P2MP3',
            'nombre' => '3. PRODUCTO: Impulsar la marca Hecho en la Región Eje Cafetero.',
            'indicador_meta' => 'No. De marcas impulsadas',
            'peso' => null,
            'linea_base' => 0,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 540.000.000',
            'recurso_year_3' => '$ 150.000.000',
            'recurso_year_4' => '$ 160.000.000',
            'recurso_cuatrienio' => '$ 850.000.000',
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 2,
            'programa_id' => 8,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR2P2MP4',
            'nombre' => '4. PRODUCTO: Impulsar la creación y consolidación de las Cadenas Regionales de Valor.',
            'indicador_meta' => 'No. De Cadenas Regionales de valor impulsadas',
            'peso' => null,
            'linea_base' => 0,
            'year' => 2021,
            'meta_year_1' => null,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 280.000.000',
            'recurso_year_3' => '$ 200.000.000',
            'recurso_year_4' => '$ 220.000.000',
            'recurso_cuatrienio' => '$ 700.000.000',
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 2,
            'programa_id' => 9,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'null',
            'nombre' => 'PRODUCTO: Promover un programa regional de reconversión   tecnológica para la disposición final de residuos sólidos',
            'indicador_meta' => null,
            'peso' => null,
            'linea_base' => null,
            'year' => null,
            'meta_year_1' => null,
            'meta_year_2' => null,
            'meta_year_3' => null,
            'meta_year_4' => null,
            'meta_cuatrienio' => null,
            'recurso_year_1' => null,
            'recurso_year_2' => null,
            'recurso_year_3' => null,
            'recurso_year_4' => null,
            'recurso_cuatrienio' => null,
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 3,
            'programa_id' => 10,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'null',
            'nombre' => 'PRODUCTO: Impulsar la creación y operación del Distrito Regional Agroindustrial a través de nodos especializados. ',
            'indicador_meta' => null,
            'peso' => null,
            'linea_base' => null,
            'year' => null,
            'meta_year_1' => null,
            'meta_year_2' => null,
            'meta_year_3' => null,
            'meta_year_4' => null,
            'meta_cuatrienio' => null,
            'recurso_year_1' => null,
            'recurso_year_2' => null,
            'recurso_year_3' => null,
            'recurso_year_4' => null,
            'recurso_cuatrienio' => null,
        ]);
        MetaDeProducto::create([
            'periodo_id' => 1,
            'hecho_id' => 2,
            'politica_id' => 3,
            'programa_id' => 11,
            'indicador_id' => 1,
            'user_id' => 1,
            'codigo' => 'HR2P3MP1',
            'nombre' => '1. PRODUCTO: Constituir el Sistema Regional de Abastecimiento  Alimentario, con un sistema de seguimiento a través de un  Observatorio Regional.',
            'indicador_meta' => 'No. de sistemas regionales de abastecimiento alimentario, con un sistema de seguimiento a través de un observatorio regional construidos',
            'peso' => null,
            'linea_base' => 0,
            'year' => 2021,
            'meta_year_1' => 1,
            'meta_year_2' => 1,
            'meta_year_3' => 1,
            'meta_year_4' => 1,
            'meta_cuatrienio' => 1,
            'recurso_year_1' => null,
            'recurso_year_2' => '$ 374.000.000',
            'recurso_year_3' => '$ 100.000.000',
            'recurso_year_4' => '$ 100.000.000',
            'recurso_cuatrienio' => '$ 574.000.000',
        ]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '4',
            'programa_id' => '16',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P4MP1',
            'nombre' => 'Elaborar y promocionar el Plan Regional de Turismo a 2033',
            'indicador_meta' => 'No. de planes de turismo elaborados y promocionados',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '1',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '40000000',
            'recurso_year_3' => '20000000',
            'recurso_year_4' => '20000000',
            'recurso_cuatrienio' => '80000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '4',
            'programa_id' => '16',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P4MP2',
            'nombre' => 'Diseño, Gestion y/o construcción de  Vias Verdes en los departamentos que componen la RAP Eje Cafetero',
            'indicador_meta' => 'No. de vías verdes diseñadas, gestionadas y/o construidas.',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '1',
            'meta_year_3' => '3',
            'meta_year_4' => '4',
            'meta_cuatrienio' => '4',
            'recurso_year_1' => '0',
            'recurso_year_2' => '1225000000',
            'recurso_year_3' => '421600000',
            'recurso_year_4' => '501850000',
            'recurso_cuatrienio' => '2148450000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '5',
            'programa_id' => '13',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P5MP1',
            'nombre' => 'Elaborar y promover la implementación del Plan Logístico Regional de la región RAP Eje Cafetero para impulsar la internacionalización de la economía',
            'indicador_meta' => 'No. de planes logísiticos elaborados y promovidos',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '1',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '83000000',
            'recurso_year_3' => '45000000',
            'recurso_year_4' => '45000000',
            'recurso_cuatrienio' => '173000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '5',
            'programa_id' => '13',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P5MP2',
            'nombre' => 'Crear y coordinar un Tanque de Pensamiento Regional sobre movilidad, servicios e Infraestructura de la región RAP Eje Cafetero.',
            'indicador_meta' => 'No. De Tanques de Pensamiento regionales de investigación sobre infraestructura creados y coordinados',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '17000000',
            'recurso_year_3' => '5000000',
            'recurso_year_4' => '5000000',
            'recurso_cuatrienio' => '27000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '5',
            'programa_id' => '14',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P5MP3',
            'nombre' => 'Impulsar el sistema ferroviario regional del eje cafetero y las conexiones al pacífico y el caribe.',
            'indicador_meta' => 'No. De sistemas ferroviarios regionales impulsados acompañados regionalmente',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '10000000',
            'recurso_year_3' => '30000000',
            'recurso_year_4' => '30000000',
            'recurso_cuatrienio' => '70000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '5',
            'programa_id' => '15',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P5MP4',
            'nombre' => 'Elaborar la propuesta regional para obtener la operación del corredor vía Armenia – Pereira - Manizales en favor de la región a partir de 2027.',
            'indicador_meta' => 'No. De propuestas regionales viales elaboradas',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '1',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '43737371',
            'recurso_year_3' => '40000000',
            'recurso_year_4' => '40000000',
            'recurso_cuatrienio' => '123737371',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '6',
            'programa_id' => '8',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => '',
            'nombre' => 'PRODUCTO: Crear un instrumento financiero de segundo piso para la Región RAP Eje Cafetero mediante un acuerdo interinstitucional. ',
            'indicador_meta' => '',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '0',
            'meta_year_3' => '0',
            'meta_year_4' => '0',
            'meta_cuatrienio' => '0',
            'recurso_year_1' => '0',
            'recurso_year_2' => '0',
            'recurso_year_3' => '0',
            'recurso_year_4' => '0',
            'recurso_cuatrienio' => '0',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '6',
            'programa_id' => '24',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => '',
            'nombre' => 'PRODUCTO:  Coordinar una estrategia para la implementación del catastro  multipropósito regional. ',
            'indicador_meta' => '',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '0',
            'meta_year_3' => '0',
            'meta_year_4' => '0',
            'meta_cuatrienio' => '0',
            'recurso_year_1' => '0',
            'recurso_year_2' => '0',
            'recurso_year_3' => '0',
            'recurso_year_4' => '0',
            'recurso_cuatrienio' => '0',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '6',
            'programa_id' => '24',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P6MP1',
            'nombre' => 'Estimular y acompañar la creación y el fortalecimiento de los Esquemas Asociativos Territoriales – EAT',
            'indicador_meta' => 'No. De esquemas asociativos acompañados',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '1',
            'meta_year_3' => '2',
            'meta_year_4' => '0',
            'meta_cuatrienio' => '2',
            'recurso_year_1' => '0',
            'recurso_year_2' => '30000000',
            'recurso_year_3' => '30000000',
            'recurso_year_4' => '30000000',
            'recurso_cuatrienio' => '90000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '6',
            'programa_id' => '24',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P6MP2',
            'nombre' => 'Fomentar y acompañar la Incorporación de un enfoque regional en los diferentes instrumentos de planificación de las entidades publicas, organizaciones de la sociedad civil y del sector privado.',
            'indicador_meta' => 'No. De enfoques regionales acompañados y fomentados',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '1',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '415000000',
            'recurso_year_3' => '70000000',
            'recurso_year_4' => '70000000',
            'recurso_cuatrienio' => '555000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '2',
            'politica_id' => '6',
            'programa_id' => '20',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR2P6MP3',
            'nombre' => 'Desarrollar y liderar un programa para el fortalecimiento de la identidad regional',
            'indicador_meta' => 'No. De progranas para el fortalecimienti de la identidad regional desarrolados y liderados',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '10000000',
            'recurso_year_3' => '10000000',
            'recurso_year_4' => '10000000',
            'recurso_cuatrienio' => '30000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '3',
            'politica_id' => '7',
            'programa_id' => '20',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR3P7MP1',
            'nombre' => 'Acompañar y promover la implementación del Plan de Recuperación del Parque Nacional Natural de los Nevados.',
            'indicador_meta' => 'No. de planes de recuperación acompañados y promovidos en us implementación',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '1',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '35000000',
            'recurso_year_3' => '17500000',
            'recurso_year_4' => '17500000',
            'recurso_cuatrienio' => '70000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '3',
            'politica_id' => '7',
            'programa_id' => '20',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => '',
            'nombre' => '2. PRODUCTO: Acompañar la gestión del Geoparque volcán del Ruíz para la declaratoria de Geoparques Mundiales de la UNESCO. ',
            'indicador_meta' => 'No. De procesos de  acompañamiento ralizados en la gestion de una declaratoria ',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '1',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '35000000',
            'recurso_year_3' => '17500000',
            'recurso_year_4' => '17500000',
            'recurso_cuatrienio' => '70000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '3',
            'politica_id' => '8',
            'programa_id' => '23',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => '',
            'nombre' => 'PRODUCTO: Crear un Sistema Regional de Información  Geográfica y Estadística y un Observatorio de Ordenamiento  Territorial Regional.',
            'indicador_meta' => '',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '0',
            'meta_year_3' => '0',
            'meta_year_4' => '0',
            'meta_cuatrienio' => '0',
            'recurso_year_1' => '0',
            'recurso_year_2' => '0',
            'recurso_year_3' => '0',
            'recurso_year_4' => '0',
            'recurso_cuatrienio' => '0',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '3',
            'politica_id' => '8',
            'programa_id' => '24',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR3P8MP1',
            'nombre' => 'Establecer un documento de lineamientos de planeación regional con base en la subregionalización funcional  ',
            'indicador_meta' => 'No. De documentos de lineamientos de planeación regional establecidos',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '15000000',
            'recurso_year_3' => '0',
            'recurso_year_4' => '0',
            'recurso_cuatrienio' => '15000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '3',
            'politica_id' => '8',
            'programa_id' => '24',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => 'HR3P8MP2',
            'nombre' => 'Promover la implementación de un Sistema Regional de ciudades',
            'indicador_meta' => 'No. De sistemas regionales de ciudades promovidos o implementados',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '1',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '30000000',
            'recurso_year_3' => '30000000',
            'recurso_year_4' => '30000000',
            'recurso_cuatrienio' => '90000000',
		]);

        DB::table('meta_de_productos')->insert([
            'periodo_id' => '1',
            'hecho_id' => '3',
            'politica_id' => '8',
            'programa_id' => '25',
            'indicador_id' => '1',
            'user_id' => '1',
            'codigo' => '',
            'nombre' => '3. PRODUCTO: Asistir técnicamente la inclusión de acciones del Plan de Manejo del Paisaje Cultural Cafetero Colombiano en el Ordenamiento  Territorial y en los planes de desarrollo de los departamentos y  municipios que hacen parte de la declaratoria de la UNESCO en la RAP  EC.',
            'indicador_meta' => 'No. De planes de manejo del PCCC asisitidos tecnicamente',
            'peso' => '0',
            'linea_base' => '',
            'year' => '2021',
            'meta_year_1' => '0',
            'meta_year_2' => '0',
            'meta_year_3' => '1',
            'meta_year_4' => '1',
            'meta_cuatrienio' => '1',
            'recurso_year_1' => '0',
            'recurso_year_2' => '0',
            'recurso_year_3' => '0',
            'recurso_year_4' => '0',
            'recurso_cuatrienio' => '0',
		]);
    }
}
