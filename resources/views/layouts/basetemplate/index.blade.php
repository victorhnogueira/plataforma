<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CONSELT') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url(mix('site/style.css')) }}" rel="stylesheet">
    <link href="{{ url(mix('site/css/sbadmin.css')) }}" rel="stylesheet">
{{--    <link href="{{ asset('site/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">--}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <!-- TREM DO FORMS DE CHECKBOX COM PESQUISA -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- FIM TREM DO FORMS DE CHECKBOX COM PESQUISA -->

    <script src="{{url(mix('site/jquery.js'))}}"></script>
    <script src="{{url(mix('site/bootstrap.js'))}}"></script>

    <!-- TREM DO FORMS DE CHECKBOX COM PESQUISA -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="http://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- FIM DO TREM DO FORMS DE CHECKBOX COM PESQUISA -->

</head>
<body>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon">
                <img height="50" width="50" src="{{ asset('images/logo-cst.png') }}" alt="..." />
            </div>
            <div class="sidebar-brand-text mx-3">CONSELT</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-indicadores" aria-expanded="true" aria-controls="collapse-indicadores">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>Indicadores</span>
            </a>
            <div id="collapse-indicadores" class="collapse" aria-labelledby="collapse-indicadores" data-parent="#accordionSidebar">
                <div class="bg-white py-1 collapse-inner rounded">
                    <a class="collapse-item" href="#">Brasil Junior</a>
                    <a class="collapse-item" href="#">Indicadores operacionais</a>
                    <a class="collapse-item" href="#">Indicadores gerenciais</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Membros -->
        <li class="nav-item">
            <a class="nav-link" href="{{ Route('membros.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Membros</span></a>
        </li>

        <!-- Nav Item - Membros -->
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="far fa-fw fa-calendar-alt"></i>
            <span>Calendário</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Diretorias
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                <i class="fas fa-fw fa-pen-nib"></i>
                <span>Presidencia Institucional</span>
            </a>
            <div id="collapse-1" class="collapse" aria-labelledby="collapse-1" data-parent="#accordionSidebar">
                <div class="bg-white py-1 collapse-inner rounded">
                    <h6 class="collapse-header">Parcerias:</h6>
                    <a class="collapse-item" href="#">Opção 01</a>
                    <a class="collapse-item" href="#">Opção 02</a>
                    <h6 class="collapse-header">Negócios:</h6>
                    <a class="collapse-item" href="#">Opção 01</a>
                    <a class="collapse-item" href="#">Opção 02</a>
                    <h6 class="collapse-header">Juridico - Financeiro:</h6>
                    <a class="collapse-item" href="#">Opção 01</a>
                    <a class="collapse-item" href="#">Opção 02</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                <i class="fas fa-fw fa-business-time"></i>
                <span>Presidencia Executiva</span>
            </a>
            <div id="collapse-2" class="collapse" aria-labelledby="collapse-2" data-parent="#accordionSidebar">
                <div class="bg-white py-1 collapse-inner rounded">
                    <h6 class="collapse-header">Gestão de pessoas:</h6>
                    <a class="collapse-item" href="#">Opção 01</a>
                    <a class="collapse-item" href="#">Opção 02</a>
                    <h6 class="collapse-header">Qualidade:</h6>
                    <a class="collapse-item" href="#">Opção 01</a>
                    <a class="collapse-item" href="#">Opção 02</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                <i class="far fa-fw fa-lightbulb"></i>
                <span>Marketing</span>
            </a>
            <div id="collapse-3" class="collapse" aria-labelledby="collapse-3" data-parent="#accordionSidebar">
                <div class="bg-white py-1 collapse-inner rounded">
                    <h6 class="collapse-header">Marketing:</h6>
                    <a class="collapse-item" href="#">Opção 01</a>
                    <a class="collapse-item" href="#">Opção 02</a>
                    <a class="collapse-item" href="#">Opção 03</a>
                    <a class="collapse-item" href="#">Opção 04</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-4" aria-expanded="true" aria-controls="collapse-4">
                <i class="fas fa-fw fa-swatchbook"></i>
                <span>Projetos</span>
            </a>
            <div id="collapse-4" class="collapse" aria-labelledby="collapse-4" data-parent="#accordionSidebar">
                <div class="bg-white py-1 collapse-inner rounded">
                    <h6 class="collapse-header">Projetos:</h6>
                    <a class="collapse-item" href="{{ Route('projetos.show') }}">Listagem de projetos</a>
                    <a class="collapse-item" href="#">Opção 02</a>
                    <a class="collapse-item" href="#">Opção 03</a>
                    <a class="collapse-item" href="#">Opção 04</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Procurar por..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Notificações
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">14/06 14:30</div>
                                    <span class="font-weight-bold">Parabéns, Você é o diamante do mês!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">10/06 14:30</div>
                                    Marcus adicionou você ao projeto "Projeto elétrico casa 261"
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">07/06 14:30</div>
                                    Advertencia: você recebeu uma advertencia leve
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Ver todas as notificações</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Mensagens recebidas
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Éeeh Não Bruno, demoro, demoro então.</div>
                                    <div class="small text-gray-500">Marcus · 2h</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Éeeh Não Bruno, demoro, demoro então.</div>
                                    <div class="small text-gray-500">Marcus · 2h</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Éeeh Não Bruno, demoro, demoro então.</div>
                                    <div class="small text-gray-500">Marcus · 2h</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Éeeh Não Bruno, demoro, demoro então.</div>
                                    <div class="small text-gray-500">Marcus · 2h</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Ver mais mensagens</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ Auth::user()->name }}
                                <br/>
                                <small>{{ Auth::user()->cargo->nome }}</small>
                            </span>
                            <img class="img-profile rounded-circle" src="{{ asset('/images/'.Auth::user()->profile_image) }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('perfil.show') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Configurações
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Registro de atividade
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                {{--                <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>--}}
                @yield('content')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Plataforma CONSELT {{ date("Y") }}</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Clique na opção "Logout" logo abaixo para sair da plataforma.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a
                    class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                >
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{url(mix('site/js/sbadmin.js'))}}"></script>
{{--<script src="{{url(mix('site/app.js'))}}"></script>--}}
</body>
</html>
