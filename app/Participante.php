<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model{
    
    use softDeletes;
    
    protected $table = 'participante';

    protected $fillable = ['nome', 'rg', 'cpf', 'email', 'telefone', 'data_nascimento', 'organizacao '];

    public $timestamps = false;

    public function eventos(){
        return $this->belongsToMany('App\Evento','participante_evento','participante_id','evento_id');
    }
    
}   