<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'services_name',
        'code',
        'path',
    ];
}
