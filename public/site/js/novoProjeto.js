jQuery(function ($) {
    /* CÓDIGO P DEIXA O POPUP MODAL ABERTO */
    // $("#etapasDoProjetoModal").css("display", "block")
    // $("#etapasDoProjetoModal").addClass("show")
    /* FIM CÓDIGO P DEIXA O POPUP MODAL ABERTO */

    // Declarando Variáveis

    let projeto_name = $('#input-projeto').val();
    let projeto_inicio = $('#input-data-inicio').val();
    let projeto_termino = $('#input-data-termino').val();
    let projeto_cliente = $('#selectCliente').val();
    let projeto_contrato = $('#input-contrato').val();
    let projeto_gerente = $('#selectGerente').val();
    let projeto_equipe = $('#selectEquipe').val();

    // var etapas = [];
    var etapas = [
        {
            nome: "aaaaaahh",
            inicio: "",
            termino: "",
            responsavel: 0,
            importancia: 0,
            subetapas: []
        },{
            nome: "aaaaaahh",
            inicio: "",
            termino: "",
            responsavel: 0,
            importancia: 0,
            subetapas: [
                {
                    nome: "bbbbbbhhhh",
                    inicio: "",
                    termino: "",
                    responsavel: 0,
                    importancia: 0,
                    subetapas: []
                },{
                    nome: "bbbbbbhhhh",
                    inicio: "",
                    termino: "",
                    responsavel: 0,
                    importancia: 0,
                    subetapas: [
                        {
                            nome: "ccccchhhhh",
                            inicio: "",
                            termino: "",
                            responsavel: 0,
                            importancia: 0,
                            subetapas: []
                        },{
                            nome: "ccccchhhhh",
                            inicio: "",
                            termino: "",
                            responsavel: 0,
                            importancia: 0,
                            subetapas: []
                        },
                    ]
                },{
                    nome: "bbbbbbhhhh",
                    inicio: "",
                    termino: "",
                    responsavel: 0,
                    importancia: 0,
                    subetapas: []
                },
            ]
        },{
            nome: "aaaaaahh",
            inicio: "",
            termino: "",
            responsavel: 0,
            importancia: 0,
            subetapas: []
        },{
            nome: "aaaaaahh",
            inicio: "",
            termino: "",
            responsavel: 0,
            importancia: 0,
            subetapas: []
        },
    ]

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

    // Função para cadastrar etapa no array

    const cadastrarEtapa = (novaEtapa) => {
        etapas.push(novaEtapa);
        listarEtapas();
    }

    // Função para listar array de etapas

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

        const listarSubEtapas = (idxA) => {
            let retorno = "";
            etapas[idxA].subetapas.forEach((itemB, indexB) => {


                const listarSubEtapasNv2 = (idxC) => {
                    let retorno = "";

                    if(etapas[idxA].subetapas.length >= 1 && etapas[idxA].subetapas[idxC].subetapas.length >= 1){
                        etapas[idxA].subetapas[idxC].subetapas.forEach((itemC, indexC) => {
                            retorno += '<div style="border-left:dashed 1px #ccc;"><div data-id="'+indexC+'" class="container row ml-1">\
                                        <label class="col-form-label">'+itemC.nome+'</label>\
                                      </div>\
                                      <div class="container row">\
                                        <div class="col-md-6">\
                                            <div class="d-flex">\
                                                <select data-id="'+indexC+'" value="'+itemC.importancia+'" class="select-important2 form-control form-control-sm btn-light">\
                                                    <option value="0" '+(itemC.importancia == "0"?"selected":"")+'>Importancia</option>\
                                                    <option value="1" '+(itemC.importancia == "1"?"selected":"")+'>No seu tempo</option>\
                                                    <option value="2" '+(itemC.importancia == "2"?"selected":"")+'>Comum</option>\
                                                    <option value="3" '+(itemC.importancia == "3"?"selected":"")+'>Urgente</option>\
                                                </select>\
                                                <select data-id="'+indexC+'" value="'+itemC.responsavel+'" class="select-responsavel2 form-control form-control-sm btn-light">\
                                                    <option value="0" '+(itemC.responsavel == "0"?"selected":"")+'>Responsavel</option>\
                                                    <option value="1" '+(itemC.responsavel == "1"?"selected":"")+'>Responsavelzinho</option>\
                                                    <option value="2" '+(itemC.responsavel == "2"?"selected":"")+'>Responsavelzinho2</option>\
                                                    <option value="3" '+(itemC.responsavel == "3"?"selected":"")+'>Irresponsavel</option>\
                                                </select>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-5 d-flex align-items-center">\
                                            <div class="row">\
                                                <input data-id="'+indexC+'" min="'+today+'" value="'+itemC.inicio+'" type="date" class="form-control form-control-sm col-md-6 input-data-inicio-subetapa">\
                                                <input data-id="'+indexC+'" min="'+today+'" value="'+itemC.termino+'" type="date" class="form-control form-control-sm col-md-6 input-data-termino-subetapa">\
                                            </div>\
                                        </div>\
                                        <div class="col-md-1">\
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">\
                                            <button type="button" class="btn btn-danger">\
                                                <i class="fas fa-times"></i>\
                                            </button>\
                                            </div>\
                                        </div>\
                                      </div>\
                                      </div>'
                        });
                    }

                    return retorno;
                }


                retorno += '<div style="border-left:dashed 1px #ccc;"><div data-id="'+indexB+'" class="container row ml-1">\
                            <label class="col-form-label">'+itemB.nome+'</label>\
                          </div>\
                          <div class="container row">\
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
                            </div>\
                          </div>\
                          <div class="row lista-subetapa pl-4 my-3">'+listarSubEtapasNv2(indexB)+'</div>\
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
                            <div class="col-auto"  style="max-width:100%;">\
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
                            <div class="col-auto" style="max-width:100%;">\
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
                          <div class="row lista-subetapa pl-4 my-3">'+listarSubEtapas(index)+'</div>'
        });
    }

    listarEtapas();

    // Clique do botão 'Etapas do Projeto'

    $("#botao-projeto").click(() =>{
        //Colocar validação e mudar troca de modal
    });

    // Clique do botão '+' para adicionar etapa no array

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

    // Clique do botão '+' para adicionar subetapa no array

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

    // Change do Select de Importância atualiza vetor de etapas

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

    // Change do Select do Responsável atualiza vetor de etapas

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

    // Change do Input de Data-Inicio da Etapa atualiza vetor de etapas

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

    // Change do Input de Data-Termino da Etapa atualiza vetor de etapas

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

    // Setar mínimo (data atual) do Input de Data-Inicio e Data-Termino do Projeto

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

    // Setar mínimo (data atual) do Input de Data-Inicio e Data-Termino das Etapas

    $(document).on("change" , "input.input-data-inicio-etapa" , function() {
        let inicio = $(this).val();
        let index_etapa = $(this).attr("data-id");
        $('.input-data-termino-etapa[data-id="'+index_etapa+'"]').attr("min", inicio).val("");
    })

    // Setar mínimo (data atual) do Input de Data-Inicio e Data-Termino das SubEtapas

    $(document).on("change" , "input.input-data-inicio-subetapa" , function() {
        let inicio = $(this).val();
        let index_etapa = $(this).attr("data-id");
        $('.input-data-termino-subetapa[data-id="'+index_etapa+'"]').attr("min", inicio).val("");
    })


});
