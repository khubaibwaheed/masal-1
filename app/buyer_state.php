<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buyer_state extends Model
{
    protected $table = 'buyer_states';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
