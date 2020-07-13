@extends('layouts.basetemplate.index')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-gray-100">
        <div class="container">
            <h1 class="display-4">Membros</h1>
            <p class="lead">listagem de membros.</p>
        </div>
    </div>

    <a class="btn btn-success btn-sm" href="{{ route('membros.cadastrar') }}">cadastrar</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nº Matricula</th>
                <th scope="col">Membro</th>
                <th scope="col">Cargo</th>
                <th scope="col">Coordenadoria</th>
                <th scope="col">Curso</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody class="table-hover">
            @foreach($membros as $membro)
                <tr>
                    <th class="align-middle" scope="row">{{ $membro->numero_matricula }}</th>
                    <td class="align-middle">
                        <div class="btn-group">
                            <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="white-space: nowrap">


                                    <img style="height: 30px; width: 30px; border-radius: 5px; margin-right: 5px;" src="{{ asset('images/'.$membro->profile_image) }}" />
                                    @if($membro->id === 2)
                                        <span class="px-1 text-danger" title="Hoje é o aniversário de Victor"><i class="fas fa-birthday-cake "></i></span>
                                    @endif
                                    {{$membro->firstName()}}
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="card border-0" style="width: 18rem;">
{{--                                    <img class="card-img-top" src="..." alt="Card image cap">--}}
                                    <div class="card-body">
                                        <h4 class="card-title">Contatos:</h4>
                                        <p class="card-text">
                                            E-mail pessoal: <a href="mailto:{{$membro->email}}" target="_blank" title="Clique para enviar um E-mail">{{ $membro->email }} </a>
                                        </p>
                                        <p class="card-text">
                                            E-mail corporativo: <a href="mailto:{{$membro->email}}" target="_blank" title="Clique para enviar um E-mail">{{ $membro->email }} </a>
                                        </p>
                                        <p class="card-text">
                                            Telefone:
                                            <a href="tel:{{$membro->telefone}}" target="_blank" title="Clique para telefonar">(18) 99795-8611</a>
                                            <div class="btn-group btn-group-sm">
                                                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone={{$membro->telefone}}&text=ol%C3%A1" target="_blank" title="Enviar mensagem por Whatsapp">
                                                    <i class="fab fa-whatsapp"></i>
                                                    <span>Whatsapp</span>
                                                </a>
                                                <a class="btn btn-dark" href="#" target="_blank" title="Enviar mensagem por Telegram">
                                                    <i class="fab fa-telegram"></i>
                                                    <span>Telegram</span>
                                                </a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        {{ $membro->cargo->nome }}
                    </td>
                    <td class="align-middle">Gestão de pessoas / Diretoria presidencia executiva</td>
                    <td class="align-middle">{{ $membro->curso->nome_do_curso }}</td>
                    <td class="align-middle">
                        <div class="btn-group-sm">
                            <button class="btn btn-light">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
