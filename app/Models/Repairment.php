<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairment extends Model
{
    use HasFactory;

    const PENDING_STATUS = 'waiting payment';
    const DONE_STATUS = 'done';

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

    /**
     * Get the transaction for the blog post.
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
