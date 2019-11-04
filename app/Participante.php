<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model{
    
    use softDeletes;
    
    protected $table = 'participantes';

    protected $fillable = ['nome', 'rg', 'cpf', 'email', 'telefone', 'data_nascimento', 'organizacao '];

    public $timestamps = false;
    
}   