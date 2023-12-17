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
class Complaint extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id', 'name', 'email', 'subject', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
