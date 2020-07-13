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

        DB::table('cursos')->insert([
            'id' => 2,
            "nome_do_curso" => "Engenharia de Computação"
        ]);

        DB::table('cargos')->insert([
            'id' => 1,
            "nome" => "Diretor de Projetos"
        ]);

        DB::table('cargos')->insert([
            'id' => 2,
            "nome" => "Coordenador de Projetos"
        ]);


        DB::table('cargos')->insert([
            'id' => 3,
            "nome" => "Assessor de Projetos"
        ]);

        DB::table('cargos')->insert([
            'id' => 4,
            "nome" => "Pós-Junior"
        ]);

        DB::table('users')->insert([
            'name' => "Victor Hugo Nogueira",
            'email' => 'victornogueira@conselt.com.br',
            'password' => Hash::make('victor123'),
            'numero_matricula' => "11621EBI017",
            'profile_image' => "victor.png",
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

        DB::table('users')->insert([
            'name' => "Marcus Meireles",
            'email' => 'marcusmeireles@conselt.com.br',
            'password' => Hash::make('conselt123'),
            'profile_image' => "user_default.png",
            'numero_matricula' => "10033EBI050",
            "curso_id" => 1,
            "cargo_id" => 4,
            "data_ingresso" => "2016-08-01",
            "status" => "ativo",
            "pontos_gamification" => 0,
            "data_nascimento" => "1998-08-01",
            "rg" => "41.548.754-1",
            "cpf" => "451.154.121-45",
            "endereco" => "Av das lamentações, 541, Centro"
        ]);

        DB::table('users')->insert([
            'name' => "Marcela Castellani",
            'email' => 'marcelacastellani@conselt.com.br',
            'password' => Hash::make('conselt123'),
            'profile_image' => "marcela.png",
            'numero_matricula' => "10033EBI050",
            "curso_id" => 1,
            "cargo_id" => 4,
            "data_ingresso" => "2016-08-01",
            "status" => "ativo",
            "pontos_gamification" => 0,
            "data_nascimento" => "1998-08-01",
            "rg" => "41.548.754-1",
            "cpf" => "451.154.121-45",
            "endereco" => "Av das lamentações, 541, Centro"
        ]);

        DB::table('users')->insert([
            'name' => "Membro Teste",
            'email' => 'membroteste@conselt.com.br',
            'password' => Hash::make('conselt123'),
            'profile_image' => "user_default.png",
            'numero_matricula' => "10033EBI050",
            "curso_id" => 1,
            "cargo_id" => 3,
            "data_ingresso" => "2016-08-01",
            "status" => "ativo",
            "pontos_gamification" => 0,
            "data_nascimento" => "1998-08-01",
            "rg" => "41.548.754-1",
            "cpf" => "451.154.121-45",
            "endereco" => "Av das lamentações, 541, Centro"
        ]);

        DB::table('users')->insert([
            'name' => "Felipe",
            'email' => 'felipe@conselt.com.br',
            'password' => Hash::make('conselt123'),
            'profile_image' => "felipe.png",
            'numero_matricula' => "10023ECP012",
            "curso_id" => 2,
            "cargo_id" => 2,
            "data_ingresso" => "2016-02-06",
            "status" => "ativo",
            "pontos_gamification" => 0,
            "data_nascimento" => "1999-03-12",
            "rg" => "20.548.753-1",
            "cpf" => "625.154.456-45",
            "endereco" => "Av das lamentações, 541, Centro"
        ]);

        DB::table('materiaisdeapoio')->insert([
            'titulo' => "Como migrar website usando FileZilla",
            'descricao' => 'Migrando um site wordpress sem plugins',
            'autor' => 1,
            'conteudo' => 'conteudo conteudo conteudo conteudo conteudo conteudo conteudo conteudo',
        ]);

        DB::table('clientes')->insert([
            'nome' => "Luiz Fernando",
            'tipo' => 'MEI',
            'email' => 'luizfermando@gmail.com',
            'cpf_cnpj' => '10.202.463/0001-90',
            'cidade' => 'Uberlandia',
            'estado' => 'Minas Gerais',
        ]);

        DB::table('clientes')->insert([
            'nome' => "Total corretora de seguros",
            'tipo' => 'Pessoal Juridica',
            'email' => 'contato@totalcorretoradeseguros.com.br',
            'cpf_cnpj' => '52.124.483/0001-67',
            'cidade' => 'Ribeirão Preto',
            'estado' => 'São Paulo',
        ]);

        DB::table('servicos')->insert([
            'nome' => "Website",
            'ativo' => true,
        ]);

        DB::table('servicos')->insert([
            'nome' => "Aplicativo",
            'ativo' => true,
        ]);

        DB::table('servicos')->insert([
            'nome' => "Software",
            'ativo' => true,
        ]);

        DB::table('servicos')->insert([
            'nome' => "Readequação de cargas",
            'ativo' => true,
        ]);

        DB::table('projetos')->insert([
            'nome' => "App Total Seguros",
            'numero_contrato' => 1051,
            'cliente_id' => 2,
            'nps_id' => null,
            'servico_id' => 2,
            'faturamento' => 2750.26,
            'forma_de_pagamento' => 'Cartão em 3x',
            'status' => 'em_desenvolvimento',
            'data_assinatura_contrato' => '2020-06-12',
            'data_entrega_no_contrato' => '2020-07-18',
            'data_inicio' => '2020-06-18',
            'gerente_id' => 1,
        ]);

        DB::table('projetos')->insert([
            'nome' => "Website Colégio alternativo",
            'numero_contrato' => 1078,
            'cliente_id' => 1,
            'nps_id' => null,
            'servico_id' => 1,
            'faturamento' => 1800.00,
            'forma_de_pagamento' => 'Cartão em 6x',
            'status' => 'em_desenvolvimento',
            'data_assinatura_contrato' => '2020-05-17',
            'data_entrega_no_contrato' => '2020-06-28',
            'data_inicio' => '2020-05-23',
            'gerente_id' => 3,
        ]);

        DB::table('projetos')->insert([
            'nome' => "Website Colégio Delta",
            'numero_contrato' => 1075,
            'cliente_id' => 1,
            'nps_id' => null,
            'servico_id' => 1,
            'faturamento' => 2357.45,
            'forma_de_pagamento' => 'Cartão em 6x',
            'status' => 'em_desenvolvimento',
            'data_assinatura_contrato' => '2020-07-01',
            'data_entrega_no_contrato' => '2020-07-30',
            'gerente_id' => 1,
        ]);
    }
}
