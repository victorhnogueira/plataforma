@extends('layouts.basetemplate.index.blade.php')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-white">
        <div class="container">
            <h1 class="display-4">Mini Capacitações</h1>
            <p class="lead">Listagem das capacitações</p>
        </div>
    </div>

    <div class="d-flex mb-3 justify-content-between align-items-end">
        <div>
            <label for="basic-url">Procurar capacitação</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-primary">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <input placeholder="Nome da capacitação" type="text" class="form-control" name="search" id="search" aria-describedby="basic-addon3">
            </div>
        </div>
        <a href="{{route('capacitacoes.materiaisapoio.novo')}}" class="btn btn-success h-100">
            <i class="fas fa-plus"></i>
            <span>Novo documento</span>
        </a>
    </div>

    <hr />
    <p id="qtd-resultado-busca"></p>
    <div id="tabela-materiais" class="row row-cols-1 row-cols-md-4">
        @foreach($materiais as $material)
            <div class="col mb-4">
                <div class="card h-100" >
                    <img class="card-img-top" src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/114119751/original/fbd12e929bae2bc448cc5ed6165c4b432aa6f81d/do-your-wordpress-site-migration.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title">{{ $material->titulo  }}</h6>
                        <p class="card-text">{{ $material->descricao  }} </p>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
                            <a href="{{route('capacitacoes.materiaisapoio.showitem', ['materialDeApoio' => $material->id])}}" class="btn btn-primary">Ver detalhes</a>
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-plus" ></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function(){

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('capacitacoes.materiaisapoio.search.do') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#tabela-materiais').html(data.table_data);
                        $('#qtd-resultado-busca').text("Foram encontrados "+data.total_data+" correspondencias");
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>

@endsection
