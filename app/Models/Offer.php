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
class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'type',
        'value',
        'end_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
