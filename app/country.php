<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countries';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
