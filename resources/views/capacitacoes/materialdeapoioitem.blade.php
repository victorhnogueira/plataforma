@extends('layouts.loggedtemplate')

@section('content')
    <div class="container-fluid">
        <h1>{{ $material->titulo }}</h1>
        <h3>{{ $material->descricao }}</h3>
        <div>
            <?php
            echo $material->conteudo;
            ?>
        </div>
    </div>
@endsection
