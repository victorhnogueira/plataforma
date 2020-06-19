@extends('layouts.basetemplate.index')

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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#novoProjetoModal">Novo projeto</button>
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
      jQuery(function ($) {

          /* CÓDIGO P DEIXA O POPUP MODAL ABERTO */
          //$("#etapasDoProjetoModal").css("display", "block")
          //$("#etapasDoProjetoModal").addClass("show")
          /* FIM CÓDIGO P DEIXA O POPUP MODAL ABERTO */


// Primeiro Modal


          // Manipulação dos Projetos

          let projeto_name = $('#input-projeto').val();
          let projeto_inicio = $('#input-data-inicio').val();
          let projeto_termino = $('#input-data-termino').val();
          let projeto_cliente = $('#selectCliente').val();
          let projeto_contrato = $('#input-contrato').val();
          let projeto_gerente = $('#selectGerente').val();
          let projeto_equipe = $('#selectEquipe').val();

          var novoProjeto = {
              nome: projeto_name,
              inicio: projeto_inicio,
              termino: projeto_termino,
              cliente: projeto_cliente,
              contrato: projeto_contrato,
              gerente: projeto_gerente,
              equipe: projeto_equipe,
              etapas: []
          }

          // Adicionar novo projeto no array

          $("#botao-projeto").click(() =>{
              //Colocar validação e mudar troca de modal
          });


// Segundo Modal


          // Manipulação das etapas

          var etapas = [];

          // Criar nova etapa quando clicar no botão

          $("#botao-etapa").click(() =>{
              const etapa_name = $('#input-etapa').val();
              const novaEtapa = {
                  nome: etapa_name,
                  inicio: "",
                  termino: "",
                  responsavel: 0,
                  importancia: 0,
                  subetapas: []
              }
              cadastrarEtapa(novaEtapa);
          });

          // Criar nova subetapa quando clicar no botão

          $(document).on("click" , "button.botao-subetapa" , function() {

              const etapa = $(this).attr('data-id');

              etapas[parseInt(etapa)].subetapas = [
                  ...etapas[parseInt(etapa)].subetapas,
                  {
                      nome: "subetapa",
                      inicio: "",
                      termino: "",
                      responsavel: 0,
                      importancia: 0
                  }
              ]
              listarEtapas();
          })

          // Cadastrar etapa no array

          const cadastrarEtapa = (novaEtapa) => {
              etapas.push(novaEtapa);
              listarEtapas();
          }

          // Listar etapas

          const listarEtapas = () => {
              novoProjeto = {
                  ...novoProjeto,
                  etapas:etapas
              }

              document.querySelector("#lista-etapa").innerHTML = "";
              let today = new Date();
              let dd = today.getDate();
              let mm = today.getMonth()+1; //January is 0!
              let yyyy = today.getFullYear();
              if(dd<10){
                  dd='0'+dd
              }
              if(mm<10){
                  mm='0'+mm
              }

              today = yyyy+'-'+mm+'-'+dd;

              console.log(etapas)

              const listarSubEtapasAA = (idx) => {
                  let retorno = "";
                  etapas[idx].subetapas.forEach((itemB, indexB) => {
                      retorno += '<div data-id="'+indexB+'" class="container row ml-1">\
                                  <label class="col-form-label">'+itemB.nome+'</label>\
                                </div>\
                                <div class="col-md-6">\
                                    <div class="d-flex">\
                                        <select data-id="'+indexB+'" value="'+itemB.importancia+'" class="select-important2 form-control form-control-sm btn-light">\
                                            <option value="0" '+(itemB.importancia == "0"?"selected":"")+'>Importancia</option>\
                                            <option value="1" '+(itemB.importancia == "1"?"selected":"")+'>No seu tempo</option>\
                                            <option value="2" '+(itemB.importancia == "2"?"selected":"")+'>Comum</option>\
                                            <option value="3" '+(itemB.importancia == "3"?"selected":"")+'>Urgente</option>\
                                        </select>\
                                        <select data-id="'+indexB+'" value="'+itemB.responsavel+'" class="select-responsavel2 form-control form-control-sm btn-light">\
                                            <option value="0" '+(itemB.responsavel == "0"?"selected":"")+'>Responsavel</option>\
                                            <option value="1" '+(itemB.responsavel == "1"?"selected":"")+'>Responsavelzinho</option>\
                                            <option value="2" '+(itemB.responsavel == "2"?"selected":"")+'>Responsavelzinho2</option>\
                                            <option value="3" '+(itemB.responsavel == "3"?"selected":"")+'>Irresponsavel</option>\
                                        </select>\
                                    </div>\
                                </div>\
                                <div class="col-md-5 d-flex align-items-center">\
                                    <div class="row">\
                                      <input data-id="'+indexB+'" min="'+today+'" value="'+itemB.inicio+'" type="date" class="form-control form-control-sm col-md-6 input-data-inicio-subetapa">\
                                      <input data-id="'+indexB+'" min="'+today+'" value="'+itemB.termino+'" type="date" class="form-control form-control-sm col-md-6 input-data-termino-subetapa">\
                                    </div>\
                                </div>\
                                <div class="col-md-1">\
                                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">\
                                    <button type="button" class="btn btn-danger">\
                                      <i class="fas fa-times"></i>\
                                    </button>\
                                  </div>\
                                </div>'
                  });
                  return retorno;
              }

              etapas.map((item, index) => {
                  document.querySelector("#lista-etapa").innerHTML += '\
                                <div data-id="'+index+'" class="row">\
                                  <div class="col-12">\
                                     <label class="col-form-label">'+item.nome+'</label>\
                                  </div>\
                                </div>\
                                <div class="row">\
                                  <div class="col-6">\
                                      <div class="d-flex">\
                                          <select data-id="'+index+'" value="'+item.importancia+'" class="select-important form-control form-control-sm btn-light">\
                                              <option value="0" '+(item.importancia == "0"?"selected":"")+'>Importancia</option>\
                                              <option value="1" '+(item.importancia == "1"?"selected":"")+'>No seu tempo</option>\
                                              <option value="2" '+(item.importancia == "2"?"selected":"")+'>Comum</option>\
                                              <option value="3" '+(item.importancia == "3"?"selected":"")+'>Urgente</option>\
                                          </select>\
                                          <select data-id="'+index+'" value="'+item.responsavel+'" class="select-responsavel form-control form-control-sm btn-light">\
                                              <option value="0" '+(item.responsavel == "0"?"selected":"")+'>Responsavel</option>\
                                              <option value="1" '+(item.responsavel == "1"?"selected":"")+'>Responsavelzinho</option>\
                                              <option value="2" '+(item.responsavel == "2"?"selected":"")+'>Responsavelzinho2</option>\
                                              <option value="3" '+(item.responsavel == "3"?"selected":"")+'>Irresponsavel</option>\
                                          </select>\
                                      </div>\
                                  </div>\
                                  <div class="col-auto" style="width:300px;">\
                                      <div class="row">\
                                        <input data-id="'+index+'" min="'+today+'" value="'+item.inicio+'" type="date" class="form-control form-control-sm col-md-6 input-data-inicio-etapa">\
                                        <input data-id="'+index+'" min="'+today+'" value="'+item.termino+'" type="date" class="form-control form-control-sm col-md-6 input-data-termino-etapa">\
                                      </div>\
                                  </div>\
                                  <div class="col-auto d-flex flex-row">\
                                      <button type="button" data-id="'+index+'" class="btn btn-success btn-sm botao-subetapa">\
                                        <i class="fas fa-plus"></i>\
                                      </button>\
                                      <button type="button" class="btn btn-sm btn-danger">\
                                        <i class="fas fa-times"></i>\
                                      </button>\
                                  </div>\
                                </div>\
                                <div class="row lista-subetapa container">'+listarSubEtapasAA(index)+'</div>'
              });
          }

          // Atualizar etapa quando importancia é selecionado

          $(document).on("change" , "select.select-important" , function()
          {
              let etapa_importancia = $(this).find(":selected").attr("value")
              let index_etapa = $(this).attr("data-id")
              let atualizaEtapa = etapas.map( (item, index) => {
                  if (index === parseInt(index_etapa)) {
                      return {
                          ...item,
                          importancia:etapa_importancia
                      }
                  }
                  return item
              })
              etapas = atualizaEtapa
          });

          // Atualizar etapa quando responsável é selecionado

          $(document).on("change" , "select.select-responsavel" , function()
          {
              let etapa_responsavel = $(this).find(":selected").attr("value")
              let index_etapa = $(this).attr("data-id")
              let atualizaEtapa = etapas.map( (item, index) => {
                  if (index === parseInt(index_etapa)) {
                      return {
                          ...item,
                          responsavel:etapa_responsavel
                      }
                  }
                  return item
              })
              etapas = atualizaEtapa
          });

          // Atualizar etapa quando data inicio é selecionado

          $(document).on("change" , "input.input-data-inicio-etapa" , function()
          {
              let data_inicio = $(this).val()
              let index_etapa = $(this).attr("data-id")
              let atualizaEtapa = etapas.map( (item, index) => {
                  if (index === parseInt(index_etapa)) {
                      return {
                          ...item,
                          inicio:data_inicio
                      }
                  }
                  return item
              })
              etapas = atualizaEtapa
          });

          // Atualizar etapa quando data termino é selecionado

          $(document).on("change" , "input.input-data-termino-etapa" , function()
          {
              let data_termino = $(this).val()
              let index_etapa = $(this).attr("data-id")
              let atualizaEtapa = etapas.map( (item, index) => {
                  if (index === parseInt(index_etapa)) {
                      return {
                          ...item,
                          termino:data_termino
                      }
                  }
                  return item
              })
              etapas = atualizaEtapa
          });


// Limitando data de inicio e de termino...


          //Para o Projeto

          $("#input-data-inicio").click(function() {
              let today = new Date();
              let dd = today.getDate();
              let mm = today.getMonth()+1; //January is 0!
              let yyyy = today.getFullYear();
              if(dd<10){
                  dd='0'+dd
              }
              if(mm<10){
                  mm='0'+mm
              }

              today = yyyy+'-'+mm+'-'+dd;
              document.getElementById("input-data-inicio").setAttribute("min", today);
          });

          $("#input-data-termino").click(function() {
              let inicio = $('#input-data-inicio').val();
              $("#input-data-termino").attr("min", inicio);
          });

          //Para as Etapas

          $(document).on("change" , "input.input-data-inicio-etapa" , function() {
              let inicio = $(this).val();
              let index_etapa = $(this).attr("data-id");
              $('.input-data-termino-etapa[data-id="'+index_etapa+'"]').attr("min", inicio).val("");
          })

          //Para as SubEtapas

          $(document).on("change" , "input.input-data-inicio-subetapa" , function() {
              let inicio = $(this).val();
              let index_etapa = $(this).attr("data-id");
              $('.input-data-termino-subetapa[data-id="'+index_etapa+'"]').attr("min", inicio).val("");
          })


      });
  </script>
@endsection
