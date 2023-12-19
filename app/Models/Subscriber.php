<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'plan',
        'user_id',
        'plan_id',
        'start_date',
        'end_date',
        'status',
        'payment_id',
        'amount',
        'remind_end',
        'count_product',
    ];

    protected $casts = [
        'plan' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
