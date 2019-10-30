<?php
namespace app\Entities;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model{
    
    use softDeletes;
    
    protected $table = 'participantes';

    protected $fillable = ['nome', 'rg', 'cpf', 'email', 'telefone', 'data_nascimento', 'organizacao '];

    public $timestamps = false;
    
}   