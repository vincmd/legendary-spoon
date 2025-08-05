<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocketService extends Model
{

    protected $table = 'locketservices';

    protected $fillable = [
        'locket_id',
        'services_id',
    ];
}
