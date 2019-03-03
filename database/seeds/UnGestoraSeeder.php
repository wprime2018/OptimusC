<?php

use Illuminate\Database\Seeder;
use App\Models\UGestora;

class UnGestoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UGestora::create([
            'codigoUnidGestora'       => '009126',
            'nomeUnidGestora'      => 'FUNDO MUNICIPAL DE ASSISTENCIA SOCIAL DE CRISTINAPOLIS',
            'cpfContador'   => '13113063000',
            'cpfGestor' => '00145110532',
        ]);
        UGestora::create([
            'codigoUnidGestora'       => '006308',
            'nomeUnidGestora'      => 'PREFEITURA MUNICIPAL CRISTINAPOLIS',
            'cpfContador'   => '05502519520',
            'cpfGestor' => '27625524515',
        ]);
        UGestora::create([
            'codigoUnidGestora'       => '009029',
            'nomeUnidGestora'      => 'FUNDO MUNICIPAL DE SAUDE DE CRISTINAPOLIS',
            'cpfContador'   => '13113063000',
            'cpfGestor' => '12025259549',
        ]);

    }
}
