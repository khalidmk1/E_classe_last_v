<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Folow extends Model
{
    use HasFactory , Notifiable;

    protected $fillable = [
        'user_id',
        'event_id',
        'folow',
        'participat',
        'accepte'
    ];
    
    public function event()
    {
        return $this->belongsTo(event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

  

    
    


}
