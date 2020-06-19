@extends('layouts.basetemplate.index.blade.php')

@section('content')

    <style>
        .p-item{
            margin-bottom: 0;
        }
    </style>

    <div class="container-fluid">
        <h1>{{ $material->titulo }}</h1>
        <h3>{{ $material->descricao }}</h3>
        <p class="p-item">
            <small>
                <span><b>Publicado em:</b> {{ $material->created_at }}</span>
                @if($material->created_at != $material->updated_at)
                    - <span><b>Atualizado em:</b> {{ $material->updated_at }}</span>
                @endif
            </small>
        </p>
        <p class="p-item">
            <small><b>Autor:</b> {{ $material->autoruser->name }}</small>
        </p>
        <hr />
        <div>
            <?php
            echo $material->conteudo;
            ?>
        </div>
    </div>
@endsection
