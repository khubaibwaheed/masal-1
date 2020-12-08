<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retailer_email extends Model
{
    protected $table = 'retailer_emails';
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
