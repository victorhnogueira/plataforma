<?php

namespace App\Http\Controllers;

use App\MaterialDeApoio;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MateriaisDeApoioController extends Controller
{
    public function index()
    {
        $materiaisDeApoio = MaterialDeApoio::all();
        return view('capacitacoes.materiaisapoio', ["materiais" => $materiaisDeApoio]);
    }

    function search(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '')
            {
                $data = DB::table('materiaisdeapoio')
                    ->where('titulo', 'like', '%'.$query.'%')
                    ->orWhere('descricao', 'like', '%'.$query.'%')
                    ->orderBy('id', 'ASC')
                    ->get();
            }
            else
            {
                $data = DB::table('materiaisdeapoio')
                    ->orderBy('id', 'ASC')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <div class="col mb-4">
                        <div class="card h-100" >
                            <img class="card-img-top" src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/114119751/original/fbd12e929bae2bc448cc5ed6165c4b432aa6f81d/do-your-wordpress-site-migration.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">'.$row->titulo.'</h6>
                                <p class="card-text">'.$row->descricao.'</p>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Ver detalhes</a>
                                    <a href="#" class="btn btn-primary">
                                        <i class="fas fa-plus" ></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            else
            {
                $output = '<div class="container"> <h4>Sem resultados</h4></div>';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    public function novo()
    {
        return view('capacitacoes.novomaterialdeapoio');
    }

    public function create(Request $request)
    {
        $materialDeApoio = new MaterialDeApoio;
        $materialDeApoio->titulo = $request->titulo;
        $materialDeApoio->descricao = $request->descricao;
        $materialDeApoio->conteudo = $request->conteudo;
        $materialDeApoio->autor = Auth::user()->id;

        $messages = [
            'titulo.required' => 'Titulo deve ser preenchido',
            'titulo.max' => 'Titulo deve ter no máximo 60 caracteres',
            'descricao.required'  => 'Descrição deve ser preenchida',
            'descricao.max'  => 'Descrição deve ter no máximo 255 caracteres',
            'conteudo.required'  => 'Conteudo deve ser preenchida',
        ];

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:60',
            'descricao' => 'required|max:255',
            'conteudo' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $materialDeApoio->save();
            return back()->with(["success-message" => "Cadastro realizado com sucesso"]);
        }
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

    public function showitem(MaterialDeApoio $materialDeApoio)
    {
        return view('capacitacoes.materialdeapoioitem', ["material"=> $materialDeApoio]);
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
