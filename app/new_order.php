<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class new_order extends Model
{
    protected $table = 'new_orders';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
