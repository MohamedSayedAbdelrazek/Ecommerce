<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\order;
class payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'paymentAmount',
        'paymentMethod',
        'paymentDate',
        'order_id'
    ];

    // Relations
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
