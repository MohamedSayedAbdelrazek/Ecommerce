<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class shipping extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shippings';

    protected $fillable = [
        'carrierName',
        'trackingNumber',
        'actualDeliveryDate',
        'order_id',
        'shipping_status_id'
    ];

    // Relations
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function shippingStatus()
    {
        return $this->belongsTo(ShippingStatus::class);
    }
}
