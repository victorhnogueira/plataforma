@extends('layouts.basetemplate.index')

@section('content')

<style>
      .estilo-botao{
       margin-top:30px;
       margin-bottom: 30px;
       margin-right: 20px;
       background-color:#DC3545;
       border-color:#DC3545;

      }

      .menu{
        width:100%;
        padding:30px;

        border-bottom-style: solid;
        border-bottom-color: #C3C3C3;
        font-size:20px;
        font-family:"Segoe UI";
        align:justify;
        background-color: #eeeeee;
        border-radius:5px;

      }
      .estilo-botao:hover{
        background-color: #800000;
        border-color: #800000;
      }

      .btn-adicionar{
        background-color: #27bc9c;
        height: 25px;
        width: 15px;
        margin-bottom: 2px;
        border-radius: 100%;
        text-align: center;
        border-color: #27bc9c;
      }

      .texto-mais{
        margin-top: -8px;
        margin-left: -5.5px;
      }

      .btn-editar-arquivos{
        border-radius: 10px;
        font-size: 16px;
        background-color: #1060b3;
        border-color: #1060b3;
        margin-top: 20px;
      }

      .btn-editar-dados{
        border-radius: 10px;
        font-size: 16px;
        background-color: #1060b3;
        border-color: #1060b3;
        margin-top: 20px;
      }

      .menu2{
        background-color: #1060B3;
        border-color:#1060B3;
      }

      .menu2:hover{
        background-color: #073A7D;
        border-color: #073A7D;
      }
</style>






<!-- Dados do projeto -->
<div class="menu">
      <button type="button" class="btn btn-primary btn-adicionar" data-toggle="modal" data-target="#criarModalDados" style="margin-right: 10px"><p class="texto-mais">+</p></button>
      <text>Dados do projeto</text>
        <div id="lista-dados">
       </div>

</div>

<!-- Criador de Modal Dados -->
<div class="modal fade" id="criarModalDados" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Novos Dados </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form>
      <div class="form-group">
        <label for="exampleFormControlInput1">Título</label>
        <input type="text" class="form-control" id="titulo-modal-dados" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição:</label>
        <textarea class="form-control" id="descricao-modal-dados" rows="3"></textarea>
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="botao-criar-modal-dados" type="button" class="btn btn-primary menu2">Criar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editarModalDados" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Dados </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form>
      <div class="form-group">
        <label for="exampleFormControlInput1">Título</label>
        <input type="text" class="form-control" id="titulo-modal-editarDados" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição:</label>
        <textarea class="form-control" id="descricao-modal-editarDados" rows="3"></textarea>
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="botao-criar-modal-dados" type="button" class="btn btn-primary menu2">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Arquivos -->

  <div class="menu">
  <button type="button" class="btn btn-primary btn-adicionar"  data-toggle="modal" data-target="#criarModalArquivos" style="margin-right: 10px"><p class="texto-mais">+</p></button>
         <text>Arquivos do projeto</text>
            <div id="lista-arquivos">
           </div>
   </div>


<!-- Modal dos Arquivos -->
<div class="modal fade" id="criarModalArquivos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Novos Dados </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form>
      <div class="form-group">
        <label for="exampleFormControlInput1">Título</label>
        <input type="text" class="form-control" id="titulo-modal-arquivos" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição:</label>
        <textarea class="form-control" id="descricao-modal-arquivos" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Enviar Arquivo</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="botao-criar-modal-arquivos" type="button" class="btn btn-primary menu2">Criar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editarModalArquivos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Arquivos </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Título</label>
            <input type="text" class="form-control" id="titulo-modal-editarArquivos" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição:</label>
            <textarea class="form-control" id="descricao-modal-editarArquivos" rows="3"></textarea>
          </div>
        </form>
        <a class="btn btn-primary" href="https://statig1.akamaized.net/bancodeimagens/5i/6x/4l/5i6x4ly396q2ioenmxznv4zd3.jpg" target="_blank" role="button">Baixar Arquivo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="botao-criar-modal-arquivos" type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
