<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'customer_name',
        'city_id',
        'city',
        'district',
        'address',
        'postal_code',
        'email',
        'phone_number',
        'extra_phone_number',
        'floor_no',
        'order_total',
        'total_profits',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
