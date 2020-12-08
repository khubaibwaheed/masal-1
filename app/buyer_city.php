<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buyer_city extends Model
{
    protected $table = 'buyer_cities';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
