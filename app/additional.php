<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class additional extends Model
{ 
    protected $table = 'additionals';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
