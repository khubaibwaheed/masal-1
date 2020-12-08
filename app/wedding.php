<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wedding extends Model
{
    protected $table = 'weddings';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
