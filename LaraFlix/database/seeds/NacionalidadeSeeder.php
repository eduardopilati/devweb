<?php

use Illuminate\Database\Seeder;
use App\Nacionalidade;

class NacionalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nacionalidade::create(['descricao' => 'Brasileiro (a)']);
        Nacionalidade::create(['descricao' => 'Argentino (a)']);
        Nacionalidade::create(['descricao' => 'Norte-Americano (a)']);
        Nacionalidade::create(['descricao' => 'Canadense']);
        Nacionalidade::create(['descricao' => 'Uruguaio (a)']);
        Nacionalidade::create(['descricao' => 'Espanho (a)']);
        Nacionalidade::create(['descricao' => 'Inglês (a)']);
        Nacionalidade::create(['descricao' => 'Japonês (a)']);
        Nacionalidade::create(['descricao' => 'Chinês (a)']);
        Nacionalidade::create(['descricao' => 'Russo (a)']);
    }
}
