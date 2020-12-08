<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retailerOrder extends Model
{
    protected $table = 'retailer_orders';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
