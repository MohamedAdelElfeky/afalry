<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'imageable_type', 'imageable_id'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
