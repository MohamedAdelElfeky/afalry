<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'discount',
    ];
    public function service()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
