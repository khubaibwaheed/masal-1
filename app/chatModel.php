<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatModel extends Model
{
    protected $table = 'chat_models';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
