<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Nota extends Model
{
    protected $table = 'notas';
    protected $fillabes = ['nota', 'id_servico'];

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }
}
