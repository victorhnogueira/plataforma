<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'id' => 1,
            "nome_do_curso" => "Engenharia Biomédica"
        ]);

        DB::table('cargos')->insert([
            'id' => 1,
            "nome" => "Coordenador de Projetos"
        ]);

        DB::table('users')->insert([
            'name' => "Victor Hugo Nogueira",
            'email' => 'victornogueira@conselt.com.br',
            'password' => Hash::make('victor123'),
            'numero_matricula' => "11621EBI017",
            "curso_id" => 1,
            "cargo_id" => 1,
            "data_ingresso" => "2016-08-01",
            "status" => "ativo",
            "pontos_gamification" => 0,
            "data_nascimento" => "1998-08-01",
            "rg" => "41.548.754-1",
            "cpf" => "451.154.121-45",
            "endereco" => "Av das lamentações, 541, Centro"
        ]);

        DB::table('materiaisdeapoio')->insert([
            'titulo' => "Como migrar website usando FileZilla",
            'descricao' => 'Migrando um site wordpress sem plugins',
            'autor' => 1,
            'conteudo' => 'conteudo conteudo conteudo conteudo conteudo conteudo conteudo conteudo',
        ]);
    }
}
