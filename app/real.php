<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class real extends Model
{
    protected $table = 'reals';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
