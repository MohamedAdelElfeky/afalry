<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'customer_name',
        'city_id',
        'district',
        'address',
        'postal_code',
        'email',
        'phone_number',
        'extra_phone_number',
        'floor_no',
        'order_total',
        'total_profits',
        'cart_data',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
