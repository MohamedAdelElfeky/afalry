<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'status'
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
