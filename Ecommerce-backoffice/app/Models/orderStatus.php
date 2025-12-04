<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class orderStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_statuses';

    protected $fillable = [
        'orderStatus'
    ];

    // Relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
