<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Discussao;
use App\Models\DiscussaoCategoria;
use App\Models\DiscussaoComentario;
use App\Models\Jogo;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        Usuario::create([
            'name' => 'usuario',
            'email' => 'usuario@usuario',
            'username' => 'usuario',
            'password' => '123',
        ]);

       
        $discussao = Discussao::create([
            'titulo' => 'Discussão 1',
            'texto' => 'Discussão 1',
            'user_id' => 1,

        ]);

        DiscussaoComentario::create([
            'discussao_id' => $discussao->id,
            'user_id' => 1,
            'texto' => 'Comentario Muito Legal'
        ]);
        DiscussaoComentario::create([
            'discussao_id' => $discussao->id,
            'texto' => 'Comentario Muito Legal 2',
            'user_id' => 1
        ]);
    }
}
