@extends('layouts.basetemplate.index')

@section('content')
    <script src="{{ url(mix('site/js/novoProjeto.js')) }}"></script>
  <style>
    #tabela-projetos tbody > tr > td{
      font-size: 14px;
    }

    #tabela-projetos thead > tr > th{
      font-size: 14px;
    }

    .membrogerentetab{
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }

    .membrogerentetab > img{
      width: 24px;
      height: 24px;
    }

    .membrogerentetab > p{
      font-size: 16px;
      margin-left: 5px;
      margin-block-end:0px;
      margin-block-start:0px;
    }

  </style>

  <div class="jumbotron jumbotron-fluid bg-gray-100">
    <div class="container">
      <h1 class="display-4">Projetos</h1>
      <p class="lead">Listagem dos projetos em andamento e concluidos</p>
    </div>
  </div>

  <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
              <i class="fas fa-pencil-ruler"></i>
              <span>Todos os Projetos</span>
          </a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
              <i class="fas fa-users"></i>
              <span>Membros em projetos</span>
          </a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
              <i class="fas fa-list-ul"></i>
              <span>Registro de atividades</span>
          </a>
      </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="d-flex justify-content-between mt-3 mb-3">
              <div class="input-group w-50">
                  <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="button-show-project-filter" title="Exibir filtros avançados"><i class="fas fa-filter"></i></button>
                  </div>
                  <input type="text" id="input-buscar-projeto" class="form-control" placeholder="Buscar pelo nome do projeto ou numero do contrato" aria-label="Buscar pelo nome do projeto ou numero do contrato" aria-describedby="Buscar pelo nome do projeto ou numero do contrato">
              </div>
              <div class="btn-group h-100">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#novoProjetoModal">Novo projeto</button>
                  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Lançar projeto retroativo</a>
                  </div>
              </div>
          </div>

          <!-- begin: Filter div -->
          <div id="project-filter-container" class="d-none mt-4 mb-4">
              <div class="row">
                <div class="container">
                    <p class="font-weight-bold ">Filtros:</p>
                </div>
              </div>
              <div class="row">
                  <div class="col-4">
                      <div class="form-group">
                          <label class="font-weight-bold" for="selectProjetosServico">Serviços</label>

                          <select id="selectProjetosServico" class="form-control selectpicker filter-input" multiple>
                              @foreach($servicos_da_cartilha as $servico)
                                  <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold" for="selectProjetosStatus">Status</label>

                          <select id="selectProjetosStatus" class="form-control selectpicker" multiple>
                              <option value="0">Em Desenvolvimento, no prazo</option>
                              <option value="0">Em Desenvolvimento, atrasado</option>
                              <option value="1">Finalizado, no prazo</option>
                              <option value="1">Finalizado, atrasado</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-4">
                      <div class="form-group">
                          <label for="selectProjetosGerente" class="font-weight-bold">Gerente</label>

                          <select id="selectProjetosGerente" class="form-control selectpicker filter-input" multiple>
                              @foreach($membros as $membro)
                                  <option value="{{ $membro->id }}">{{ $membro->name.' - '.$membro->cargo->nome }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="selectProjetosMembros" class="font-weight-bold">Membros participantes</label>

                          <select id="selectProjetosMembros" class="form-control selectpicker" multiple>
                              @foreach($membros as $membro)
                                  <option value="{{ $membro->id }}">{{ $membro->name.' - '.$membro->cargo->nome}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="selectProjetosCliente" class="font-weight-bold">Cliente</label>

                          <select id="selectProjetosCliente" class="form-control selectpicker filter-input" multiple>
                              @foreach($clientes as $cliente)
                                  <option value="{{ $cliente->id }}">{{ $cliente->nome}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-4">
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Tipo de projeto</label>

                          <select id="selectProjetosTipo" class="form-control selectpicker" multiple>
                              <option value="0">Ação compartilhada</option>
                              <option value="1">Projeto de impacto</option>
                              <option value="1">Indicação</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="container d-flex justify-content-end">
                      <button id="button-clear-filter-data" class="btn btn-outline-danger">
                          <i class="fas fa-times"></i>
                          <span>limpar filtro</span>
                      </button>
                  </div>
              </div>
          </div>
          <!-- end: Filter div -->

          <!-- Exibe a quantidade de resultados quando retorna a request -->
          <p id="qtd-resultado-busca"></p>

          <div class="table-responsive">
              <table id="tabela-projetos" class="table table-md table-striped table-hover">
                  <thead>
                  <tr>
                      <th class="align-middle" scope="col">Contrato</th>
                      <th class="align-middle" scope="col">Nome do projeto</th>
                      <th class="align-middle" scope="col">Tipo de serviço</th>
                      <th class="align-middle" scope="col">Cliente</th>
                      <th class="align-middle" scope="col">Gerente</th>
                      <th class="align-middle" scope="col">Assinatura do contrato</th>
                      <th class="align-middle" scope="col">Término previsto</th>
                      <th class="align-middle" scope="col">Status</th>
                      <th class="align-middle" scope="col">Ações</th>
                  </tr>
                  </thead>
                  <tbody id="projetos-table-body">
                  @foreach($projetos as $projeto)
                      <tr>
                          <th class="align-middle" scope="row">{{ $projeto->numero_contrato }}</th>
                          <td class="align-middle">
                              <span>{{ $projeto->nome }}</span>
                          </td>
                          <td class="align-middle">{{ $projeto->servico->nome }}</td>
                          <td class="align-middle">{{ $projeto->cliente->nome }}</td>
                          <td class="align-middle">
                              <div class="membrogerentetab">
                                  <img  src="{{ asset('images/'.$projeto->gerente->profile_image) }}" class="rounded float-left" alt="{{ $projeto->gerente->name }}">
                                  <p>{{ $projeto->gerente->firstName() }}</p>
                              </div>
                          </td>
                          <td class="align-middle">{{ $projeto->data_assinatura_contrato }}</td>
                          <td class="align-middle">
                              {{ $projeto->data_entrega_no_contrato }}

                              @if( $projeto->esta_atrasado() )
                                  <button class="btn btn-sm btn-danger btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-exclamation-triangle"></i> </span> <span class="text">{{$projeto->dias_para_entrega()}} dias de atraso</span> </button>
                              @endif
                          </td>
                          <td class="align-middle">40%</td>
                          <td class="align-middle">
                              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-light seeprojectdetailspopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Ver detalhes do projeto">
                                      <i class="far fa-eye"></i>
                                  </button>
                                  @if(Auth::user()->id === $projeto->gerente->id)
                                      <a href="{{ route('projetos.gerenciar') }}" type="button" class="btn btn-secondary manageprojectpopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Gerenciar projeto">
                                          <i class="fas fa-tasks"></i>
                                      </a>
                                  @endif
                              </div>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">






          <div class="d-flex justify-content-between mt-3 mb-3">
              <div class="input-group w-50">
                  <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="button-toggle-advanced-member-project-filter" title="Exibir filtros avançados"><i class="fas fa-filter"></i></button>
                  </div>
                  <input type="text" id="input-buscar-membro-projeto" class="form-control" placeholder="Buscar pelo nome do membro ou numero de matricula" aria-label="Buscar pelo nome do membro ou numero de matricula" aria-describedby="Buscar pelo nome do membro ou numero de matricula">
              </div>
          </div>

          <!-- begin: Filter div -->
          <div id="user-project-filter-container" class="d-none mt-4 mb-4">
              <div class="container">
                <div class="row">
                      <p class="font-weight-bold ">Filtros:</p>
                </div>
              </div>
              <div class="row">
                  <div class="col-4">
                      <div class="form-group">
                          <label class="font-weight-bold" for="selectMembrosProjetosServico">Serviços</label>

                          <select id="selectMembrosProjetosServico" class="form-control selectpicker filter-input-membro-projeto" multiple>
                              @foreach($servicos_da_cartilha as $servico)
                                  <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold" for="selectMembrosProjetosStatus">Status</label>

                          <select id="selectMembrosProjetosStatus" class="form-control selectpicker" multiple>
                              <option value="0">Em Desenvolvimento, no prazo</option>
                              <option value="0">Em Desenvolvimento, atrasado</option>
                              <option value="1">Finalizado, no prazo</option>
                              <option value="1">Finalizado, atrasado</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-4">
                      <div class="form-group">
                          <label for="selectMembrosProjetosGerente" class="font-weight-bold">Gerente</label>

                          <select id="selectMembrosProjetosGerente" class="form-control selectpicker filter-input-membro-projeto" multiple>
                              @foreach($membros as $membro)
                                  <option value="{{ $membro->id }}">{{ $membro->name.' - '.$membro->cargo->nome }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="selectMembrosProjetosMembros" class="font-weight-bold">Membros participantes</label>

                          <select id="selectMembrosProjetosMembros" class="form-control selectpicker" multiple>
                              @foreach($membros as $membro)
                                  <option value="{{ $membro->id }}">{{ $membro->name.' - '.$membro->cargo->nome}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="selectMembrosProjetosCliente" class="font-weight-bold">Cliente</label>

                          <select id="selectMembrosProjetosCliente" class="form-control selectpicker filter-input-membro-projeto" multiple>
                              @foreach($clientes as $cliente)
                                  <option value="{{ $cliente->id }}">{{ $cliente->nome}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-4">
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Tipo de projeto</label>

                          <select id="selectProjetosTipo" class="form-control selectpicker" multiple>
                              <option value="0">Ação compartilhada</option>
                              <option value="1">Projeto de impacto</option>
                              <option value="1">Indicação</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Gestão</label>

                          <select id="selectProjetosTipo" class="form-control selectpicker" multiple>
                              <option value="0">2019-1</option>
                              <option value="0">2019-2</option>
                              <option value="0">2020-1</option>
                              <option value="0">2020-2</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Coordenadoria</label>

                          <select id="selectProjetosTipo" class="form-control selectpicker" multiple>
                              <option value="0">Projetos</option>
                              <option value="0">Marketing</option>
                              <option value="0">Parcerias</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="container d-flex justify-content-end">
                      <button id="button-clear-filter-membro-projeto-data" class="btn btn-outline-danger">
                          <i class="fas fa-times"></i>
                          <span>limpar filtro</span>
                      </button>
                  </div>
              </div>
          </div>






          @foreach($membros as $membro)
          <div class="container-fluid pt-4 pb-2 my-2">
              <div class="row">
                      <div class="col">
                          <img style="height: 50px; width: 50px; margin-right: 10px;" src="{{ asset('images/'.$membro->profile_image) }}" class="rounded float-left" alt="{{ $projeto->gerente->name }}">
                          <div class="">
                              <h5 class="font-weight-bold" style="">{{ $membro->name.' - '.$membro->cargo->nome}}</h5>
                              <p class=""><span class="font-weight-bold">Projetos:</span> {{ count($membro->projetos) }} (1 na gestão Atual) <span class="font-weight-bold">Média NPS:</span> 8</p>
                          </div>
                      </div>

                      <div class="col-auto">
                          <div class="btn-group">
                              <button class="btn btn-danger"></button>
                          </div>
                      </div>
              </div>
          </div>
          <div class="table-responsive mb-5">
              <table id="tabela-projetos" class="table table-md table-striped table-hover">
                  <thead>
                  <tr>
                      <th class="align-middle" scope="col">Contrato</th>
                      <th class="align-middle" scope="col">Nome do projeto</th>
                      <th class="align-middle" scope="col">Tipo de serviço</th>
                      <th class="align-middle" scope="col">Função</th>
                      <th class="align-middle" scope="col">Gerente</th>
                      <th class="align-middle" scope="col">Gestão</th>
                      <th class="align-middle" scope="col">NPS</th>
                      <th class="align-middle" scope="col">Término previsto</th>
                      <th class="align-middle" scope="col">Status</th>
                      <th class="align-middle" scope="col">Ações</th>
                  </tr>
                  </thead>
                  <tbody id="projetos-table-body">
                  @if(count($membro->projetos) > 0)
                      @foreach($membro->projetos as $projeto)
                          <tr>
                              <th class="align-middle" scope="row">{{ $projeto->numero_contrato }}</th>
                              <td class="align-middle">
                                  <span>{{ $projeto->nome }}</span>
                              </td>
                              <td class="align-middle">{{ $projeto->servico->nome }}</td>
                              <td class="align-middle">{{ $projeto->pivot->funcao }}</td>
                              <td class="align-middle">
                                  <div class="membrogerentetab">
                                      <img  src="{{ asset('images/'.$projeto->gerente->profile_image) }}" class="rounded float-left" alt="{{ $projeto->gerente->name }}">
                                      <p>{{ $projeto->gerente->firstName() }}</p>
                                  </div>
                              </td>
                              <td class="align-middle">
                                  <span style="white-space: nowrap">2020-1</span>
                              </td>
                              <td class="align-middle">8.5</td>
                              <td class="align-middle">
                                  {{ $projeto->data_entrega_no_contrato }}

                                  @if( $projeto->esta_atrasado() )
                                      <button class="btn btn-sm btn-danger btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-exclamation-triangle"></i> </span> <span class="text">{{$projeto->dias_para_entrega()}} dias</span> </button>
                                  @endif
                              </td>
                              <td class="align-middle">Finalizado</td>
                              <td class="align-middle">
                                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-light seeprojectdetailspopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Ver detalhes do projeto">
                                          <i class="far fa-eye"></i>
                                      </button>
                                      @if(Auth::user()->id === $projeto->gerente->id)
                                          <a href="{{ route('projetos.gerenciar') }}" type="button" class="btn btn-secondary manageprojectpopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Gerenciar projeto">
                                              <i class="fas fa-tasks"></i>
                                          </a>
                                      @endif
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                  @else
                      <tr>
                          <td colspan="42"><h4>{{ $membro->firstName() }} ainda não participou de nenhum projeto</h4></td>
                      </tr>
                  @endif
                  </tbody>
              </table>
          </div>

          @endforeach
      </div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">..3.</div>
  </div>

  <div class="container row ml-2 mt-4">
      <!-- primeiro modal inicio" -->
      <div class="modal fade" id="novoProjetoModal" tabindex="-1" role="dialog" aria-labelledby="novoProjetoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="novoProjetoModalLabel">Novo Projeto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                              <label class="col-form-label">Nome do Projeto</label>
                              <input id="input-projeto" type="text" class="form-control">
                          </div>
                          <div class="form-row">
                              <div class="col">
                                  <label class="col-form-label">Data de Início</label>
                                  <input id="input-data-inicio" type="date" class="form-control">
                              </div>
                              <div class="col">
                                  <label class="col-form-label">Término Previsto</label>
                                  <input id="input-data-termino" type="date" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-form-label" for="Cliente">Cliente</label>
                              <select class="form-control btn-light select-cliente" id="selectCliente">
                                  <option>Selecionar...</option>
                                  <option>Cliente 1</option>
                                  <option>Cliente 2</option>
                                  <option>Cliente 3</option>
                                  <option>Cliente 4</option>
                                  <option>Cliente 5</option>
                              </select>
                          </div>
                          <div class="form-row">
                              <div class="col">
                                  <label class="col-form-label">Número do Contrato</label>
                                  <input type="text" id="input-contrato" class="form-control">
                              </div>
                              <div class="col">
                                  <label class="col-form-label">Anexo do Contrato</label>
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-form-label" for="Gerent">Gerente</label>
                              <select class="form-control btn-light select-gerente" id="selectGerente">
                                  <option>Selecionar...</option>
                                  <option value="0">Gerente 1</option>
                                  <option value="1">Gerente 2</option>
                                  <option value="2">Gerente 3</option>
                              </select>
                          </div>
                          <div class="container row">
                              <label class="col-form-label" for="Equipe">Equipe</label>
                          </div>
                          <div class="form-group">
                              <select id="selectEquipe" class="selectpicker" multiple>
                                  <optgroup label="Projetos" data-max-options="3">
                                      <option value="0">Bia</option>
                                      <option value="1">Mu</option>
                                      <option value="2">Igor</option>
                                  </optgroup>
                              </select>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" id="botao-projeto" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#etapasDoProjetoModal">
                          Etapas do projeto
                      </button>
                  </div>
              </div>
          </div>
      </div>
      <!-- primeiro modal fim" -->
      <!-- segundo modal inicio" -->
      <div class="modal fade" id="etapasDoProjetoModal" tabindex="-1" role="dialog" aria-labelledby="etapasDoProjetoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="etapasDoProjetoModalLabel">Etapas do Projeto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="container row">
                          <label class="col-form-label">Nome da Etapa</label>
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" id="input-etapa" class="form-control" aria-describedby="basic-addon1">
                          <div class="input-group-prepend">
                              <button id="botao-etapa" type="button" class="btn btn-success mb-2"><i class="fas fa-plus"></i></button>
                          </div>
                      </div>
                      <div class="row">
                          <div id="lista-etapa" class="container"></div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">
                          Salvar
                      </button>
                  </div>
              </div>
          </div>
      </div>
      <!-- segundo modal fim" -->
  </div>
    <script>
        $(function () {
            $('.seeprojectdetailspopover').popover({
                trigger: 'hover'
            })

            $('.manageprojectpopover').popover({
                trigger: 'hover'
            })

            let projectFilterVisible = false;
            let userProjectFilterVisible = false;

            // Função para exibir/ocultar o painel com filtros de projetos
            const toggleFilterPanel = () => {
                if(projectFilterVisible){
                    // Faz com que a a DIV com o filtro suma
                    $('#project-filter-container').addClass('d-none');

                    $('#button-show-project-filter > i').attr('class', "fas fa-filter")
                    $('#button-show-project-filter').attr('title', "Exibir filtros avançados")

                    projectFilterVisible = false;
                }else{
                    // Faz com que a a DIV com o filtro apareca
                    $('#project-filter-container').removeClass('d-none');

                    $('#button-show-project-filter > i').attr('class', "fas fa-chevron-up")
                    $('#button-show-project-filter').attr('title', "Ocultar filtros avançados")
                    projectFilterVisible = true;
                }
            }

            // Função para exibir/ocultar o painel com filtros de usuarios em projetos
            const toggleUserProjectFilterPanel = () => {
                if(userProjectFilterVisible){
                    // Faz com que a a DIV com o filtro suma
                    $('#user-project-filter-container').addClass('d-none');

                    $('#button-toggle-advanced-member-project-filter > i').attr('class', "fas fa-filter")
                    $('#button-toggle-advanced-member-project-filter').attr('title', "Exibir filtros avançados")

                    userProjectFilterVisible = false;
                }else{
                    // Faz com que a a DIV com o filtro apareca
                    $('#user-project-filter-container').removeClass('d-none');

                    $('#button-toggle-advanced-member-project-filter > i').attr('class', "fas fa-chevron-up")
                    $('#button-toggle-advanced-member-project-filter').attr('title', "Ocultar filtros avançados")
                    userProjectFilterVisible = true;
                }
            }

            $('#button-show-project-filter').click(() => {
                toggleFilterPanel()
            })

            $('#button-toggle-advanced-member-project-filter').click(() => {
                toggleUserProjectFilterPanel()
            })

            const limparFiltros = () => {
                $('#selectProjetosServico').val([]);
                $('button[data-id="selectProjetosServico"]').attr('title', 'Nada selecionado');
                $('button[data-id="selectProjetosServico"] div.filter-option-inner-inner').html('Nada selecionado');

                $('#selectProjetosGerente').val([])
                $('button[data-id="selectProjetosGerente"]').attr('title', 'Nada selecionado');
                $('button[data-id="selectProjetosGerente"] div.filter-option-inner-inner').html('Nada selecionado');

                $('#selectProjetosCliente').val([])
                $('button[data-id="selectProjetosCliente"]').attr('title', 'Nada selecionado');
                $('button[data-id="selectProjetosCliente"] div.filter-option-inner-inner').html('Nada selecionado');

                $('input#input-buscar-projeto').val('')
                $('input#input-buscar-projeto').focus()

                toggleFilterPanel()
                fetch_customer_data()
                $('#button-show-project-filter').attr('class', "btn btn-outline-secondary")
            }

            const limparFiltrosUserProject = () => {
                $('#selectMembrosProjetosServico').val([]);

                $('button[data-id="selectMembrosProjetosServico"]').attr('title', 'Nada selecionado');
                $('button[data-id="selectMembrosProjetosServico"] div.filter-option-inner-inner').html('Nada selecionado');

                $('#selectMembrosProjetosGerente').val([])
                $('button[data-id="selectMembrosProjetosGerente"]').attr('title', 'Nada selecionado');
                $('button[data-id="selectMembrosProjetosGerente"] div.filter-option-inner-inner').html('Nada selecionado');

                $('#selectMembrosProjetosCliente').val([])
                $('button[data-id="selectMembrosProjetosCliente"]').attr('title', 'Nada selecionado');
                $('button[data-id="selectMembrosProjetosCliente"] div.filter-option-inner-inner').html('Nada selecionado');




                $('input#input-buscar-membro-projeto').val('')
                $('input#input-buscar-membro-projeto').focus()


                toggleUserProjectFilterPanel()
                $('#button-toggle-advanced-member-project-filter').attr('class', "btn btn-outline-secondary")
            }

            $('#button-clear-filter-data').on('click', () => {
                limparFiltros()
            })

            $('#button-clear-filter-membro-projeto-data').on('click', () => {
                limparFiltrosUserProject()
            })

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('projetos.search.do') }}",
                    method:'GET',
                    data:{
                        query:query,
                        servicos: JSON.stringify($('#selectProjetosServico').val()),
                        gerentes: JSON.stringify($('#selectProjetosGerente').val()),
                        clientes: JSON.stringify($('#selectProjetosCliente').val())
                    },
                    dataType:'json',
                    beforeSend: function(){
                        $('#projetos-table-body').html("<tr> <td colspan='9'><i class='fas fa-3x fa-spin fa-sync'></i></td> </tr>");
                    },
                    success:function(data)
                    {
                        $('#projetos-table-body').html(data.table_data);
                        $('#qtd-resultado-busca').text("Foram encontrados "+data.total_data+" projetos");
                    },
                    complete: function (data) {
                        console.log("aaaa", data)
                    }
                })
            }

            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            $('input#input-buscar-projeto').keyup(function() {
                delay(() => {
                    let query = $(this).val();
                    fetch_customer_data(query);

                    if(query !== ""){
                        $('#button-show-project-filter').attr('class', "btn btn-danger")
                    }else{
                        $('#button-show-project-filter').attr('class', "btn btn-outline-secondary")
                    }
                }, 1000 );
            });

            $('.filter-input').on('change', function () {
                delay(() => {
                    let query = $('input#input-buscar-projeto').val();
                    fetch_customer_data(query);
                    $('#button-show-project-filter').attr('class', "btn btn-danger")
                }, 1500 );
            })
        })
    </script>
@endsection
