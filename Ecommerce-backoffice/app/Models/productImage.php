<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class productImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_images';

    protected $fillable = [
        'imagePath',
        'imageOrder',
        'product_id'
    ];

    // Relations
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
