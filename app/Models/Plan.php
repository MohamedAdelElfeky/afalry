<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'des', 'ranking', 'days', 'monthly_price', 'yearly_price', 'if_free',
    ];
}
