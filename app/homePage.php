<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homePage extends Model
{
    protected $table = 'home_pages';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
