<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'services_name',
        'code',
        'path',
    ];
}
