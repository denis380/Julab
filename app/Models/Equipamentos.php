<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $table = 'equipamentos';
    protected $fillable = ['tipo', 'fabricante', 'modelo', 'obs'];
    protected $guarded = ['id', 'created_at', 'update_at'];
}

