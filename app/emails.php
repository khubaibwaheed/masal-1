<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emails extends Model
{
    protected $table = 'emails';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
