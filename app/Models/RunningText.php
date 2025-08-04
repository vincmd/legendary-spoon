<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningText extends Model
{
    protected $table ='runningtext';
    protected $fillable = [
        'texts',
        'status',
    ];
}
