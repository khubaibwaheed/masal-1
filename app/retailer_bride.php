<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retailer_bride extends Model
{
    protected $table = 'retailer_brides';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
