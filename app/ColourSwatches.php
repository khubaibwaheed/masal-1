<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColourSwatches extends Model
{
    protected $table = 'colour_swatches';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
