@extends('layouts.basetemplate.index')

@section('content')
    <style>
        .colorgraph {
            height: 5px;
        }
    </style>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-3">
                <form id="formulario">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <h2>Cadaste um membro</h2>
                    <hr class="colorgraph">
                    <div class="form-group">
                        <input type="text" name="Nome_completo" id="nome_completo" class="form-control input-lg" placeholder="Nome completo" tabindex="3">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="matricula" id="matricula" class="form-control input-lg" placeholder="Matrícula" tabindex="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="Cargo" id="cargo" class="form-control input-lg" placeholder="Cargo" tabindex="2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="Aniversário" id="aniversario" class="form-control input-lg" placeholder="aniversário" tabindex="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="Situação" id="situacao" class="form-control input-lg" placeholder="situação" tabindex="2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="Telefone" id="telefone" class="form-control input-lg" placeholder="telefone" tabindex="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control input-lg" placeholder="email" tabindex="2">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="nome_rua" type="text" class="form-control" id="inputAddress" placeholder="Rua, nº">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputAddress2" placeholder="complemento, bairro">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="inputCity" placeholder="Cidade">
                        </div>
                        <div class="form-group col-md-4">
                            <select name="estado">
                                <option>Estado...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="inputCEP" placeholder="CEP">
                        </div>
                    </div>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(function(){
            $('form[id="formulario"]').submit(function(event){
                event.preventDefault()

                $.ajax({
                    url:"{{ route('membros.cadastrar.do') }}",
                    type:"GET",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response){
                        console.log("OK", response);
                    },
                    error: function (response) {
                        console.log("fail:", response);
                    }
                });
            });
        });
    </script>

@endsection
