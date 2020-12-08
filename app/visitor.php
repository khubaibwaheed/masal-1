<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    protected $table = 'visitors';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
