<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Clientes extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nome', 'documento', 'cidade', 'bairro', 'estado', 'rua', 'numero', 'email', 'telefone'];
    protected $guarded = ['id', 'created_at', 'update_at'];


    public function servicos()
    {
        return $this->hasMany(Servico::class, 'id_cliente');
    }
}
