<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queues extends Model
{
    protected $table = 'queues';
    protected $fillable = [
        'phone_number',
        'first_letter',
        'plate_number',
        'last_plate_letter',
        'que_number',
        'call_status',
        'is_called',
        'dates',
    ];
    public function layanan()
    {
        return $this->belongsTo(Services::class, 'services_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
