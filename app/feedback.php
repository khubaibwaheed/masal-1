<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
