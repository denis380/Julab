<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipamentos;
use App\Models\Clientes;
use App\Models\Nota;

class Servico extends Model
{
    protected $table = 'servicos';
    protected $dates = ['data_previsao', 'data_atendimento', 'data_entrega'];
    protected $fillable = 
    [
        'id_fornecedor',
        'descricao',
        'id_cliente',
        'c_equipamento',
        'estado',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Retorna os dados do equipamento registrado no serviço. Ex:  $servico->equipamentos->tipo
    public function equipamentos()
    {
        return $this->belongsTo(Equipamentos::class, 'c_equipamento');
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }

    public function nota()
    {
        return $this->hasMany(Nota::class, 'id_servico');
    }
}
