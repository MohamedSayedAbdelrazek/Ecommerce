<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\product;
use App\Models\User;
use App\Models\orderStatus;
use App\Models\payment;
use App\Models\shipping;

class order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'orderName',
        'orderDate',
        'totalAmount',
        'price',
        'quantity',
        'totalPrice',
        'order_status_id',
        'user_id',
        'product_id'
    ];

    // Relations
    public function orderStatus()
    {
        return $this->belongsTo(orderStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function payments()
    {
        return $this->hasMany(payment::class);
    }

    public function shippings()
    {
        return $this->hasMany(shipping::class);
    }
}
