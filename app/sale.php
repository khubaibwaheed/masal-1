<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $table = 'sales';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
