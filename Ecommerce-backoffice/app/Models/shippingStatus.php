<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class shippingStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shipping_statuses';

    protected $fillable = [
        'shippingStatus'
    ];

    // Relations
    public function shippings()
    {
        return $this->hasMany(Shipping::class);
    }
}
