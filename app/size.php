<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $table = 'sizes';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
