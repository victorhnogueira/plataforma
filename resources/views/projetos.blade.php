@extends('layouts.loggedtemplate')

@section('content')
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

  <script>
    $(function () {
      $('.seeprojectdetailspopover').popover({
        trigger: 'hover'
      })

      $('.manageprojectpopover').popover({
        trigger: 'hover'
      })
    })
  </script>

  <div class="jumbotron jumbotron-fluid bg-white">
    <div class="container">
      <h1 class="display-4">Projetos</h1>
      <p class="lead">Listagem dos projetos em andamento e concluidos</p>
    </div>
  </div>

  <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
              <i class="fas fa-star"></i>
              <span>Todos os Projetos</span>
          </a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Outra opção</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Outra opção</a>
      </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="d-flex justify-content-between mt-3 mb-3">
              <div class="input-group w-50">
                  <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-filter"></i></button>
                  </div>
                  <input type="text" class="form-control" placeholder="Buscar projeto..." aria-label="Example text with button addon" aria-describedby="button-addon1">
              </div>
              <div class="btn-group h-100">
                  <button type="button" class="btn btn-success">Novo projeto</button>
                  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Lançar projeto retroativo</a>
                  </div>
              </div>
          </div>
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
                  <tbody>
                  <tr>
                      <th class="align-middle" scope="row">1010</th>
                      <td class="align-middle">Udisigns</td>
                      <td class="align-middle">E-commerce</td>
                      <td class="align-middle">Cristina dos Santos Toledo</td>
                      <td class="align-middle">
                          <div class="membrogerentetab">
                              <img src="{{ asset('images/felipe.png') }}" class="rounded float-left" alt="...">
                              <p>Felipe</p>
                          </div>
                      </td>
                      <td class="align-middle">13/04/2020</td>
                      <td class="align-middle">15/05/2020</td>
                      <td class="align-middle">40%</td>
                      <td class="align-middle">
                          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-light seeprojectdetailspopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Ver detalhes do projeto">
                                  <i class="far fa-eye"></i>
                              </button>
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <th class="align-middle" scope="row">1010</th>
                      <td class="align-middle">Colégio Alternativo</td>
                      <td class="align-middle">Website</td>
                      <td class="align-middle">Cristina dos Santos Toledo</td>
                      <td class="align-middle">
                          <div class="membrogerentetab">
                              <img src="{{ asset('images/victor.png') }}" class="rounded float-left" alt="...">
                              <p>{{Auth::user()->name}}</p>
                          </div>
                      </td>
                      <td class="align-middle">13/04/2020</td>
                      <td class="align-middle">15/05/2020</td>
                      <td class="align-middle">40%</td>
                      <td class="align-middle">
                          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-light seeprojectdetailspopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Ver detalhes do projeto">
                                  <i class="far fa-eye"></i>
                              </button>
                              <button type="button" class="btn btn-secondary manageprojectpopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Gerenciar projeto">
                                  <i class="fas fa-tasks"></i>
                              </button>
                          </div>
                      </td>
                  </tr>
                  @for ($i = 0; $i < 10; $i++)
                      <tr>
                          <th class="align-middle" scope="row">101{{$i}}</th>
                          <td class="align-middle">Udisigns</td>
                          <td class="align-middle">E-commerce</td>
                          <td class="align-middle">Cristina dos Santos Toledo</td>
                          <td class="align-middle">
                              <div class="membrogerentetab">
                                  <img src="{{ asset('images/felipe.png') }}" class="rounded float-left" alt="...">
                                  <p>Felipe</p>
                              </div>
                          </td>
                          <td class="align-middle">13/04/2020</td>
                          <td class="align-middle">15/05/2020</td>
                          <td class="align-middle">
                              @if($i <= 3)
                                  40%
                              @else
                                  Finalizado
                              @endif
                          </td>
                          <td class="align-middle">
                              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-light seeprojectdetailspopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Ver detalhes do projeto">
                                      <i class="far fa-eye"></i>
                                  </button>
                              </div>
                          </td>
                      </tr>
                  @endfor
                  </tbody>
              </table>
          </div>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">.2.</div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">..3.</div>
  </div>
@endsection
