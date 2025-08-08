<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'services_name',
        'code',
        'logo_path',
    ];

    public function queues():HasMany
    {
        return $this->hasMany(Queues::class, 'services_id');
        // 'services_id' is the foreign key in queues table
    }
}
