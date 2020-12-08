<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newPages extends Model
{
    protected $table = 'new_pages';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