<!-- Etapas do Projeto -->

<!-- Progresso do Projeto -->
<div class="progress" style="height: 25px;">
  <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>

<!-- Finalizar Projeto -->

<!-- Modal Finalizar Projeto -->
<div class="modal fade" id="encerrarProjeto" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Encerrar Projeto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form>
      <div class="form-group">
        <label for="exampleFormControlInput1">NPS</label>
        <input type="text" class="form-control" id="titulo-modal-finalizar">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Observações</label>
        <textarea class="form-control" id="finalizar-projeto-modal" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Anexar Termo de Encerramento:</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="botao-criar-modal" type="button" class="btn btn-primary">Finalizar Projeto</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cancelar projeto -->
<div class="modal fade" id="cancelarProjeto" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cancelar Projeto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Justificativa</label>
        <textarea class="form-control" id="cancelar-projeto-modal" rows="3"></textarea>
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="botao-criar-modal" type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>


  <div>
  <button class="btn btn-primary estilo-botao" type="button"  data-toggle="modal" data-target="#encerrarProjeto">Finalizar projeto</button>
  <button class="btn btn-primary estilo-botao" type="submit" data-toggle="modal" data-target="#cancelarProjeto">Cancelar projeto</button>

  </div>

<script>
    jQuery(function ($) {
        //Funções dados do projeto
        var lista_dados = []

        const printa_dados = () => {
            document.querySelector("#lista-dados").innerHTML = ''
            lista_dados.map((item, index) => {
                document.querySelector("#lista-dados").innerHTML += '<button class="btn btn-primary btn-editar-dados" data-toggle="modal" data-target="#editarModalDados" data-dadoIndex="'+index+'">'+item.titulo+'</button>'
            })
        }

        const atualiza_modal_dados = (index_dado) => {
            var dados_em_edicao = lista_dados.filter((item, index) => {
                if(index == index_dado){
                    return item
                }
            })
            $("#titulo-modal-editarDados").val(dados_em_edicao[0].titulo)
            $("#descricao-modal-editarDados").val(dados_em_edicao[0].descricao)
        }
        $(document).on("click" , ".btn-editar-dados" , function()
        {
            var index_dado = $(this).attr("data-dadoIndex")
            atualiza_modal_dados(index_dado)
        });

        $("#botao-criar-modal-dados").click(() =>{
            const titulo_modal = $('#titulo-modal-dados').val();
            const descricao_modal = $('#descricao-modal-dados').val();
            lista_dados.push({titulo: titulo_modal, descricao: descricao_modal})
            printa_dados()
        });

        //Funções arquivos do projeto
        var lista_arquivos = []

        const printa_arquivos = () => {
            document.querySelector("#lista-arquivos").innerHTML = ''
            lista_arquivos.map((item, index) => {
                document.querySelector("#lista-arquivos").innerHTML += '<button class="btn btn-primary btn-editar-arquivos" data-toggle="modal" data-target="#editarModalArquivos" data-arquivoIndex="'+index+'">'+item.titulo+'</button>'
            })
        }

        const atualiza_modal_arquivos = (index_arquivo) => {
            var arquivos_em_edicao = lista_arquivos.filter((item, index) => {
                if(index == index_arquivo){
                    return item
                }
            })
            $("#titulo-modal-editarArquivos").val(arquivos_em_edicao[0].titulo)
            $("#descricao-modal-editarArquivos").val(arquivos_em_edicao[0].descricao)
        }
        $(document).on("click" , ".btn-editar-arquivos" , function()
        {
            var index_arquivo = $(this).attr("data-arquivoIndex")
            atualiza_modal_arquivos(index_arquivo)
        });

        $("#botao-criar-modal-arquivos").click(() =>{
            const titulo_modal = $('#titulo-modal-arquivos').val();
            const descricao_modal = $('#descricao-modal-arquivos').val();
            lista_arquivos.push({titulo: titulo_modal, descricao: descricao_modal})
            printa_arquivos()
        });
    });
</script>

@endsection
