<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_erp',
        'name',
        'price',
        'balance',
        'category_id',
        'description',
        'status',
        'type_rate',
        'value_rate',
        'plans',
    ];
    protected $casts = [
        'plans' => 'array',
    ];
    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id');
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }
}
