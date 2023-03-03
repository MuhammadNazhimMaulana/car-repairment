<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = [
        'repariment_id',
        'midtrans_transaction_id',
        'midtrans_order_id',
        'midtrans_va_number',
        'total'
    ];

    /**
     * Get the repairment that owns the comment.
     */
    public function repairment()
    {
        return $this->belongsTo(Repairment::class);
    }
}
