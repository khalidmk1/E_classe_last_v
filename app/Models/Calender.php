<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title', 'start', 'end'
	];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
