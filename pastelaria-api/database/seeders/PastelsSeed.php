<?php

use Illuminate\Database\Seeder;

class PastelsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Model\Pastel::create([
            'nome' => str_random(10),
            'preco' => '10.8',
            'foto' => str_random(10),
        ]);
    }
}