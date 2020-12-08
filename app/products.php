<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}