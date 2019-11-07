<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Participante;
use DB;

class ControllerEvento extends Controller
{
    /**protected $fillable = ['data', 'hora', 'nome', 'descricao', 'local'];
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        $inativos = Evento::onlyTrashed()->get();

        return view('Evento.index', compact('eventos','inativos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('Evento.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $evento = $request->all();
        // dd($evento);

        DB::beginTransaction();
        try{
            Evento::create($evento);
            DB::commit();
            return back()->with('success', 'Salvo com sucesso');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Erro no servidor!');
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $evento = Evento::findOrFail($id);
       
       return view('Evento.form', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $params = $request->all();

        DB::beginTransaction();
        try{
            $evento->update($params);
            DB::commit();
            return back()->with('success', 'Editado com sucesso');
        }catch (\Exception $e){
            DB::rollback();
            return back()->with('error', 'Ocorreu um erro ao salvar');
        }
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
        $evento = Evento::findOrFail($id);
        $params = $request->all();

        DB::beginTransaction();
        try{
            $evento->update($params);
            DB::commit();
            return back()->with('success', 'Evento alterado com sucesso');    
        }catch (\Exception $e){
            DB::rollback();
        return back()->with('error', 'Ocorreu um erro ao salvar');
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
        $evento = Evento::withTrashed()->findOrFail($id);

        if( $evento->trashed() ){
            $evento->restore();

            return back()->with('success','Evento restaurado');
        }else{
            $evento->delete();
            return back()->with('success','Evento deletado');
        }

    }

    public function indexAdicionar($id){
        $evento = Evento::findOrFail($id);
        $participantes = Participante::all();

        return view('Evento.adicionar', compact('evento','participantes'));
    }

    public function indexParticipante($id){
        $evento = Evento::findOrFail($id);
        $evento_participantes = $evento->participantes;
        return view('Evento.participantes', compact('evento', 'evento_participantes'));
    }

    public function adicionar(Request $request, $id){
        
        $evento = Evento::findOrFail($id);
        $participante = $request->participante;
        

        DB::beginTransaction();
        
        try{
            $evento->participantes()->attach($participante);
            DB::commit();
            return back()->with('success', 'Participante adicionado ao evento com sucesso!');    
        }
        catch (\Exception $e){
            DB::rollback();
            return back()->with('error', 'Ocorreu um erro ao salvar');
        }
        
    }

    public function removerParticipante($idevento, $idparticipante){
        $evento = Evento::findOrFail($idevento);
        
        DB::beginTransaction();

        try{
            $evento->participantes()->detach($idparticipante);
            DB::commit();
            return back()->with('success', 'Participante removido do evento!');    
        }
        catch (\Exception $e){
            DB::rollback();
            return back()->with('error', 'Ocorreu um erro ao salvar');
        }

    }


}
