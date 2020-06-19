@extends('layouts.basetemplate.index')

@section('content')
        <div class="row">
            <div class="col-sm-3"><!--left col-->

                <div class="text-center">
                    <img src="{{ asset('images/victor.png') }}" class="avatar img-circle img-thumbnail" alt="avatar">
                </div><hr/>
                <ul class="list-group">
                    <a class="list-group-item text-right" href="http://127.0.0.1:8000/perfil/mostrar"><span class="pull-left perfil"><strong>Perfil</strong></span></a>
                    <a class="list-group-item text-right" href="#"><span class="pull-left"><strong>Notas</strong></span></a>
                    <a class="list-group-item text-right" href="http://127.0.0.1:8000/projetos/detalhes"><span class="pull-left"><strong>Ponto</strong></span></a>
                    <a class="list-group-item text-right" href="#"><span class="pull-left"><strong>Projetos executados</strong></span></a>
                    <a class="list-group-item text-right" href="#"><span class="pull-left"><strong>Advertências</strong></span></a>
                </ul>
            </div>
            <div class="card col-sm-9 text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Ativo</a>
                        </li>
                        <!--<li class="nav-item">
                          <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href="#">Desativado</a>
                        </li>-->
                      </ul>
                </div>
                <div class="tab-content">
                    <ul class="list-group-flush">
                        <li class="list-group text-left"><h5><b>Nome: </b></h5><h6>{{ Auth::user()->name }}</h6></li>
                        <li class="list-group text-left"><h5><b>Cargo: </b></h5><h6>Diretor de Projetos</h6></li>
                        <li class="list-group text-left"><h5><b>email: </b></h5><h6>marcusmeireles@conselt.com.br</h6></li>
                        <li class="list-group text-left"><h5><b>Matrícula: </b></h5><h6>11811EBI006</h6></li>
                        <li class="list-group text-left"><h5><b>endereço: </b></h5><h6>Rua: Coronel Antônio Alves Pereira 2200 ap 203, Uberlândia, MG</h6></li><hr/>
                        <button class="btn btn-success disable" data-toggle="modal" data-target="#atualizarperfil"><i class="glyphicon"></i>Atualiar perfil</button>
                    </ul>
                </div>
                <div class="modal fade" id="atualizarperfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Atualizar perfil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="inputAddress">Endereço</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Rua, nº">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress2">Endereço 2</label>
                                        <input type="text" class="form-control" id="inputAddress2" placeholder="complemento, bairro">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Cidade</label>
                                            <input type="text" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEstado">Estado</label>
                                            <select id="inputEstado" class="form-control">
                                                <option selected>Escolher...</option>
                                                <option>Minas Gerais</option>
                                                <option>São Paulo</option>
                                                <option>Rio de Janeiro</option>
                                                <option>Espírito Santo</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputCEP">CEP</label>
                                            <input type="text" class="form-control" id="inputCEP">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
