<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menus';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
