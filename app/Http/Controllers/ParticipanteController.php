<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use DB;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        //$data = [
           //'participantesAtivos' => Participante::all()
           
        //];
        
        return view('participante.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'participante' => '',
            'url' => 'participante',
            'method' => 'POST',
        ];
        return view('participante.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        //abaixo está a criação do participante no banco usando as requisições do postman, isto é, sem o formulário 
         
        DB::beginTransaction();
        try {
            $dados = new Participante;
            
            $dados->name = $request->name;
            $dados->rg = $request->rg;
            $dados->cpf = $request->cpf ;
            $dados->email = $request->email;
            $dados->telefone = $request->telefone;
            $dados->data_nascimento = $request->data_nascimento;
            $dados->organizacao = $request->organizacao;

            //$dados->save();
            return $dados;

        } catch (\Exception $e){
            DB::rollback();
            return back()->with('error', 'Ops! Ocorreu um erro.');
        }

        //$participante = $request->all();
        //DB::beginTransaction();

        //try{
        //    $participante->create();
        //    DB::commit();
        //    return back()->with('success', 'Participante salvo com sucesso');
        //}catch(\Exception $e){
        //    DB::rollback();
        //     return back()->with('error', 'Erro no servidor!');
        //}

        

        
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
        $participante = Participante::findOrFail($id);

        $data = [
            'participante' => $participante,
            'url'     => 'participante/'.$id,
            'method'  => 'PUT'
        ];

        return view('participante.form', compact('data'));
       
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
