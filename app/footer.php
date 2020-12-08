<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    protected $table = 'footers';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
