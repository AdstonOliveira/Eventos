<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    protected $table = 'evento';

    protected $fillable = ['data', 'hora', 'nome', 'descricao', 'local'];
    protected $dates = ['data'];

    // public function setDataAttribute($val){
    //     $date = \DateTime::createFromFormat('d/m/Y', $val);
    //     $this->attributes["data"]= $date->format('Y-m-d');
    // }
    
    public function getDataAttribute(){
        return date("d/m/Y", strtotime($this->attributes["data"]));
    }

    public function participantes(){
        return $this->belongsToMany('App\Participante','participante_evento','evento_id','participante_id');
    }

}
