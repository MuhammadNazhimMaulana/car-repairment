<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairment extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = [
        'user_id',
        'vehicle_name',
        'issue',
        'fee',
        'status'
    ];

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
