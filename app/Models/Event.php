<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['title', 'color', 'start_date', 'end_date'];
    protected $guarded = ['id', 'created_at', 'update_at'];

}
