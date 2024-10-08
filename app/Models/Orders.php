<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerID',
        'supplierID',
        'skillID',
        'no_of_hours',
        'total_amount',
        'description',
        'status'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'customerID');
    }

    public function skill(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skillID');
    }
}
