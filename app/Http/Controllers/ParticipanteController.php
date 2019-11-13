<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use DB;
use App\Http\Requests\ParticipanteRequest;
class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantesInativos = Participante::onlyTrashed()->get();
        $participantes = Participante::all();
     

        return view('participante.index', compact('participantes','participantesInativos'));
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
    public function store(ParticipanteRequest $request)
    {

        DB::beginTransaction();

        try {

            $participante = new Participante;
            $participante->nome = $request->nome;
            $participante->rg = $request->rg;
            $participante->cpf = $request->cpf;
            $participante->email = $request->email;
            $participante->telefone = $request->telefone;
            $participante->data_nascimento = $request->data_nascimento;
            $participante->organizacao = $request->organizacao;
            $participante->save();

            DB::commit();
            return redirect('participante')->with('success', 'Participante cadastrado com sucesso!');
        } catch (\Exception $e) {

            DB::rollback();
            return redirect('participante')->with('error', 'Erro no servidor! Participante não cadastrado!');
        }






        //abaixo está a criação do participante no banco usando as requisições do postman, isto é, sem o formulário 
        /*  
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
*/
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
            'url'     => 'participante/' . $id,
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
    public function update(ParticipanteRequest $request, $id)
    {
        
        $participante = Participante::findOrFail($id);
        // $participanteAtualizado = $request->all();

        // $camposAtualizados = array();

        // if($participanteAtualizado->nome != $participante->nome) {
        //     array_push($participanteAtualizado->nome, $camposAtualizados); 
        // }





        DB::beginTransaction();
        try {
          
           
            $participante->nome = $request->nome;
            $participante->rg = $request->rg;
            $participante->cpf = $request->cpf;
            $participante->email = $request->email;
            $participante->telefone = $request->telefone;
            $participante->data_nascimento = $request->data_nascimento;
            $participante->organizacao = $request->organizacao;
            $participante->update();
            

            DB::commit();
            
            return redirect('participante')->with('success', 'Participante atualizado com sucesso!');
        } catch (\Exception $e) {
           
            DB::rollback();
            return redirect('participante')->with('error', 'Erro no servidor! Participante não atualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participantesInativo = Participante::withTrashed()->findOrFail($id);
        if($participantesInativo->trashed()) {
            $participantesInativo->restore();
            return back()->with('success', 'Participante ativado com sucesso!');
        } else {
            $participantesInativo->delete();
            return back()->with('success', 'Participante desativado com sucesso!');
        }
    }

    


}
