<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';
    protected $fillable = 
    [
        'descricao',
        'id_cliente',
        'c_equipamento',
        'data_previsao',
        'data_atendimento',
        'estado',
        
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function clientes()
    {
        return $this->belongsToMany(Clientes::class);
    }

    public function equipamentos()
    {
        return $this->hasOne(Equipamentos::class);
    }
}
