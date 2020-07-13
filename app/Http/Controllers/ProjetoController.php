<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Projeto;
use App\Servico;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projetos = Projeto::all();
        $servicos_da_cartilha = Servico::all();
        $membros = User::all();
        $clientes = Cliente::all();

        return view('projetos.index', compact('projetos', 'servicos_da_cartilha', 'membros', 'clientes'));
    }

    function search(Request $request)
    {
        if($request->ajax())
        {
            $output = '';

            $query = $request->get('query');
            $servicos = $request->get('servicos');
            $gerentes = $request->get('gerentes');
            $clientes = $request->get('clientes');


            $servicos = preg_replace('/[\[\]\"\']/', '', $servicos );
            $servicos = array_flip(array_flip(explode(',', $servicos)));

            $gerentes = preg_replace('/[\[\]\"\']/', '', $gerentes );
            $gerentes = array_flip(array_flip(explode(',', $gerentes)));

            $clientes = preg_replace('/[\[\]\"\']/', '', $clientes );
            $clientes = array_flip(array_flip(explode(',', $clientes)));


            $GLOBALS['query'] = $query;
            $GLOBALS['servicos'] = $servicos;
            $GLOBALS['gerentes'] = $gerentes;
            $GLOBALS['clientes'] = $clientes;


            $data = Projeto::with('servico')->orWhere(function ($val) {

                    if($GLOBALS['servicos'][0] !== ""){
                        $val->whereIn('servico_id', $GLOBALS['servicos']);
                    }

                    if($GLOBALS['gerentes'][0] !== ""){
                        $val->whereIn('gerente_id', $GLOBALS['gerentes']);
                    }

                    if($GLOBALS['clientes'][0] !== ""){
                        $val->whereIn('cliente_id', $GLOBALS['clientes']);
                    }


                    $val->where(function ($val) {
                        $val->where('nome', 'like', '%'.$GLOBALS['query'].'%')
                            ->orWhere('numero_contrato', '=', $GLOBALS['query']);
                    });
                })
                ->get();

            $total_row = $data->count();

            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                        <tr>
                          <th class="align-middle" scope="row">'.$row->numero_contrato.'</th>
                          <td class="align-middle">
                              <span>'.$row->nome.'</span>
                          </td>
                          <td class="align-middle">'.$row->servico->nome.'</td>
                          <td class="align-middle">'.$row->cliente->nome.'</td>
                          <td class="align-middle">
                              <div class="membrogerentetab">
                                  <img  src="'.asset('images/'.$row->gerente->profile_image).'" class="rounded float-left" alt="'.$row->gerente->name.'">
                                  <p>'.$row->gerente->firstName().'</p>
                              </div>
                          </td>
                          <td class="align-middle">'.$row->data_assinatura_contrato.'</td>
                          <td class="align-middle">
                              '.$row->data_entrega_no_contrato;

                            if($row->esta_atrasado() ){
                                $output .= '<button class="btn btn-sm btn-danger btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-exclamation-triangle"></i> </span> <span class="text">'.$row->dias_para_entrega().' dias de atraso</span> </button>';
                            }

                            $output .='

                          </td>
                          <td class="align-middle">40%</td>
                          <td class="align-middle">
                              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-light seeprojectdetailspopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Ver detalhes do projeto">
                                      <i class="far fa-eye"></i>
                                  </button>';
                                  if(Auth::user()->id === $row->gerente->id){
                                      $output .='<a href="'.route("projetos.gerenciar").'" type="button" class="btn btn-secondary manageprojectpopover" data-container="body" data-toggle="popover" data-placement="top" data-content="Gerenciar projeto">
                                          <i class="fas fa-tasks"></i>
                                      </a>';
                                  }

                        $output .='
                              </div>
                          </td>
                      </tr>
                    ';
                }
            }
            else
            {
                $output = '<tr><td colspan="9"><h4>Sem resultados</h4></td></tr>';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    public function create(Request $request)
    {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
