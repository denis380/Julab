<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['title', 'color', 'start_date', 'end_date', 'id_prestador', 'id_servico'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }


}