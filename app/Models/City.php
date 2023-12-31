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
class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['city_id', 'name', 'deleg', 'com', 'del'];
}
