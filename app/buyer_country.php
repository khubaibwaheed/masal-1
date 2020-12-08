<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buyer_country extends Model
{
    protected $table = 'buyer_countries';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
